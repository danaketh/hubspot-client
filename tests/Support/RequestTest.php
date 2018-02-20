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
        $response = Request::post('http://httpbin.org/post', [
            'purpose' => 'test of POST'
        ]);
        $this->assertArrayHasKey('code', $response);
        $this->assertArrayHasKey('body', $response);
        $this->assertArrayHasKey('purpose', $response['body']['form']);
        $this->assertEquals('test of POST', $response['body']['form']['purpose']);
    }




    /**
     * @throws \danaketh\HubSpot\Exception\RequestException
     */
    public function testPut()
    {
        $response = Request::put('http://httpbin.org/put', [
            'purpose' => 'test of PUT'
        ]);
        $this->assertArrayHasKey('code', $response);
        $this->assertArrayHasKey('body', $response);
        $this->assertArrayHasKey('purpose', $response['body']['form']);
        $this->assertEquals('test of PUT', $response['body']['form']['purpose']);
    }




    /**
     * @throws \danaketh\HubSpot\Exception\RequestException
     */
    public function testPatch()
    {
        $response = Request::patch('http://httpbin.org/patch', [
            'purpose' => 'test of PATCH'
        ]);
        $this->assertArrayHasKey('code', $response);
        $this->assertArrayHasKey('body', $response);
        $this->assertArrayHasKey('purpose', $response['body']['form']);
        $this->assertEquals('test of PATCH', $response['body']['form']['purpose']);
    }




    /**
     * @throws \danaketh\HubSpot\Exception\RequestException
     */
    public function testDelete()
    {
        $response = Request::delete('http://httpbin.org/delete');
        $this->assertArrayHasKey('code', $response);
        $this->assertArrayHasKey('body', $response);
        $this->assertEquals(200, $response['code']);
    }
}
