<?php
$base_url = 'https://jsonplaceholder.typicode.com';
$url = $base_url . '/posts';

$response = CallAPI('GET',$url);

$result = json_decode($response, true);
echo $result . '<br/>';

?>
<html>
  <body>
    <h1></h1>
 <p>length = <?php echo count($result);?></p>
    <?php foreach($result as $line ):?>
      <?php foreach($line as $key =>$value ):?>
        <p><?php echo $key.' ' .$value ?></p>
     <?php endforeach ?>
    <?php endforeach ?>
  </body>
</html>

<?php 
function CallAPI($method, $url, $data = false)
{
    $curl = curl_init();

    switch ($method)
    {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);

            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_PUT, 1);
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
echo $result;
// statas code
$code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
echo $code . '<br/>';

    curl_close($curl);

    return $result;
}
?>
