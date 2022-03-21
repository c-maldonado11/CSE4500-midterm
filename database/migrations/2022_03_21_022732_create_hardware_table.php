<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('hardware', function (Blueprint $table) {
            $table->id();
            $table->string('model');
            $table->string('manufacturer');
            $table->string('category');
        });
    }


    public function down()
    {
        Schema::dropIfExists('hardware');
    }
};
