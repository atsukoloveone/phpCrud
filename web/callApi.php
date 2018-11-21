<?php
function CallAPI($method, $url, $data = false)
{
    $curl = curl_init();

    switch ($method)
    {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);

            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data, true));
                //echo 'data2' . json_encode($data, true) . '<br>';
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_PUT, 1);
            //echo $data;
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }

    // Optional Authentication:
    #curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    #curl_setopt($curl, CURLOPT_USERPWD, "username:password");

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // 証明書の検証を行わない

    $result = curl_exec($curl);
// statas code
$code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
//echo $code . '<br/>';

    curl_close($curl);

    return $result;
}
?>
