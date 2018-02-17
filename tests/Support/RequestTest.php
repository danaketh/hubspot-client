<?php


use danaketh\HubSpot\Support\Request;
use PHPUnit\Framework\TestCase;



class RequestTest extends TestCase
{
    /**
     * @throws \danaketh\HubSpot\Exception\RequestException
     */
    public function testGet()
    {
        $response = Request::get('http://httpbin.org/get');

        $this->assertArrayHasKey('code', $response);
        $this->assertArrayHasKey('body', $response);
        $this->assertArrayHasKey('origin', $response['body']);
    }




    /**
     * @throws \danaketh\HubSpot\Exception\RequestException
     */
    public function testPost()
    {
        $response = Request::post('http://httpbin.org/post');

        $this->assertArrayHasKey('code', $response);
        $this->assertArrayHasKey('body', $response);
        $this->assertArrayHasKey('origin', $response['body']);
    }




    /**
     * @throws \danaketh\HubSpot\Exception\RequestException
     */
    public function testPut()
    {
        $response = Request::put('http://httpbin.org/put');

        $this->assertArrayHasKey('code', $response);
        $this->assertArrayHasKey('body', $response);
        $this->assertArrayHasKey('origin', $response['body']);
    }




    /**
     * @throws \danaketh\HubSpot\Exception\RequestException
     */
    public function testPatch()
    {
        $response = Request::patch('http://httpbin.org/patch');

        $this->assertArrayHasKey('code', $response);
        $this->assertArrayHasKey('body', $response);
        $this->assertArrayHasKey('origin', $response['body']);
    }




    /**
     * @throws \danaketh\HubSpot\Exception\RequestException
     */
    public function testDelete()
    {
        $response = Request::delete('http://httpbin.org/delete');

        $this->assertArrayHasKey('code', $response);
        $this->assertArrayHasKey('body', $response);
        $this->assertArrayHasKey('origin', $response['body']);
    }
}
