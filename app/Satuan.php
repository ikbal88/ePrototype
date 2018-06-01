<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
  public $incrementing  = false;
  protected $table      = 'satuan';
  protected $fillable   = ['id','index','name','isactive'];
}
