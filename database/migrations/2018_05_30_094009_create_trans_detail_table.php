<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trans_detail', function (Blueprint $table) {
          $table->string('id_penjualan',15);
          $table->integer('index');
          $table->date('tanggal');
          $table->string('id_barang');
          $table->string('name')->nullable();
          $table->string('size')->nullable();
          $table->string('ld')->nullable();
          $table->decimal('qty',15,2);
          $table->string('id_satuan',15);
          $table->decimal('price', 15, 2);
          $table->decimal('total', 15, 2);
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
        Schema::dropIfExists('trans_detail');
    }
}
