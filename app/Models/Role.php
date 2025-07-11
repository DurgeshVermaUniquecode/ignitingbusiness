<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use DB;
class Role extends Model
{
    use HasFactory;
    protected $table = 'roles';

    protected $fillable = [
        'id',
        'role_type',
        'role_name',
        'role_show',
        'role_order_by',
        'status',
    ];

    protected $casts = [
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
    ];



    public function users()
    {
        return $this->hasMany(User::class, 'role', 'id');
    }

    public static function roleName($id)
    {
        return self::where('id', $id)->first('role_name');
    }


    public function getByType($type)
    {
        $query = DB::query()
        ->selectRaw('count(*)')
        ->from('users_data')
        ->whereColumn('users_data.role', 'user_role.id');

        $results = DB::query()
        ->select('*')
        ->selectSub($query, 'total_users')
        ->from('user_role')
        ->where('user_role.role_type', $type)
        ->orderBy('user_role.role_order_by')
        ->get();

       return $results;
    }  

}
