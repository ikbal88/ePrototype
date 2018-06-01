<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
          $table->string('id')->unique();
          $table->integer('index');
          $table->string('name');
          $table->string('id_jenis',15);
          $table->string('id_material',15);
          $table->string('id_warna',15);
          $table->string('qty');
          $table->string('id_satuan',15);
          $table->string('status',1);
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
        Schema::dropIfExists('barang');
    }
}
