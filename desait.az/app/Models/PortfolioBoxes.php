<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioBoxes extends Model
{
    protected $table = 'portfolio_boxes';

    protected $guarded = [];

    public $timestamps = true;

    public function filter()
    {
        return $this->hasOne(PortfolioCategory::class, 'id', 'category_id');
    }
}
