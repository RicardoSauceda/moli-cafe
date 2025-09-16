<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        // Obtener todas las categorías con sus productos disponibles
        $categories = Category::with(['products' => function ($query) {
            $query->where('available', true);
        }])->get();

        return view('landing', compact('categories'));
    }
}