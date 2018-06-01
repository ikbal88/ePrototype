<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransDetail extends Model
{
  public $incrementing  = false;
  protected $table      = 'trans_detail';
  protected $fillable   = ['id_po','index','tanggal','id_barang','name',
  'size','ld','qty','id_satuan','price','total','isactive'];
}
