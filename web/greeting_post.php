<?php
require_once(__DIR__ .'/callApi.php');
$base_url = 'https://jsonplaceholder.typicode.com';
$url = $base_url . '/posts';

$data = [
    'userId' => '1',
    'title' => 'atsuko', 
    'body'=> 'sample test',
];

$response = CallAPI('POST',$url,$data);
$result = json_decode($response, true);
echo $response;


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
