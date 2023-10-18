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
        Schema::table('books', function (Blueprint $table) {
            $table->decimal('HargaBeli', 8, 2)->nullable(); // contoh field untuk harga dengan 2 digit desimal
            $table->decimal('HargaJual', 8, 2)->nullable();
            $table->integer('Stok')->default(0); // contoh field untuk stok dengan nilai default 0
            $table->string('title')->unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn(['HargaBeli', 'HargaJual', 'Stok']);
        });
    }
};
