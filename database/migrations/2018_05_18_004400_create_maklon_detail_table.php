<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaklonDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maklon_detail', function (Blueprint $table) {
          $table->string('id_po',15);
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
        Schema::dropIfExists('maklon_detail');
    }
}
