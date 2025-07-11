<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class StaticContent extends Model
{

    protected $table = 'static_contents';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sc_for',
        'sc_type',
        'sc_name',
        'sc_title',
        'sc_desc',
        'sc_status',
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

}
