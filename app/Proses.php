<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proses extends Model
{
  public $incrementing  = false;
  protected $table      = 'proses';
  protected $fillable   = ['id','index','name','isactive'];
}
