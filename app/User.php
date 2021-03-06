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
        'name', 'email', 'password', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function gallery()
    {
        return $this->belongsTo('App\Gallery');
    }
    public function role()
    {
        return $this->belongsTo('App\Role');
    }
    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }

    public function hasRole($role)
    {
        if ($this->role()->where('type', $role)->first()) {
            return true;
        }
        return false;
    }

    public function articles()
    {
        return $this->hasMany('App\Article');
    }

    public function novelties()
    {
        return $this->hasMany('App\Novelty');
    }

    public function galleries()
    {
        return $this->hasMany('App\Gallery');
    }

}
