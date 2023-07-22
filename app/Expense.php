<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = ['date', 'name', 'amount'];

    public function setDateAttribute($value)
    {
        if ($value) {
            return $this->attributes['date'] = Carbon::parse($value)->format('Y-m-d');
        }

        return '';
    }

    public function getDateAttribute($value)
    {
        if ($value) {
            return $this->attributes['date'] = Carbon::parse($value)->format('d-m-Y');
        }

        return '';
    }
}
