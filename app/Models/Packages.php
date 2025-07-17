<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Packages extends Model
{
    protected $table = 'packages';
    protected $primaryKey = 'id';
    protected $fillable = ['name','image','gst','amount','description','status'];

    public function business_category()
{
    return $this->hasMany(BusinessCategory::class);
}


}
