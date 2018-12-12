<?php
$upOne = realpath(__DIR__ . '/..');
require_once($upOne . DIRECTORY_SEPARATOR .  'classes' . DIRECTORY_SEPARATOR . 'ProductRestClient.php');
$ini_array = parse_ini_file($upOne . DIRECTORY_SEPARATOR .  'ini' . DIRECTORY_SEPARATOR . 'property.ini');

$base_url = $ini_array['URL'];


$api_url = $base_url . '/category';

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
$records = $records["records"];

error_log($response['body'], 0);
apache_note("phpdebug", "php debug message: {$_SERVER['REMOTE_ADDR']} ({$_SERVER['HTTP_USER_AGENT']})");
apache_note("phpdebug", $response['body']);

$output = '    <option value="-1">Select category...</option>';

if(count($records) > 0)
{
 foreach($records as $row)
 {
  $output .= '
      <option key=' . $row["id"] . ' value=' .$row["id"] .'>' . $row["name"] . '</option>
  ';
 }
}
else
{
 $output .= ' ';
}

echo $output;

?>
