<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable=[  'profile_id','date_limit','description','money','user_id'];

}
