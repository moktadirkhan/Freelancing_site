<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Replies extends Model
{
  protected $fillable=['content','post_id','user_id','amounts'];

  public function post()
  {
    return $this->belongsTo(Post::class);
  }
  public function user()
    {
      return $this->belongsTo(User::class);
    }
}
