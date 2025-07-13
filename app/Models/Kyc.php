<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Kyc extends Model
{
    use HasFactory;
    protected $table = 'kycs';

    protected $fillable = [
        'id',
        'user_id',
        'user_image',
        'id_proof_type',
        'id_proof_img',
        'id_proof_no',
        'id_proof_veryfy',
        'address_proof_type',
        'address_proof_front_img',
        'address_proof_back_img',
        'address_proof_no',
        'address_proof_veryfy',
        'other_proof_img',
        'other_proof_no',
        'other_proof_veryfy',
        'other_proof_type',
        'remarks',
        'status',
    ];

    protected $casts = [
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
    ];

    public function user(){
        return  $this->belongsTo(User::class);
    }

}
