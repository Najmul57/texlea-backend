<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subcategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    // In your Subcategory model
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
