<?php

//action.php
$upOne = realpath(__DIR__ . '/..');
require_once($upOne .'/callApi.php');
$base_url = 'http://www.mysite.local/api';


if(isset($_POST["action"]))
{
 if($_POST["action"] == 'insert')
 {
  $api_url = $base_url . '/product/create.php';
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


 if($_POST["action"] == 'fetch_single')
 {
  $api_url = $base_url . '/product/read_one.php';
  $id = $_POST["id"];
  $form_data = array(
     'id'=> $id
  );
  $response = CallAPI('GET',$api_url, $form_data);
  echo $response;
 }

 if($_POST["action"] == 'update')
 {
  $api_url = $base_url . '/product/update.php';
  $form_data = array(
   'name' => $_POST['name'],
   'description'  => $_POST['description'],
   'price'  => $_POST['price'],
   'category_id'  => $_POST['category'] ,
   'modified'=> date("Y-m-d H:i:s") ,
   'id'   => $_POST['hidden_id']
  );
  $response = CallAPI('POST',$api_url, $form_data);
  $result = json_decode($response, true);
    $message= $result["message"];
    echo $message;
 }

 if($_POST["action"] == 'delete')
 {
  $id = $_POST['id'];
  $api_url = $base_url . '/product/delete.php';
  $form_data = array(
     'id'=> $id
  );
  $response = CallAPI('POST',$api_url, $form_data);
  echo $response;
 }
}

?>
