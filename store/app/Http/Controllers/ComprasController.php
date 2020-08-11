<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ComprasController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $item = Item::first();

        return view('/compras', compact('item'));
    }
}
