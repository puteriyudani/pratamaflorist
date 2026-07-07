<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::with([
            'products' => function ($query) {
                $query->latest();
            }
        ])->orderBy('nama_kategori')->get();

        return view('home', compact('kategoris'));
    }
}
