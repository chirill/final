<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Computer
 *
 * @package App
 * @property string $name
 * @property string $mac
 * @property string $os
 * @property string $owner
 * @property string $location
 * @property string $details
 * @property string $factura
 * @property enum $status
*/
class Computer extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'mac', 'os', 'owner', 'details', 'description', 'status', 'location_id'];
    
    

    public static $enum_status = ["Active" => "Active", "Broken" => "Broken", "Service" => "Service", "Free" => "Free"];

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
