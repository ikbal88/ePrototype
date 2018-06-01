<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
  public $incrementing  = false;
  protected $table      = 'material';
  protected $fillable   = ['id','index','name','isactive'];
}
