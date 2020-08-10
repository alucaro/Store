<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResumenController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('/resumen');
    }

    public function redireccion(Request $request)
    {

        dd(request());
        require_once('./vendor/econea/nusoap/src/nusoap.php');


        $seed = date('c');
        $secretKey = '024h1IlD';
        $trankey = sha1($seed . $secretKey);
        //PAGO POR PSE

        //if (isset($_POST['banco']) && $_POST['banco'] != '') {
        if (1) {

            $banco = 'BANCAMIA';
            $servicio = 'https://test.placetopay.com/soap/pse/v11/?wsdl'; //url del servicio

            $auth = array(
                    'login' => '6dd490faf9cb87a9862245da41170ff2',
                    'tranKey' => $trankey,
                    'seed' => $seed,
            );

            $payer = array(
                    'documentType' => 'CC',
                    'document' => '1037390240',
                    'firstName' => 'Juan',
                    'lastName' => 'Chavarria',
                    'emailAddress' => 'soporte9@placetopay.com',
                    'city' => 'Bello',
                    'province' => 'Colombia',
                    'country' => 'Antioquia',
                    'mobile' => '3104317467',
            );

            $transaction = array(
                    'bankCode' => '1059',
                    'bankInterface' => 0,
                    'returnURL' => 'http://localhost/prueba/RespuestaPSE.php',
                    'reference' => $reference = time(),
                    'description' => 'Pago',
                    'language' => 'ES',
                    'currency' => 'COP',
                    'totalAmount' => 1000,
                    'taxAmount' => 0,
                    'devolutionBase' => 0,
                    'tipAmount' => 0,
                    'payer' => $payer,
                    'ipAddress' => '192.168.1.12',
            );

            $arguments = array(
                    'auth' => $auth,
                    'transaction' => $transaction,
            );

            $client = new nusoap_client($servicio, array('trace' => true));
            $resp = $client->call('createTransaction', $arguments);

            dd($resp);

            $_SESSION['transactionId'] = $resp['createTransactionResult']['transactionID'];
            //REDIRECCION AL PSE
            echo  $resp['createTransactionResult']['bankURL'];

            echo '<script>
                    window.location = "' . $resp['createTransactionResult']['bankURL'] . '";
            </script>';
    }
}
