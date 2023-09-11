<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $table = 'services';

    protected $guarded = [];

    public $timestamps = true;

    public function childe(){
        return $this->hasMany(ServicesChilde::class, 'service_id');
    }
}

