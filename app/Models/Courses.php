<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
     protected $table = 'courses';
    protected $primaryKey = 'id';
    protected $fillable = ['business_category_id','slug','title','path','file_type','description','status'];

     public function business_category(){
        return $this->hasMany(Courses::class);
    }
}
