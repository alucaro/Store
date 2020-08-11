<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\services\PlaceToPayService;
use App\Transaction;
use Session;
use nusoap_client;
use App\Item;
use App\Order;
use DB;

class ResumenController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (!session()->regenerate()) {
            session()->regenerate();
        }

        if (Session::has('transactionId')) {

            $idbanco = session('transactionId');

            $p2pService = new PlaceToPayService();
            $idTransaction = session('transactionId');
            $idTransaction = end($idTransaction);
            $items = Item::all()->last();
            $orders = Order::all()->last();

            $total = $items['price'];
            $itemId = $items['id'];
            $cantidad = $total / 75000;

            $order = $orders['id'];
            $name = $orders['customer_name'];
            $email = $orders['customer_email'];
            $celular = $orders['customer_mobile'];
            $fecha = $orders['created_at'];

            $transaction = Transaction::create([
                'order_id' => $order,
                'item_id' => $itemId,
                'cantidad' => $cantidad,
                'total' => $order,
                'id_transaction' => $idTransaction,
            ]);

            $resp = $p2pService->getTransactionInformation($idTransaction);

            foreach ($resp as $key => $valor) {
                $reason = $valor["responseReasonText"];
                $reference = $valor["reference"];
                $estado  =  $valor["transactionState"];
            }

            $orders->update([
                'customer_name' => $name,
                'customer_email' => $email,
                'customer_mobile' => $celular,
                'status' => $this->changeState($estado),
            ]);
        }

        return view('/resumen', compact('reference', 'estado', 'reason', 'name', 'fecha'));
    }

    public function changeState($transactionState)
    {
        $state = '';
        switch ($transactionState) {
            case 'NOT_AUTHORIZED':
                $state = 'REJECTED';
                break;

            case 'FAILED':
                $state = 'REJECTED';
                break;

            case 'PENDING':
                $state = 'CREATED';
                break;

            case 'OK':
                $state = 'PAYED';
                break;

            default:
                $state = 'REJECTED';
                break;
        }
        return $state;
    }

    public function redireccion(Request $request)
    {

        if (!session()->regenerate()) {
            session()->regenerate();
        }

        $seed = date('c');
        $secretKey = '024h1IlD';
        $trankey = sha1($seed . $secretKey);
        //PAGO POR PSE

        $item = Order::create([
            'customer_name' => $_POST['nombre'],
            'customer_email' => $_POST['email'],
            'customer_mobile' => $_POST['celular'],
            'status' => 'CREATED',
        ]);

        //if (isset($_POST['banco']) && $_POST['banco'] != '') {
        if (isset($_POST['banco']) && $_POST['banco'] != '') {

            $banco = $_POST['banco'];
            $servicio = 'https://test.placetopay.com/soap/pse/v11/?wsdl'; //url del servicio

            $auth = array(
                'login' => '6dd490faf9cb87a9862245da41170ff2',
                'tranKey' => $trankey,
                'seed' => $seed,
            );

            $payer = array(
                'documentType' => 'CC',
                'document' => '1037390240',
                'firstName' => $_POST['nombre'],
                'lastName' => 'Chavarria',
                'emailAddress' => $_POST['email'],
                'city' => 'Bello',
                'province' => 'Colombia',
                'country' => 'Antioquia',
                'mobile' => $_POST['celular'],
            );

            $transaction = array(
                'bankCode' => $_POST['banco'],
                'bankInterface' => 0,
                'returnURL' => 'http://127.0.0.1:8000/resumen',
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

            $client = new nusoap_client($servicio, implode(" ", array('trace' => true)));
            $resp = $client->call('createTransaction', $arguments);

            Session::push('transactionId', $resp['createTransactionResult']['transactionID']);

            //$_SESSION['transactionId'] = $resp['createTransactionResult']['transactionID'];
            //Change the way to call $_SESSION
            //REDIRECCION AL PSE
            echo  $resp['createTransactionResult']['bankURL'];

            echo '<script>
                    window.location = "' . $resp['createTransactionResult']['bankURL'] . '";
            </script>';
        }
    }
}
