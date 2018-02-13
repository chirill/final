<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Printer
 *
 * @package App
 * @property string $name
 * @property string $model
 * @property string $mac
 * @property string $ip
 * @property string $location
*/
class Printer extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'model', 'mac', 'ip', 'location_id'];
    
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setLocationIdAttribute($input)
    {
        $this->attributes['location_id'] = $input ? $input : null;
    }
    
    public function location()
    {
        return $this->belongsTo('App\Location')->withTrashed();
    }
    
}
