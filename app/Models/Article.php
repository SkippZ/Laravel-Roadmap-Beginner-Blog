<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    // protected $attributes = [
    //     'category_id' => null
    // ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
