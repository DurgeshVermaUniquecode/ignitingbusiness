<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Wallet extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'ref_right_balance',
        'ref_left_balance',
        'ref_direct_balance',
        'main_balance',
        'dmt_balance',
        'aeps_balance',
        'digi_balance',
        'vps_balance',
        'bonus_balance',
    ];

    protected $casts = [
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
    ];

    public function user(){
        return  $this->belongsTo(User::class);
    }

}
