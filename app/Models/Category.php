<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    // In your Category model
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class, 'category_id');
    }
    public function childcategories()
    {
        return $this->hasMany(ChildCategory::class, 'childcategory_id');
    }

    public function productgallery(){
        return $this->hasMany(ProductGallery::class,'productgallery_id');
    }
    
}
