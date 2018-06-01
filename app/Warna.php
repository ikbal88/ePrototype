<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warna extends Model
{
  public $incrementing  = false;
  protected $table      = 'warna';
  protected $fillable   = ['id','index','name','isactive'];
}
