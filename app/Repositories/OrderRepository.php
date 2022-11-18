<?php 

namespace App\Repositories; 
use GuzzleHttp\Client; 

class OrderRepository {


    public function getChargeRequest($amount, $name, $email, $number){
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://api.tap.company/v2/charges',
            // You can set any number of default request options.
            'timeout'  => 30.0,
        ]);

        $headers = [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer sk_test_XKokBfNWv6FIYuTMg5sLPjhJ'
        ];

        $response = $client->request('POST', 'charges', [
            'headers' => $headers,
            'form_params' => [
                'amount' => $amount,
                'currency' => 'AED',
                'customer' => [ 
                    'first_name' => $name,
                    'email' => $email,
                    'phone' => [
                        'country_code' => '971',
                        'number' => $number
                    ]
                    ],
                'source' => ['id' => 'src_card'],
                'redirect'=> ['url' =>'http://127.0.0.1:8000/order/chargeUpdate']
            ]
        ]);

        $info = json_decode($response->getBody(), true);

        return $info['transaction']['url'];
        
    }

    public function validateRequest($id){

        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://api.tap.company/v2/charges/',
            // You can set any number of default request options.
            'timeout'  => 30.0,
        ]);

        $headers = [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer sk_test_XKokBfNWv6FIYuTMg5sLPjhJ'
        ];

        $response = $client->request('GET', $id, [
            'headers' => $headers
        ]);

        $info = json_decode($response->getBody(), true);

        return $info;
    }
}


?>