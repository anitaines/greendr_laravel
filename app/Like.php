<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Like extends Model
{
  public $guarded = [];

<<<<<<< HEAD
  use softDeletes;

  public function dameElUser(){
    return $this->belongsTo("App\User", "user_likeador_id");
  }

  public function dameElArticulo(){
    return $this->belongsTo("App\Article", "article_id");
  }

=======
  use SoftDeletes;
>>>>>>> fdddbffaedd414871e257d9d1adcc8fbaff6892a
}
