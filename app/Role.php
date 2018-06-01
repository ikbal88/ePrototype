<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  public $incrementing  = false;
  protected $table      = 'role';
  protected $fillable   = ['id','index','name','isactive'];
}
