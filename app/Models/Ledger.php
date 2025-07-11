<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'user_id',
        'trans_id',
        'refrence_id',
        'old_bal',
        'current_bal',
        'cramount',
        'dramount',
        'cgst',
        'sgst',
        'ledger_type',
        'bal_type',
        'trans_from',
        'description'
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

}
