<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Cycle;
use App\Models\Order;
use App\Models\OrderType;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $orders = Order::all();
        $users = User::all();
        $order_types = OrderType::all();
        return view('orders.create', compact('users','order_types','orders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        $this->authorize('create', Order::class);

        $validatedData = $request->validate([
            'time'          => 'required|date_format:Y-m-d\TH:i',
            'user_id'       => 'required|integer|exists:users,id',
            'order_type_id' => 'required|integer|exists:order_types,id',
        ]);

        // Получаем дату и время заказа
        $orderDateTime = Carbon::createFromFormat('Y-m-d\TH:i', $request->input('time'));
        // Каждый цикл длится 3 часа.
        // Циклы начинаются в 7:00 утра и повторяются каждые 3 часа.
        // Последний цикл должен закончиться до 19:00.
        // Циклы строго расписаны на весь день.
        // Задача: Найти ближайший завершенный цикл, который закончился до желаемогo времени выдачи order_time.
        // Заказ должен попадать в этот цикл.

        $startDay = $orderDateTime->copy()->setTime(7, 0);
        $timeStep = 3;
        $endOfCycles = $orderDateTime->copy()->setTime(19, 0);

        DB::transaction(function () use ($orderDateTime, $validatedData) {
            // Ищем ближайший завершенный цикл, который закончился до orderDateTime
            $cycle = Cycle::where('date', $orderDateTime->format('Y-m-d')) // Фильтруем по дате
            ->where('time_end', '<=', $orderDateTime) // Цикл должен быть завершен до order_time
            ->orderBy('time_end', 'desc') // Сортируем по времени окончания (ближайший к order_time)
            ->first();

            // Если цикл не найден, создаем циклы на этот день с шагом в 3 часа
            if (!$cycle) {
                $startDay = $orderDateTime->copy()->setTime(7, 0); // Начало дня (7:00 утра)
                $timeStep = 3; // Шаг в 3 часа
                $endOfCycles = $orderDateTime->copy()->setTime(19, 0); // Последний цикл должен закончиться до 19:00

                $currentTime = $startDay->copy(); // Начинаем с 7:00 утра

                // Перебираем циклы до 19:00
                while ($currentTime->lt($endOfCycles)) {
                    $cycleStart = $currentTime->copy();
                    $cycleEnd = $currentTime->copy()->addHours($timeStep);

                    // Если цикл завершился до orderDateTime, создаем его
                    if ($cycleEnd->lte($orderDateTime)) {
                        $cycle = Cycle::create([
                            'date' => $orderDateTime->format('Y-m-d'), // Указываем дату
                            'time_start' => $cycleStart,
                            'time_end' => $cycleEnd,
                        ]);
                    }

                    $currentTime->addHours($timeStep); // Переходим к следующему циклу
                }
            }

            // Создаем заказ и связываем его с циклом
            $validatedData['cycle_id'] = $cycle->id; // Добавляем cycle_id в данные заказа
            Order::create($validatedData);
        });

        // Перенаправляем с сообщением об успехе
        return redirect()->route('orders.index')->with('success', 'Order created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        $users = User::all();
        $order_types = OrderType::all();
        return view('orders.edit', compact('users','order_types','order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $this->authorize('update', $order);

        $validatedData = $request->validate([
            'time' => 'required|date_format:Y-m-d\TH:i',
            'user_id' => 'required|integer|exists:users,id',
            'order_type_id' => 'required|integer|exists:order_types,id',
        ]);

        $order->update($validatedData);
        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');

    }
    private function authorize(string $string, string $class)
    {

    }
}
