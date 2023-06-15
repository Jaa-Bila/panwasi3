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
        Schema::create('partc_hamils', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('alamat');
            $table->bigInteger('notel');
            $table->string('hamilke');
            $table->date('hpht');
            $table->date('hpl');
            $table->string('hb');
            $table->integer('desa_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partc_hamils');
    }
};
