<?php

namespace danaketh\HubSpot;

use danaketh\HubSpot\API\Blog;



/**
 * HubSpot API client
 *
 * @package danaketh\HubSpot
 * @author  Daniel Tlach <daniel@tlach.cz>
 */
class HubSpot
{
    /** @var string $apiKey */
    protected $apiKey;

    /** @var Blog $blog */
    protected $blog;




    /**
     * HubSpot constructor.
     *
     * @param string $apiKey
     */
    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }




    /**
     * Provides access to the Blog API
     *
     * @return Blog
     */
    public function blog(): Blog
    {
        if (!$this->blog) {
            $this->blog = new Blog($this->apiKey);
        }

        return $this->blog;
    }


}
