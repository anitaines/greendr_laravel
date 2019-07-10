<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
  public $guarded = [];

  use softDeletes;
}
