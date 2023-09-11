<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $table = 'portfolios_categories';

  protected $guarded = [];

  public $timestamps = true;

}
