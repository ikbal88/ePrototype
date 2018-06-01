<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuratJalanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_jalan', function (Blueprint $table) {
          $table->string('id',15)->unique();
          $table->integer('index');
          $table->string('pengirim')->nullable();
          $table->date('tanggal');
          $table->time('jam')->nullable();
          $table->string('no_kendaraan')->nullable();
          $table->string('id_supplier',15);
          $table->string('id_proses',15);
          $table->string('attention')->nullable();
          $table->date('tgl_acc_1')->nullable();
          $table->string('id_user_acc_1')->nullable();
          $table->date('tgl_acc_2')->nullable();
          $table->string('id_user_acc_2')->nullable();
          $table->date('tgl_acc_3')->nullable();
          $table->string('id_user_acc_3')->nullable();
          $table->string('catatan')->nullable();
          $table->string('catatan_pembatalan')->nullable();
          $table->string('status')->nullable();
          $table->string('isactive',1);
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
        Schema::dropIfExists('surat_jalan');
    }
}
