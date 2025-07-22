<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $categories = GalleryCategory::all();
        $selectedCategory = $request->get('category');

        $galleries = Gallery::when($selectedCategory, function ($query, $selectedCategory) {
            $query->where('gallery_category_id', $selectedCategory);
        })->get();

        return view('gallery.index', compact('categories', 'galleries', 'selectedCategory'));
    }
}
