<?php
$upOne = realpath(__DIR__ . '/..');
require_once($upOne .'/callApi.php');
$base_url = 'http://www.mysite.local/api';
$api_url = $base_url . '/category/read.php';

$response = CallAPI('GET',$api_url);
#var_dump($response);
$result = json_decode($response, true);
error_log($response, 0);
apache_note("phpdebug", "php debug message: {$_SERVER['REMOTE_ADDR']} ({$_SERVER['HTTP_USER_AGENT']})");
apache_note("phpdebug", $response);

$output = '    <option value="-1">Select category...</option>';
$records = $result["records"];
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
