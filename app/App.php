<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class App
 *
 * @package App
 * @property string $name
 * @property string $description
 * @property string $configs
 * @property string $path
*/
class App extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'description', 'configs', 'path'];
    
    
    
}
