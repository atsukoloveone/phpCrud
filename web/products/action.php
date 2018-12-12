<?php


//action.php
$upOne = realpath(__DIR__ . '/..');
require_once($upOne . DIRECTORY_SEPARATOR .  'classes' . DIRECTORY_SEPARATOR . 'ProductRestClient.php');
$ini_array = parse_ini_file($upOne . DIRECTORY_SEPARATOR .  'ini' . DIRECTORY_SEPARATOR . 'property.ini');

$base_url = $ini_array['URL'];


if(isset($_POST["action"]))
{
 if($_POST["action"] == 'insert')
 {
  $api_url = $base_url . '/product';
  $form_data = array(
   'name' => $_POST['name'],
   'description'  => $_POST['description'],
   'price'  => $_POST['price'],
   'category_id'  => $_POST['category'] ,
   'created'=> date("Y-m-d H:i:s")
  );

  try {
      $restclient = new ProductRestClient( $api_url );
      $response = $restclient->execute(
          ProductRestClient::REQUEST_TYPE_POST,
          '/create.php',
          $form_data,
          array('Accept' => 'application/json')
      );
      echo $response['body'];
  } catch ( Exception $e ) {
      print_r( $e->getMessage() ) . PHP_EOL;
  }

 }


 if($_POST["action"] == 'fetch_single')
 {
  $api_url = $base_url . '/product';
  $id = $_POST["id"];
  $form_data = array(
     'id'=> $id
  );

  try {
      $restclient = new ProductRestClient( $api_url );
      $response = $restclient->execute(
          ProductRestClient::REQUEST_TYPE_GET,
          '/read_one.php',
          $form_data,
          array('Accept' => 'application/json')
      );
      echo $response['body'];
  } catch ( Exception $e ) {
      print_r( $e->getMessage() ) . PHP_EOL;
  }

  //$response = CallAPI('GET',$api_url, $form_data);
  //echo $response;
 }

 if($_POST["action"] == 'update')
 {
  $api_url = $base_url . '/product';
  $form_data = array(
   'name' => $_POST['name'],
   'description'  => $_POST['description'],
   'price'  => $_POST['price'],
   'category_id'  => $_POST['category'] ,
   'modified'=> date("Y-m-d H:i:s") ,
   'id'   => $_POST['hidden_id']
  );


  try {
      $restclient = new ProductRestClient( $api_url );
      $response = $restclient->execute(
          ProductRestClient::REQUEST_TYPE_POST,
          '/update.php',
          $form_data,
          array('Accept' => 'application/json')
      );
      $result = json_decode($response["body"], true);
      $message= $result["message"];
      echo $message;

  } catch ( Exception $e ) {
      print_r( $e->getMessage() ) . PHP_EOL;
  }

  //$response = CallAPI('POST',$api_url, $form_data);

 }

 if($_POST["action"] == 'delete')
 {
  $id = $_POST['id'];
  $api_url = $base_url . '/product';
  $form_data = array(
     'id'=> $id
  );
  try {
      $restclient = new ProductRestClient( $api_url );
      $response = $restclient->execute(
          ProductRestClient::REQUEST_TYPE_POST,
          '/delete.php',
          $form_data,
          array('Accept' => 'application/json')
      );
      $result = json_decode($response["body"], true);
      $message= $result["message"];
      echo $message;

  } catch ( Exception $e ) {
      print_r( $e->getMessage() ) . PHP_EOL;
  }

  //$response = CallAPI('POST',$api_url, $form_data);
  //echo $response;
 }
}

?>
