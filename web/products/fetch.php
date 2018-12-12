<?php
$upOne = realpath(__DIR__ . '/..');
require_once($upOne . DIRECTORY_SEPARATOR .  'classes' . DIRECTORY_SEPARATOR . 'ProductRestClient.php');
$ini_array = parse_ini_file($upOne . DIRECTORY_SEPARATOR .  'ini' . DIRECTORY_SEPARATOR . 'property.ini');

$base_url = $ini_array['URL'];

$api_url = $base_url . '/product';

try {
    $restclient = new ProductRestClient( $api_url );
    $response = $restclient->execute(
        ProductRestClient::REQUEST_TYPE_GET,
        '/read.php',
        $form_data,
        array('Accept' => 'application/json')
    );

} catch ( Exception $e ) {
    print_r( $e->getMessage() ) . PHP_EOL;
}

#var_dump($response);

$records = json_decode( $response['body'], true);

error_log($response['body'], 0);
apache_note("phpdebug", "php debug message: {$_SERVER['REMOTE_ADDR']} ({$_SERVER['HTTP_USER_AGENT']})");
apache_note("phpdebug", $response['body']);

$output = '';
$records = $records["records"];
if(count($records) > 0)
{
 foreach($records as $row)
 {
  $output .= '
  <tr>
   <td>'.$row["name"].'</td>
   <td>'.$row["description"].'</td>
   <td>$'.number_format((float)round( $row["price"] ,2, PHP_ROUND_HALF_DOWN),2,'.',',')  .'</td>
   <td>'.$row["category_name"].'</td>

      <td><button type="button" name="edit" class="btn btn-warning btn-xs edit" id="'.$row["id"].'">Edit</button></td>
   <td><button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["id"].'">Delete</button></td>
  </tr>
  ';
 }
}
else
{
 $output .= '
 <tr>
  <td colspan="4" align="center">No Data Found</td>
 </tr>
 ';
}

echo $output;

?>
