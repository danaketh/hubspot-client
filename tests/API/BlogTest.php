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
        $blogId = 351076997;

        try {
            $revisions = $this->api->revisions($blogId);
        } catch (RequestException $e) {
            $this->fail($e->getMessage());
        }

        $this->assertGreaterThan(0, count($revisions));
        $this->assertArrayHasKey('object', $revisions[0]);
    }




    public function testGetRevision()
    {
        $blogId = 351076997;
        $revisionId = 12926383;

        try {
            $revision = $this->api->revision($blogId, $revisionId);
        } catch (RequestException $e) {
            $this->fail($e->getMessage());
        }

        // This is fine. We know the revision doesn't exist so this is mainly to test
        // that we get a response from the endpoint
        $this->assertArrayHasKey('message', $revision);
        $this->assertEquals('resource not found', $revision['message']);
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
