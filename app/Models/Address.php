<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'mobile_number',
        'type',
        'address',
        'street',
        'city',
        'state',
        'country',
        'zip',
        'default',
        'default',
        'longitude',
        'latitude',
        'status',
    ];

    protected $casts = [
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
    ];

    public static function get()
    {  
        return UserAddress::leftJoin('countries', 'user_address.country', '=', 'countries.id')
        ->leftJoin('states', 'user_address.state', '=', 'states.id')
        ->leftJoin('cities', 'user_address.city', '=', 'cities.id')
        ->leftJoin('users', 'user_address.user_id', '=', 'users.id')
        ->select(   "countries.name as country_name",
                    "states.name as state_name",
                    "cities.name as city_name",
                    "users.name as user_name",
                    "users.phone_number as user_phone_number",
                    "users.email as user_email",
                    "users.reg_code as user_code",
                    "user_address.*")
        ->orderBy('id','desc')
        ->get();
    } 

    public static function findByUserId($id)
    {  
        return UserAddress::leftJoin('countries', 'user_address.country', '=', 'countries.id')
        ->leftJoin('states', 'user_address.state', '=', 'states.id')
        ->leftJoin('cities', 'user_address.city', '=', 'cities.id')
        ->select("countries.name as country_name",
                 "states.name as state_name",
                 "cities.name as city_name",
                 "user_address.*")
        ->where('user_address.user_id', $id)
        ->where('user_address.status', 'Active')
        ->first();
    } 

    public static function getByUserId($id)
    {  
        return UserAddress::leftJoin('countries', 'user_address.country', '=', 'countries.id')
        ->leftJoin('states', 'user_address.state', '=', 'states.id')
        ->leftJoin('cities', 'user_address.city', '=', 'cities.id')
        ->select("countries.name as country_name",
                 "states.name as state_name",
                 "cities.name as city_name",
                 "user_address.*")
        ->where('user_address.user_id', $id)
        ->where('user_address.status', 'Active')
        ->orderBy('id','desc')
        ->get();
    } 

    public static function getById($id)
    {  
        return UserAddress::leftJoin('countries', 'user_address.country', '=', 'countries.id')
        ->leftJoin('states', 'user_address.state', '=', 'states.id')
        ->leftJoin('cities', 'user_address.city', '=', 'cities.id')
        ->select("countries.name as country_name",
                 "states.name as state_name",
                 "cities.name as city_name",
                 "user_address.*")
        ->where('user_address.id', $id)
        ->where('user_address.status', 'Active')
        ->orderBy('id','desc')
        ->first();
    } 

}
