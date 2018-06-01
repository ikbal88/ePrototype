<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Costumer extends Model
{
  public $incrementing  = false;
  protected $table      = 'costumer';
  protected $fillable   = ['id','index','name','alamat','no_telepon','isactive'];
}
