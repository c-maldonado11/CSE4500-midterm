<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('invoice_equipment', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('invoice_id')->constrained('invoices')->onDelete('cascade');;
            $table->foreignId('hardware_id')->constrained('hardwares')->onDelete('cascade');;
        });
    }

    public function down()
    {
        Schema::dropIfExists('invoice_equipment');
    }
};
