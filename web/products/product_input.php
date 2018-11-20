<?php
require_once(__DIR__ .'/callApi.php');
$base_url = 'http://www.mysite.local/api';
$url = $base_url . '/product/create.php';



$data = array(
    'name' => 'Amazing Pillow 2.0',
    'price' => '199',
    'description' => 'The best pillow for amazing programmers.',
    'category_id' => 2,
    'created'=> '2018-06-01 00:35:07'
);

echo 'data1' . json_encode($data, true) . '<br>';

$response = CallAPI('POST',$url,$data);
$result = json_decode($response, true);
echo $response;


?>

<html>
<head>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
  <body>
    <h1></h1><form onSubmit={this.onSave}>
              <table className='table table-bordered table-hover'>
                  <tbody>
                  <tr>
                      <td>Name</td>
                      <td>
                          <input
                              type='text'
                              className='form-control'
                              value={this.state.name}
                              required
                              onChange={this.onNameChange} />
                      </td>
                  </tr>

                  <tr>
                      <td>Description</td>
                      <td>
                          <textarea
                              type='text'
                              className='form-control'
                              required
                              value={this.state.description}
                              onChange={this.onDescriptionChange}></textarea>
                      </td>
                  </tr>

                  <tr>
                      <td>Price ($)</td>
                      <td>
                          <input
                              type='number'
                              step="0.01"
                              className='form-control'
                              value={this.state.price}
                              required
                              onChange={this.onPriceChange}/>
                      </td>
                  </tr>

                  <tr>
                      <td>Category</td>
                      <td>
                          <select
                              onChange={this.onCategoryChange}
                              className='form-control'
                              value={this.state.selectedCategoryId}>
                              <option value="-1">Select category...</option>
                              {categoriesOptions}
                              </select>
                      </td>
                  </tr>

                  <tr>
                      <td></td>
                      <td>
                          <button
                              className='btn btn-primary'
                              onClick={this.onSave}>Save Changes</button>
                      </td>
                  </tr>

                  </tbody>
              </table>
          </form>
        </body>
      </html>
