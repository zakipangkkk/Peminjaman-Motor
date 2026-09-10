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
        schema::create('harga_per_hari', function(Blueprint $table){
            $table->id();
            $table->foreignId('motor_id')->constrained('motor')->cascaseOnDelete();
            $table->string('harga_per_hari');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
