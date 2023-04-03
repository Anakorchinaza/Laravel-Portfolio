<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $guarded = [];

    //create relationship between blog table and blog_category table
    public function category(){
        return $this->belongsTo(BlogCategory::class, 'blog_category_id', 'id');
    }

}
