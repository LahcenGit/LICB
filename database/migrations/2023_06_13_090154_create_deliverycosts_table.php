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
        Schema::create('deliverycosts', function (Blueprint $table) {
            $table->id();
            $table->integer('code_wilaya');
            $table->string('wilaya');
            $table->float('domicile');
            $table->float('stopdesk');
            $table->float('annuler');
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
        Schema::dropIfExists('deliverycosts');
    }
};
