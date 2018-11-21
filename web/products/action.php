<?php

//action.php
$upOne = realpath(__DIR__ . '/..');
require_once($upOne .'/callApi.php');
$base_url = 'http://www.mysite.local/api';
$api_url = $base_url . '/product/create.php';

if(isset($_POST["action"]))
{
 if($_POST["action"] == 'insert')
 {
  $form_data = array(
   'name' => $_POST['name'],
   'description'  => $_POST['description'],
   'price'  => $_POST['price'],
   'category_id'  => $_POST['category'] ,
   'created'=> date("Y-m-d H:i:s")
  );


  //echo 'data1' . json_encode($form_data, true) . '<br>';
  $response = CallAPI('POST',$api_url, $form_data);

  $result = json_decode($response, true);
    $message= $result["message"];
    echo $message;
 }

}
?>
