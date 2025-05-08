<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Schema::create('user_pos', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name');
        //     $table->string('email')->unique();
        //     $table->string('password');
        //     $table->string('photo')->nullable(); // untuk path/nama file foto
        //     $table->enum('role', ['admin', 'kasir']);
        //     $table->text('address')->nullable();
        //     $table->timestamps();
        // });
    }

    public function down(): void
    {
        // Schema::dropIfExists('user_pos');
    }
};
