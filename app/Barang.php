<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
  public $incrementing  = false;
  protected $table      = 'barang';
  protected $primaryKey = 'id';
  protected $fillable   = ['id','index','name','id_material','id_jenis','id_warna',
  'qty','id_satuan','status','isactive'];
  protected $casts      = [
    'id' => 'string',
  ];

  const CREATED_AT = 'created_at';
  const UPDATED_AT = 'updated_at';

}
