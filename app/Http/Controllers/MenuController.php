<?php

namespace App\Http\Controllers;

use App\Models\MenuCategory;
use App\Models\Menu;
use App\Models\MenuAddon;
use App\Models\MenuSubcategory;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    //
    public function index(Request $request)
    {
        $categories = MenuCategory::with('subcategories')->get();

        $selectedCategory = $request->query('category');
        $selectedSubcategory = $request->query('subcategory');

        // Ambil subkategori dari kategori terpilih
        $subcategories = $selectedCategory
            ? MenuSubcategory::where('menu_category_id', $selectedCategory)->get()
            : MenuSubcategory::all();

        // Ambil menu berdasarkan subkategori atau semua kalau kosong
        $menus = Menu::with('variants');

        if ($selectedSubcategory) {
            $menus->where('menu_subcategory_id', $selectedSubcategory);
        } elseif ($selectedCategory) {
            $subcatIds = MenuSubcategory::where('menu_category_id', $selectedCategory)->pluck('id');
            $menus->whereIn('menu_subcategory_id', $subcatIds);
        }

        $menus = $menus->get();

        // Addon tetap ngikut subkategori
        $addon = null;
        $pdfPath = null;

        if ($selectedSubcategory) {
            $subcategory = MenuSubcategory::with('addon')->find($selectedSubcategory);
            $addon = $subcategory?->addon;
            $pdfPath = $subcategory?->pdf_path;
        }

        return view('menu.index', compact(
            'categories',
            'subcategories',
            'menus',
            'addon',
            'selectedCategory',
            'selectedSubcategory',
            'pdfPath'
        ));
    }
}
