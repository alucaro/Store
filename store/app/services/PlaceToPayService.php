<?php

namespace App\services;

use nusoap_client;

class PlaceToPayService 
{
    /**
     * Get the information of transaction.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getTransactionInformation($idTransaction)
    {          
        $seed = date('c');
        $secretKey = "024h1IlD";
        $trankey = SHA1($seed.$secretKey);
        $servicio="https://test.placetopay.com/soap/pse/v11/?wsdl"; //url del servicio

        $auth = array(
                'login' => '6dd490faf9cb87a9862245da41170ff2',
                'tranKey' => $trankey,
                'seed' => $seed,
                );

        $arguments = array(
                    'auth' => $auth,
                    'transactionID'=>$idTransaction
                    );

        $client = new nusoap_client($servicio, implode(" ",array('trace' => true)));

        $resp = $client->call('getTransactionInformation', $arguments);

        return $resp;                                                    
    }   

    /**
     * Get list names of banks.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getBankList()
    {
        $seed = date('c');
        $secretKey = '024h1IlD';
        $trankey = sha1($seed . $secretKey);

        $servicio = 'https://test.placetopay.com/soap/pse/v11/?wsdl'; //url del servicio
      
        $auth = array(
            'login' => '6dd490faf9cb87a9862245da41170ff2',
            'tranKey' => $trankey,
            'seed' => $seed,
        );

        $arguments = array(
            'auth' => $auth,
        );  

        $client = new nusoap_client($servicio, implode(" ",array('trace' => true))); 
        $resp = $client->call('getBankList', $arguments);

        return $resp;
    }
    


}