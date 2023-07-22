<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'mobile_no', 'image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        return isset($this->attributes['image']) && \File::exists(public_path('uploads/users/'.$this->attributes['image']))
            ? asset('uploads/users/'.$this->attributes['image'])
            : asset('assets/images/default-image.jpg');
    }

    public function getNameAttribute($value)
    {
        if ($value) {
            return ucwords($value);
        }

        return '';
    }
}
