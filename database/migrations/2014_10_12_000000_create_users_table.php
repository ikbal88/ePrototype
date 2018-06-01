<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->integer('index');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('no_ktp',20);
            $table->string('telepon',20);
            $table->string('alamat');
            $table->string('password');
            $table->string('pin',6);
            $table->string('role',5);
            $table->string('isactive',1);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
