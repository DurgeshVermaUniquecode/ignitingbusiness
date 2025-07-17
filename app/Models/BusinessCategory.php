<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessCategory extends Model
{
    protected $table = 'business_categories';
    protected $primaryKey = 'id';
    protected $fillable = ['package_id','name','image','description','status'];

    public function package(){
        return $this->belongsTo(Packages::class);
    }

      public function courses(){
        return $this->belongsTo(Courses::class);
    }

}
