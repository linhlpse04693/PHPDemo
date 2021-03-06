<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Request;

class User extends Authenticatable
{
    use Notifiable;

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

    public function roles(){
        return $this->belongsToMany('App\Role');
    }

    public function requests(){
        return $this->hasMany('App\Request');
    }

    public function hasAnyRoles($roles){
        return null!== $this->roles()->whereIn('name',$roles)->first();
    }

    public function hasAnyRole($role){
        return null!== $this->roles()->where('name',$role)->first();
    }

    public function assignRole($role)
    {
        return $this->roles()->sync(
            Role::whereName($role)->firstOrFail()
        );
    }

    public function hasAnyPendingRequest(){
        return null!==$this->requests()->where('status_id','=','1')->first();
    }

    public function hasBeenDeclined(){
        return null==$this->requests()->where('status_id','=','1')->first()
            && null== $this->roles()->where('name','seller')->first()
            && !null==$this->requests()->where('status_id','=','3')->first();
    }
}
