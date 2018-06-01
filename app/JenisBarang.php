<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisBarang extends Model
{
  public $incrementing  = false;
  protected $table      = 'jenis_barang';
  protected $fillable   = ['id','index','name','isactive'];
}
