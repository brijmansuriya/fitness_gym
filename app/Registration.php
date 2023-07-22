<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Registration extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image', 'registration_no', 'date', 'name', 'address', 'gender', 'birth_date', 'blood_group', 'mobile_no', 'email', 'relative_name', 'relative_contact',
        'addiction', 'health_note', 'workout_goal', 'months', 'end_date', 'user_id', 'amount', 'payment_id',
    ];

    protected $appends = ['image_url'];

    public function setDateAttribute($value)
    {
        if ($value) {
            return $this->attributes['date'] = Carbon::parse($value)->format('Y-m-d');
        }

        return '';
    }

    public function getNameAttribute($value)
    {
        if ($value) {
            return ucwords($value);
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

    public function getBirthDateAttribute($value)
    {
        if ($value) {
            return $this->attributes['birth_date'] = Carbon::parse($value)->format('d-m-Y');
        }

        return '';
    }

    public function getEndDateAttribute($value)
    {
        if ($value) {
            return $this->attributes['end_date'] = Carbon::parse($value)->format('d-m-Y');
        }

        return '';
    }

    public function getImageUrlAttribute()
    {
        return isset($this->attributes['image']) && \File::exists(public_path('uploads/register/'.$this->attributes['image']))
            ? asset('uploads/register/'.$this->attributes['image'])
            : asset('assets/images/default-image.jpg');
    }

    public function setBirthDateAttribute($value)
    {
        if ($value) {
            return $this->attributes['birth_date'] = Carbon::parse($value)->format('Y-m-d');
        }

        return '';
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
