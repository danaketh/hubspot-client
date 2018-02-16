<?php

namespace danaketh\HubSpot;

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




    /**
     * HubSpot constructor.
     *
     * @param string $apiKey
     */
    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }




    public function contact()
    {
    }




    public function blog()
    {
    }




    public function page()
    {
    }




    public function form()
    {
    }
}
