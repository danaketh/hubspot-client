<?php


use danaketh\HubSpot\API\Blog;
use danaketh\HubSpot\Exception\RequestException;
use PHPUnit\Framework\TestCase;



class BlogTest extends TestCase
{
    /** @var Blog $api */
    protected $api;




    public function testListBlogs()
    {
        try {
            $blogs = $this->api->list();
        } catch (RequestException $e) {
            $this->fail($e->getMessage());
        }

        $this->assertArrayHasKey('objects', $blogs);
    }




    protected function setUp()
    {
        $this->api = new Blog('demo');

        parent::setUp();
    }




    protected function tearDown()
    {
        unset($this->api);

        parent::tearDown();
    }
}
