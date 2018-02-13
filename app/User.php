<?php
namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Notifications\ResetPassword;
use Hash;

/**
 * Class User
 *
 * @package App
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $role
 * @property string $remember_token
*/
class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $fillable = ['name', 'email', 'password', 'remember_token', 'role_id','location_id','department_id','status_id'];
    
    
    
    /**
     * Hash password
     * @param $input
     */
    public function setPasswordAttribute($input)
    {
        if ($input)
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
    }
    

    /**
     * Set to null if empty
     * @param $input
     */
//    public function setRoleIdAttribute($input)
//    {
//        $this->attributes['role_id'] = $input ? $input : null;
//    }
    
    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function location(){
        return $this->belongsTo('App\Location');
    }

    public function department(){
        return $this->belongsTo('App\Department');
    }

    public function status(){
        return $this->belongsTo('App\Status');
    }
    
    
    

    public function sendPasswordResetNotification($token)
    {
       $this->notify(new ResetPassword($token));
    }
}
