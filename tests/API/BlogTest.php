<?php


use danaketh\HubSpot\API\Blog;
use PHPUnit\Framework\TestCase;



class BlogTest extends TestCase
{
    /** @var Blog $api */
    protected $api;




    public function testListBlogs()
    {

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
