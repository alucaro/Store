<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use Session;
use nusoap_client;
use App\Item;
use App\Order;
use DB;

class OrdenesController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (!session()->regenerate())
        {
            session()->regenerate();
        }        
        //$transactions = Transaction::with('order')->get();
        //$orders = Order::all();
        $orders = Order::with('transactions')->get();
        
        return view('/ordenes', compact('orders'));
    }
}
