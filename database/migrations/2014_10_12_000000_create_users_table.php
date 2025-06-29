<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // Nama pengguna
            $table->string('email')->unique(); // Email unik
            $table->string('password'); // Password
            $table->enum('role', ['user', 'admin'])->default('user') ; // Peran pengguna (default: user)
            $table->string('hp')->nullable(); // Nomor HP (opsional)
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken(); // Token untuk remember me
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
