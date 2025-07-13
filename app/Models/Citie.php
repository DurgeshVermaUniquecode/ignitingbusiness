<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Citie extends Model
{

    protected $table = 'cities';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'state_id',
        'state_code',
        'country_id',
        'country_code',
        'latitude',
        'longitude',
        'flag',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
    ];

    public static function GetAllCountryData($cid)
    {
        return Citie::LeftJoin('countries', 'countries.id', '=', 'cities.country_id')->LeftJoin('states', 'states.id', '=', 'cities.state_id')->where('cities.country_id', $cid)->select('cities.*', 'states.name AS state_name', 'countries.name AS country_name')->get();
    }

    public static function findByState($sid)
    {
        return Citie::LeftJoin('countries', 'countries.id', '=', 'cities.country_id')->LeftJoin('states', 'states.id', '=', 'cities.state_id')->where('cities.state_id', $sid)->select('cities.*', 'states.name AS state_name', 'countries.name AS country_name')->get();
    }
    
    public static function findByActiveState($sid)
    {
        return Citie::LeftJoin('countries', 'countries.id', '=', 'cities.country_id')->LeftJoin('states', 'states.id', '=', 'cities.state_id')->where('cities.state_id', $sid)->where('cities.status', 'Active')->select('cities.*', 'states.name AS state_name', 'countries.name AS country_name')->get();
    }
}
