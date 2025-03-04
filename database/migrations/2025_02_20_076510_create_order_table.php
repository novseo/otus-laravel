<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->time('date');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('order_type_id')->references('id')->on('order_types');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('orders')) {
            Schema::table('orders', function (Blueprint $table) {
                if (Schema::hasColumn('orders', 'user_id')) {
                    $table->dropForeign(['user_id']);
                }
                if (Schema::hasColumn('orders', 'order_type_id')) {
                    $table->dropForeign(['order_type_id']);
                }
            });
        }

        Schema::dropIfExists('orders');
    }
};
