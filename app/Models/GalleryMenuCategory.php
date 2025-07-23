<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryMenuCategory extends Model
{
    use HasFactory;
    protected $fillable = ['menu_category_id', 'name', 'image'];

    public function category()
    {
        return $this->belongsTo(MenuCategory::class);
    }
}
