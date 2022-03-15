<?php

function sendData($url, $data, $arr1 = "", $arr2 = "", $method = "POST")
{
    $basicAuthentication = "Basic " . base64_encode("fintech:fintech");
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
    $headers = [
        'Authorization:' . $basicAuthentication,
        "Content-Type:application/json"
    ];

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    curl_setopt($ch, CURLOPT_TIMEOUT, 100);

    $server_output = curl_exec($ch);

    if ($error_number = curl_errno($ch)) {
        if (in_array($error_number, array(CURLE_OPERATION_TIMEDOUT, CURLE_OPERATION_TIMEOUTED))) {
            abort(500, 'timeout');
        }
    }

    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    $dataArray = ["data" => json_decode($server_output, true), "responseCode" => $httpcode];
    return $dataArray;
}

?>
