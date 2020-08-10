<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use nusoap_client;

class RegistroController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        dd('hola');
        //$client = new nusoap_client('example.com/api/v1', 'wsdl');

        // $seed = date('c');
        // $secretKey = '024h1IlD';
        // $trankey = sha1($seed . $secretKey);

        // $servicio = 'https://test.placetopay.com/soap/pse/v11/?wsdl'; //url del servicio
        // //AUTENTICACION
        // $auth = array(
        //     'login' => '6dd490faf9cb87a9862245da41170ff2',
        //     'tranKey' => $trankey,
        //     'seed' => $seed,
        // );

        // $arguments = array(
        //     'auth' => $auth,
        // );
        // $client = new nusoap_client($servicio, array('trace' => true)); // en lugar de SoapClient  se utiliza nusoap_client
        // // LAMADA AL METODO GETBANKLIST DE PSE
        // $resp = $client->call('getBankList', $arguments);

        // $resp1 = $resp['getBankListResult']['item'];

        return view('/registro');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'cantidad' => 'required',
            'total' => 'required',
        ]);
        $total = request()->total;
        $cantidad = request()->cantidad;

        $seed = date('c');
        $secretKey = '024h1IlD';
        $trankey = sha1($seed . $secretKey);

        $servicio = 'https://test.placetopay.com/soap/pse/v11/?wsdl'; //url del servicio
        //AUTENTICACION
        $auth = array(
            'login' => '6dd490faf9cb87a9862245da41170ff2',
            'tranKey' => $trankey,
            'seed' => $seed,
        );

        $arguments = array(
            'auth' => $auth,
        );
        //$arr = array('trace' => true);
        $client = new nusoap_client($servicio, implode(" ",array('trace' => true))); // en lugar de SoapClient  se utiliza nusoap_client
        //dd($client);
        // LAMADA AL METODO GETBANKLIST DE PSE
        $resp = $client->call('getBankList', $arguments);

        $bancos = $resp['getBankListResult']['item'];

        //dd($bancos[1]['bankName']);
        return view('/registro', compact('total', 'cantidad', 'bancos'));
    }
}
