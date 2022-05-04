<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TripayController extends Controller
{
    public function getPaymentChannels()
    {
        $apiKey = env('TRIPAY_API_KEY');

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_FRESH_CONNECT  => true,
            CURLOPT_URL            => 'https://tripay.co.id/api-sandbox/merchant/payment-channel',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER         => false,
            CURLOPT_HTTPHEADER     => ['Authorization: Bearer ' . $apiKey],
            CURLOPT_FAILONERROR    => false
        ));

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        $response = json_decode($response);
        dd($response);
        return empty($error) ? $response : $error;
    }

    public function requestTransaction($method, $roomsData)
    {
        $apiKey       = env('TRIPAY_API_KEY');
        $privateKey   = env('TRIPAY_PRIVATE_KEY');
        $merchantCode = env('TRIPAY_MERCHANT_CODE');
        $merchantRef  = 'KS-' . time();

        $user = auth()->user();

        $data = [
            'method'         => $method,
            'merchant_ref'   => $merchantRef,
            'amount'         => $roomsData->harga_sewa,
            'customer_name'  => $user->name,
            'customer_email' => $user->email,
            'customer_phone' => '081234567890',
            'order_items'    => [
                [
                    // 'sku'         => 'FB-06',
                    'name'        => $roomsData->kode_ruangan,
                    'price'       => $roomsData->harga_sewa,
                    'quantity'    => 1,
                    // 'product_url' => 'https://tokokamu.com/product/nama-produk-1',
                    // 'image_url'   => 'https://tokokamu.com/product/nama-produk-1.jpg',
                ],
            ],
            // 'return_url'   => 'https://domainanda.com/redirect',
            'expired_time' => (time() + (24 * 60 * 60)), // 24 jam
            'signature'    => hash_hmac('sha256', $merchantCode . $merchantRef . $roomsData->harga_sewa, $privateKey)
        ];

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_FRESH_CONNECT  => true,
            CURLOPT_URL            => 'https://tripay.co.id/api-sandbox/transaction/create',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER         => false,
            CURLOPT_HTTPHEADER     => ['Authorization: Bearer ' . $apiKey],
            CURLOPT_FAILONERROR    => false,
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => http_build_query($data)
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        $response = json_decode($response)->data;
        dd($response);

        echo empty($error) ? $response : $error;
    }
}
