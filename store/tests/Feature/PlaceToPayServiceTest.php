<?php

namespace Tests\Feature;

use Tests\TestCase;

use nusoap_client;


class PlaceToPayServiceTest extends TestCase
{

    /** @test */
    public function get_bank_list_test()
    {
        $seed = date('c');
        $secretKey = '024h1IlD';
        $trankey = sha1($seed . $secretKey);

        $servicio = 'https://test.placetopay.com/soap/pse/v11/?wsdl';

        $auth = array(
            'login' => '6dd490faf9cb87a9862245da41170ff2',
            'tranKey' => $trankey,
            'seed' => $seed,
        );

        $arguments = array(
            'auth' => $auth,
        );

        $client = new nusoap_client($servicio, implode(" ", array('trace' => true)));
        $resp = $client->call('getBankList', $arguments);

        $this->assertEquals('BANCAMIA', $resp['getBankListResult']['item'][2]['bankName']);
    }

    /** @test */
    public function get_transaction_information_test()
    {
        $idTransaction = 123456789;
        $seed = date('c');
        $secretKey = "024h1IlD";
        $trankey = SHA1($seed . $secretKey);
        $servicio = "https://test.placetopay.com/soap/pse/v11/?wsdl"; //url del servicio

        $auth = array(
            'login' => '6dd490faf9cb87a9862245da41170ff2',
            'tranKey' => $trankey,
            'seed' => $seed,
        );

        $arguments = array(
            'auth' => $auth,
            'transactionID' => $idTransaction
        );

        $client = new nusoap_client($servicio, implode(" ", array('trace' => true)));

        $resp = $client->call('getTransactionInformation', $arguments);

        $this->assertEquals('Sender', $resp['faultcode']);
    }
}
