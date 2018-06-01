<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaklonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maklon', function (Blueprint $table) {
          $table->string('id',15)->unique();
          $table->integer('index');
          $table->string('id_supplier',15);
          $table->string('top')->nullable();
          $table->string('tos')->nullable();
          $table->date('tanggal');
          $table->date('tanggal_kirim')->nullable();
          $table->string('ppn',1);
          $table->string('style')->nullable();
          $table->string('attention')->nullable();
          $table->string('id_proses',15)->nullable();
          $table->date('tgl_acc_1')->nullable();
          $table->string('id_user_acc_1')->nullable();
          $table->date('tgl_acc_2')->nullable();
          $table->string('id_user_acc_2')->nullable();
          $table->date('tgl_acc_3')->nullable();
          $table->string('id_user_acc_3')->nullable();
          $table->decimal('total_trans',15,2);
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
        Schema::dropIfExists('maklon');
    }
}
