<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\VerifyApiEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, Notifiable;

    public function roles(){
        return $this->belongsTo('App\Models\Role');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    public function home()
    {
        return $this->hasOne('App\Models\Home', 'admin_id');
    }

    public function scholarships()
    {
        return $this->hasMany('App\Models\Scholarship', 'scholar_id');
    }

    public function profile()
    {
        return $this->hasOne('App\Models\Profile');
    }

    public function sendApiEmailVerificationNotification()
    {
        $this->notify(new VerifyApiEmail);
    }
}
