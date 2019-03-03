<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
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
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ID',
        'Username',
        'Password',
        'EmailAddress',
        'LastName',
        'FirstName',
        'AccessLevel',
        'Status'
    ];

    public function isAdministrator() {
        return $this->AccessLevel == 1;
    }

    public function getDormitory() {
        return $this->hasOne('App\Dorm','Owner','ID')->first();
    }

    public static function GenerateUsernameForDormitoryUser($nameOfDorm) {
        $nameOfDorm = preg_replace('/[^\w ]/', '', $nameOfDorm);
        $pieces = explode(' ', $nameOfDorm);
        $pieces = array_slice($pieces,0,2);
        $username = join('', $pieces);
        return strtolower(sprintf("db_$username"));
    }
}