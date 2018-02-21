<?php


use danaketh\HubSpot\API\Blog;
use danaketh\HubSpot\Exception\RequestException;
use PHPUnit\Framework\TestCase;



class BlogTest extends TestCase
{
    /** @var Blog $api */
    protected $api;




    public function testList()
    {
        try {
            $blogs = $this->api->list();
        } catch (RequestException $e) {
            $this->fail($e->getMessage());
        }

        $this->assertArrayHasKey('objects', $blogs);
    }




    public function testGetById()
    {
        $blogId = 351076997;

        try {
            $blog = $this->api->getById($blogId);
        } catch (RequestException $e) {
            $this->fail($e->getMessage());
        }

        $this->assertArrayHasKey('id', $blog);
        $this->assertEquals($blogId, $blog['id']);
    }




    public function testListRevisions()
    {

    }




    public function testGetRevision()
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
