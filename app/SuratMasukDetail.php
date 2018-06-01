<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratMasukDetail extends Model
{
  public $incrementing  = false;
  protected $table      = 'surat_masuk_detail';
  protected $fillable   = ['id_surat_masuk','index','tanggal','qty','id_satuan','id_barang',
  'id_po','keterangan','isactive'];
}
