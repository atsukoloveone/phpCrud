<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class ProductRestClientTest extends TestCase
{

  private $base_url = 'http://www.mysite.local/api';
  private $api_url;

  // テスト対象のオジェクト
  private $target = null;

   public function setUp(){
     $this->api_url =  $this->base_url . '/product';
     $this->target = new ProductRestClient($this->api_url);
   }
    public function testCanBeCreatedFromValidProductRestClient(): void
    {
        $this->assertInstanceOf(
           ProductRestClient::class,
           $this->target
        );
    }
    public function testCannotBeCreatedFromInvalidUrl(): void
    {

        $form_data = array(
         'name' => "Taro Yamada",
         'description'  => "Test text",
         'price'  => 2000,
         'category_id'  => 1,
         'created'=> date("Y-m-d H:i:s")
        );
        $form_data = array(
           'id'=> 8
        );
        //$this->expectException(InvalidArgumentException::class);
        $response = $this->target->execute(
            ProductRestClient::REQUEST_TYPE_GET,
            '/read_one.php',
            $form_data,
            array('Accept' => 'application/json')
        );
        $result = json_decode($response["body"], true);
        $this->assertSame("Samsung Galaxy Tab 10.1", $result['name']);

    }


}
