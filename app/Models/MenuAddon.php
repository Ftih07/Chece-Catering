<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuAddon extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description'];

    public function subcategories()
    {
        return $this->hasMany(MenuSubcategory::class);
    }
}
