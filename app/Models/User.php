<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Role;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

     protected $primaryKey = 'id';
    protected $fillable = [
        'code',
        'name',
        'father_name',
        'mother_name',
        'email',
        'role',
        'image',
        'gender',
        'dob',
        'status',
        'password',
        'fcm_token',
        'parent_id',
        'referral_id',
        'phone_number',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function roles()
    {
        return $this->belongsTo(Role::class, 'role', 'id');
    }


    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function bank()
    {
        return $this->hasOne(BankDetail::class);
    }

    public function kyc()
    {
        return $this->hasOne(Kyc::class);
    }

    public function children()
    {
        return $this->hasMany(User::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(User::class, 'parent_id');
    }



}
