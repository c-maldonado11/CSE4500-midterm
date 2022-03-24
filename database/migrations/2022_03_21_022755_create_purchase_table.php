<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('purchase', function (Blueprint $table) {
            $table->id();
            $table->integer('invoice');
            $table->integer('price');
            $table->date('purchase_date');
            $table->foreignId('hardware_id')->constrained();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('purchase');
    }
};
