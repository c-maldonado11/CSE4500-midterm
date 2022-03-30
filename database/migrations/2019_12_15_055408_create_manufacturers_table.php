<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('manufacturers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('tech_email');
            $table->string('tech_phone');
            $table->string('sales_email');
            $table->string('sales_phone');
        });
    }

    public function down()
    {
        Schema::dropIfExists('manufacturers');
    }
};
