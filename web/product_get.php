<?php
require_once(__DIR__ .'/callApi.php');
$base_url = 'http://www.mysite.local/api';
$url = $base_url . '/product/read.php';

$response = CallAPI('GET',$url);
#var_dump($response);
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
    <?php
    $records = $result["records"];
    foreach($records as $line ):
    $name = $line["name"];
    $description = $line["description"];
    $category_name = $line["category_name"];
    $id = $line["id"];
?>
  <li>
    <span><?php echo $id; ?></span>
    <span><?php echo $name; ?></span>
    <p><?php echo $description; ?></p>
  </li>
  <?php endforeach; ?>
</ul>
  </body>
</html>
