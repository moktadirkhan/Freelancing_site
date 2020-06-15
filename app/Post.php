<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $fillable=['title','content','slug','user_id'];
  public function user()
    {
      return $this->belongsTo(User::class);
    }
    public function replies()
    {
      return $this->hasMany(Replies::class);
    }
    public function user_data()
      {
        return $this->belongsTo(User_Data::class);
      }
}
