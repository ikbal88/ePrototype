<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuratMasukDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_masuk_detail', function (Blueprint $table) {
          $table->string('id_surat_masuk',15);
          $table->integer('index');
          $table->date('tanggal');
          $table->decimal('qty',15,2);
          $table->string('id_satuan',15);
          $table->string('id_barang')->nullable();
          $table->string('id_po',15);
          $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('surat_masuk_detail');
    }
}
