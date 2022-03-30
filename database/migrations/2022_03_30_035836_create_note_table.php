<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('service');
            $table->string('software');
            $table->string('content');
            $table->string('hardware_id')->constrained('hardwares')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('notes');
    }
};
