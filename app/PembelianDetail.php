<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PembelianDetail extends Model
{
  public $incrementing  = false;
  protected $table      = 'pembelian_detail';
  protected $fillable   = ['id_po','index','tanggal','id_material','name',
  'id_warna','size','ld','qty','id_satuan','price','total','isactive'];
}
