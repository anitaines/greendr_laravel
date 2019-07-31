<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
  public $guarded = [];

  use SoftDeletes;

  public function categoria(){
    return $this->belongsTo("App\Category", "category_id");
  }

  public function usuario(){
    return $this->belongsTo("App\User", "user_id");
  }

  public function liker(){
    return $this->belongsToMany("App\User", "likes", "article_id", "user_likeador_id");
  }

}
