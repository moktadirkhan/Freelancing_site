<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Data extends Model
{
  public $table = "user_data";
  protected $fillable=['skills','work_link','image','type_of_developer','bio','user_id'];

  public function user() //name of the model in lower case
  {
    return $this->belongsTo(User::class);
  }
  public function post()
  {
    return $this->hasMany(Post::class);
  }


}
