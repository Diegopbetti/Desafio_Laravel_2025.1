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
            $table->string('address')->required();
            $table->string('telephone')->required();
            $table->date('birth_date')->required();
            $table->string('cpf')->unique()->required();
            $table->string('photo')->nullable();
            $table->decimal('balance')->default(0)->required();
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
