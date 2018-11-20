<?php
require_once(__DIR__ .'/callApi.php');
$base_url = 'http://www.mysite.local/api';
$url = $base_url . '/product/create.php';



$data = array(
    'name' => 'Amazing Pillow 2.0',
    'price' => '199',
    'description' => 'The best pillow for amazing programmers.',
    'category_id' => 2,    
    'created'=> '2018-06-01 00:35:07'
);

echo 'data1' . json_encode($data, true) . '<br>';

$response = CallAPI('POST',$url,$data);
$result = json_decode($response, true);
echo $response;


?>

<html>
<head>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
  <body>
    <h1></h1>
 <p>length = <?php echo count($result);?></p>
<ul>
    <?php 
    $message= $result["message"];
?>
  <li>
    <span><?php echo $message ?></span>

  </li>

</ul>
  </body>
</html>
