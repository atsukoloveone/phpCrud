<?php
$upOne = realpath(__DIR__ . '/..');
require_once($upOne .'/callApi.php');
$base_url = 'http://www.mysite.local/api';
$api_url = $base_url . '/product/read.php';

$response = CallAPI('GET',$api_url);
#var_dump($response);
$result = json_decode($response, true);


$output = '';
$records = $result["records"];
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

      <td><button type="button" name="edit" class="btn btn-warning btn-xs edit" id="'.$row->id.'">Edit</button></td>
   <td><button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row->id.'">Delete</button></td>
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
