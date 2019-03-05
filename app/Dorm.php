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

    public function getAverageRating($criteria)
    {
        $ratings = $this->hasMany('App\Rating','Dorm','ID')->get();

        $actualRating = 0.0;
        foreach($ratings as $rating) {
            $actualRating += $rating->{$criteria};
        }
        if(count($ratings)==0) {
            return 0;
        }
        else {
            return $actualRating/count($ratings);
        }
    }

    public function getOverallAverageRating() {
        $ratings = $this->hasMany('App\Rating','Dorm','ID')->get();

        $communication = 0.0;
        $cleanliness = 0.0;
        $location = 0.0;
        $value = 0.0;
        foreach($ratings as $rating) {
            $communication += $rating->Communication;
            $cleanliness += $rating->Cleanliness;
            $location += $rating->Location;
            $value += $rating->Value;
        }





        if(count($ratings)==0) {
            return 0;
        }
        else {


            $s1 = $communication / count($ratings);
            $s2 = $cleanliness / count($ratings);
            $s3 = $location / count($ratings);
            $s4 = $value / count($ratings);

            $subTotal = $s1+$s2+$s3+$s4;


            return $subTotal/4;
        }
    }

    public function getTotalRatings()
    {
        $ratings = $this->hasMany('App\Rating','Dorm','ID')->get();
        return count($ratings);
    }

    public function getRatings()
    {
        return $this->hasMany('App\Rating','Dorm','ID')->get();
    }
}
