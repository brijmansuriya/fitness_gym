<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Nutrition extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'nutritions';

    protected $fillable = [
        'name', 'amount', 'detail',
    ];
}
