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
        /*
        Schema::create('rents', function (Blueprint $table) {
            $table->id();
            $table->integer('tenant_id')->unsigned();
            $table->integer('property_id')->unsigned();
            $table->date('rent_start');
            $table->date('rent_end');
            $table->integer('deposit')->unsigned();
            $table->timestamps();
        });
        */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rents');
    }
};
