<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChoseUs extends Model
{
    use HasFactory;
    protected $table = 'chose_us';

    protected $guarded = [];

    public $timestamps = true;

}
