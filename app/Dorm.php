<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dorm extends Model
{
    /**
     * The primary key of the table
     * @var string
     */
    protected $primaryKey = "ID";

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'dorms';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ID',
        'Name',
        'AddressLine1',
        'AddressLine2',
        'City',
        'Zip',
        'Latitude',
        'Longitude',
        'Rate',
        'Rooms',
        'MobileNumber',
        'LandLineNumber',
        'Owner',
        'BusinessPermit',
        'BusinessPermitImage',
        'Amenities'
    ];

    public function getOwner() {
        return $this->belongsTo('App\User','Owner','ID')->first();
    }
}
