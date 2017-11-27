<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Role;
class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
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
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    //protected $dates = ['deleted_at'];


    public function roles(){
        return $this->belongsTo('App\Role','role_id');
    }

    public function hasRole($title){
        //$role = new Role();
        $user_role = $this->roles; // retrieve role user $this->roles()// use "()" error;
      // dd($user_role->role_name);
        if (!is_null($user_role)) {
            # code...
            $user_role = $user_role->role_name;
          //  dd($user_role);
        }

        return ($user_role === $title)?true : false;

    }


    public function product()
    {
        return $this->hasMany('App\Product','user_id','id');
    }
}

