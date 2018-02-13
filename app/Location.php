<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Location
 *
 * @package App
 * @property string $name
 * @property string $address
*/
class Location extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'address','phone','fax'];

    public function users(){
        return $this->hasMany('App\User');
    }

    public function locations(){
        return $this->hasMany('App\Computer');
    }

    public function departments(){
        return $this->belongsToMany('App\Department');
    }
    
    
}
