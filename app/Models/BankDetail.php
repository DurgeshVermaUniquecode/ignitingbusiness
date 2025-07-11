<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class UserBankDetail extends Model
{
    use HasFactory;
    protected $table = 'bank_details';

    protected $fillable = [
        'id',
        'user_id',
        'user_name_at_bank',
        'account_number',
        'name',
        'branch',
        'ifscode',
        'cancele_chq',
        'admin_reply',
        'status',
    ];

    protected $casts = [
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
    ];

}
