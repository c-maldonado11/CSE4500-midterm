<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained("customers")->onDelete('cascade');
            $table->dateTime('purchase_date');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('invoices');
    }
};
