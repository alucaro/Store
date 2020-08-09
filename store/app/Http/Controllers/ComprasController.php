<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComprasController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('/compras');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'cantidad' => 'required',
            'total' => 'required',
        ]);
        $total = request()->total;
        $cantidad = request()->cantidad;

        return view('/registro', compact('total', 'cantidad'));
    }
}
