<?php

namespace App\Models;

    
use Illuminate\Database\Eloquent\Model;

class PortfolioCategory extends Model
{
    protected $table = 'portfolio_categories_name';

    protected $guarded = [];
  
    public $timestamps = true;
}
