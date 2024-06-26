<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->tinyInteger('status');
            $table->string('tracking_code')->nullable();
            $table->string('wilaya');
            $table->string('commune')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address');
            $table->string('phone');
            $table->string('note')->nullable();
            $table->string('payment_method')->nullable();
            $table->double('total');
            $table->double('total_f');
            $table->double('value')->nullable();
            $table->double('delivery_cost')->nullable();
            $table->string('code')->nullable();
            $table->integer('declared_value')->nullable();
            $table->boolean('freeshipping')->nullable();
            $table->boolean('is_stopdesk')->nullable();
            $table->string('stopdesk_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
