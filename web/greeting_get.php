<?php
require_once(__DIR__ .'/callApi.php');
$base_url = 'https://jsonplaceholder.typicode.com';
$url = $base_url . '/posts';

$response = CallAPI('GET',$url);
$result = json_decode($response, true);

?>

<html>
<head>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
  <body>
    <h1></h1>
 <p>length = <?php echo count($result);?></p>
<ul>
    <?php foreach($result as $line ):
    $title = $line["title"];
    $body = $line["body"];
    $userId = $line["userId"];
    $id = $line["id"];
?>
  <li>
    <span><?php echo $id; ?></span>
    <span><?php echo $title; ?></span>
    <p><?php echo $body; ?></p>
  </li>
  <?php endforeach; ?>
</ul>
  </body>
</html>
