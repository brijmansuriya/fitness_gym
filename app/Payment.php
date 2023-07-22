<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['registration_id', 'months', 'amount', 'start_date', 'end_date'];

    public function setStartDateAttribute($value)
    {
        if ($value) {
            return $this->attributes['start_date'] = Carbon::parse($value)->format('Y-m-d');
        }

        return '';
    }

    public function setEndDateAttribute($value)
    {
        if ($value) {
            return $this->attributes['end_date'] = Carbon::parse($value)->format('Y-m-d');
        }

        return '';
    }

    public function getStartDateAttribute($value)
    {
        if ($value) {
            return $this->attributes['date'] = Carbon::parse($value)->format('d-m-Y');
        }

        return '';
    }

    public function getEndDateAttribute($value)
    {
        if ($value) {
            return $this->attributes['date'] = Carbon::parse($value)->format('d-m-Y');
        }

        return '';
    }
}
