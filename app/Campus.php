<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model
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
    protected $table = 'campuses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Campus',
        'Latitude',
        'Longitude'
    ];

    public function getDorms() {
        return $this->hasMany('App\Dorm','Campus','ID')->get();
    }
}
