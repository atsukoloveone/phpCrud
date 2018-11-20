<?php
$base_url = 'https://qiita.com';
$base_url = 'https://jsonplaceholder.typicode.com';
$tag = 'PHP';

$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, $base_url.'/posts/');
#curl_setopt($curl, CURLOPT_URL, $base_url.'/posts/1');
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // 証明書の検証を行わない
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // curl_execの結果を文字列で返す

$response = curl_exec($curl);
#echo $response . '<br/>';
$result = json_decode($response, true);
echo $result . '<br/>';
// statas code
$code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
echo $code . '<br/>';
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
<?php curl_close($curl); ?>
