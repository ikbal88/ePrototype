<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
  public $incrementing  = false;
  protected $table      = 'supplier';
  protected $fillable   = ['id','index','name','alamat','no_telepon','isactive'];

  // public function pembelian()
  // {
  //   return $this->hasMany('App\Pembelian');
  // }

}
