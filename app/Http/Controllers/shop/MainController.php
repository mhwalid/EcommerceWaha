<?php

namespace App\Http\Controllers\shop;

use App\Http\Controllers\Controller;
use App\Produit;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {

        $produits = Produit::all();

        return view('Tshort/index', compact('produits'));
    }
}
