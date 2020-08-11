<?php

namespace App\Http\Controllers;

use App\services\PlaceToPayService;
use Illuminate\Http\Request;
use nusoap_client;
use App\Item;

class RegistroController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('/registro');
    }

    public function store(Request $request)
    {

        $p2pService = new PlaceToPayService();

        $this->validate($request, [
            'cantidad' => 'required',
            'total' => 'required',
        ]);

        $total = request()->total;
        $cantidad = request()->cantidad;

        $resp = $p2pService->getBankList();

        $bancos = $resp['getBankListResult']['item'];

        return view('/registro', compact('total', 'cantidad', 'bancos'));
    }
}
