<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function galleries()
    {
        return $this->hasMany(GalleryMenuCategory::class);
    }

    public function subcategories()
    {
        return $this->hasMany(MenuSubcategory::class);
    }

    public function thumbnail()
    {
        // Ambil satu gambar saja (pertama)
        return $this->hasOne(GalleryMenuCategory::class)->latest();
    }
}
