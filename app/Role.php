<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 *
 * @package App
 * @property string $title
*/
class Role extends Model
{
    protected $fillable = ['name','description'];

    public function users(){
        return $this->hasMany('App\User');
    }
    
    
    
}
