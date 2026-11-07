<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kue', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('rasa_kategori')->nullable();
            $table->unsignedInteger('harga')->default(0);
            $table->unsignedInteger('stock')->default(0);
            $table->text('deskripsi')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kue');
    }
};
