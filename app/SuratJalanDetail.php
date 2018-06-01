<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratJalanDetail extends Model
{
  public $incrementing  = false;
  protected $table      = 'surat_jalan_detail';
  protected $fillable   = ['id_surat_jalan','index','tanggal','qty','id_satuan','id_barang',
  'id_po','keterangan','isactive'];

}
