<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Countrie extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'iso2',
        'iso3',
        'phonecode',
        'capital',
        'currency',
        'currency_symbol',
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
        'id',
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


    public function GetAllActive()
    {
        return Countrie::where('status', 'Active')->get();
    } 
}
