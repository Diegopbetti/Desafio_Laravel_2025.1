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
        Schema::table('users', function (Blueprint $table) {
            $table->string('address')->nullable();
            $table->string('telephone')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('cpf')->unique()->nullable();
            $table->string('photo')->nullable();
            $table->float('balance')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['address', 'telephone', 'birth_date', 'cpf', 'photo', 'balance']);
        });
    }
};
