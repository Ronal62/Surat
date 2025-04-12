<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tb_users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('user_kode')->unique();
            $table->string('user_name')->unique();
            $table->string('user_password');
            $table->string('user_role')->default('user');
            $table->timestamps(); // otomatis buat created_at dan updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tb_users');
    }
};