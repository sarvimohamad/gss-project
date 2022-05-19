<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/local-bank-names', function (Request $request) {
    $url = 'https://185.44.101.11:6966/api/v1.0/bank/services';
    $timestamp = time();
    $data = [
        'time' => $timestamp,
        'lastTime' => 0,
        'type' => 1,
    ];

    $response = sendData($url,$data);
    $list = json_decode($response);
//    dd($list);


    $rows = [];

    foreach ($list->data as $row) {
        $rows[] = [
            'value' => $row->id,
            'text' => $row->name,
            'code' => $row->code,
        ];
    }

    $collection = collect($rows);
    $filtered = $collection->filter(function ($item) use ($request){

        return false !== stristr($item['text'], $request->get('q'));



    });
    return response()->json(array_values($filtered->all()));

})->name('bank.names');


function sendData($url, $data, $arr1 = "", $arr2 = "", $method = "GET")
{
    if (!empty($arr1) && $arr1[0] != "") {
        $filePath = curl_file_create($arr1[2], $arr1[1], $arr1[0]);
        $data["file"] = $filePath;
    }
    if (!empty($arr2) && $arr2[0] != "") {
        $filePath2 = curl_file_create($arr2[2], $arr2[1], $arr2[0]);
        $data["file1"] = $filePath2;
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 0);
    if ($method == "POST") {
        curl_setopt($ch, CURLOPT_POST, 1);
    } else {
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    }
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $timestamp = time();
    $basicAuth = 'melalWebSite:6b64bf5d61198ac1693191e9c40cbff276dcde73fcb39372fded7b0b2ffa92a1:' . $timestamp;
    $base64 = base64_encode($basicAuth);
    $headers = [
        'basicAuth:' . 'Basic ' . $base64
    ];
    // dd('basicAuth:' . 'Basic ' . $base64);
    curl_setopt($ch, CURLOPT_SSL_CIPHER_LIST, 'DEFAULT@SECLEVEL=1');

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    curl_setopt($ch, CURLOPT_TIMEOUT, 100);

    $server_output = curl_exec($ch);
    return $server_output;
    if ($error_number = curl_errno($ch)) {
        if (in_array($error_number, array(CURLE_OPERATION_TIMEDOUT, CURLE_OPERATION_TIMEOUTED))) {
            abort(500, 'timeout');
        }
    }

    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);



}
