<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drive_link extends Model
{
  protected $fillable=[  'profile_id','content','user_id'];
  public $table = "drive_link";
}
