<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{

    protected $table = 'usuarios';
    protected $fillable = ['name'];

    protected $hidden = ['password'];

    public function roles(){
        return $this->belongsToMany('App\Role');
    }

    public function hasRole($role){
        $roles = $this->roles()->where('name',$role)->count();
        if($roles == 1){
            return true;
        } 
        return false;
    }
}
