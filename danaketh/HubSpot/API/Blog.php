<?php

namespace danaketh\HubSpot\API;


/**
 * Class Blog
 *
 * @package danaketh\HubSpot\API
 * @author  Daniel Tlach <daniel@tlach.cz>
 */
class Blog
{
    /** @var string $apiKey */
    protected $apiKey;




    /**
     * Blog constructor.
     *
     * @param $apiKey
     */
    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }




    /**
     * List existing blogs
     *
     * @param array $filters
     *
     * @return array
     */
    public function list(array $filters = []): array
    {
        $defaults = array_merge([
            'limit'      => 20,
            'offset'     => 0,
            'created'    => false,
            'deleted_at' => false,
            'name'       => false
        ], $filters);
        $params = [
            'limit'  => $defaults['limit'],
            'offset' => $defaults['offset'],
        ];

        foreach ($this->setFilter('created', $defaults['created'], ['exact', 'range', 'gt', 'gte', 'lt', 'lte']) as $f => $v) {
            $params[$f] = $v;
        }

        foreach ($this->setFilter('deleted_at', $defaults['deleted_at'], ['exact', 'gt', 'gte']) as $f => $v) {
            $params[$f] = $v;
        }

        foreach ($this->setFilter('name', $defaults['name'], ['exact', 'in']) as $f => $v) {
            $params[$f] = $v;
        }

        return [];
    }




    /**
     * Prepare the `created` filter
     *
     * @param array $values
     * @param array $allowed
     *
     * @return array
     */
    protected function setFilter($filter, $values, $allowed): array
    {
        if (!\is_array($values) || empty($values)) {
            return [];
        }

        $results = [];

        foreach ($values as $expr => $when) {
            if (\in_array($expr, $allowed, true)) {
                $results[$filter . '__' . $expr] = $when;
            }
        }

        return $results;
    }
}
