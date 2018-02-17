<?php

namespace danaketh\HubSpot\Support;

use danaketh\HubSpot\Exception\RequestException;



/**
 * cURL wrapper
 *
 * @package danaketh\HubSpot\Support
 * @author  Daniel Tlach <daniel@tlach.cz>
 */
class Request
{
    /**
     * @param string $url
     *
     * @return array
     * @throws RequestException
     */
    public static function get($url): array
    {
        $instance = curl_init($url);
        curl_setopt_array($instance, [
            CURLOPT_RETURNTRANSFER => true,
        ]);
        $request = curl_exec($instance);

        if (!$request) {
            throw new RequestException(curl_error($instance));
        }

        $info = curl_getinfo($instance);
        curl_close($instance);

        $response = [
            'code'         => $info['http_code'],
            'body'         => $info['content_type'] === 'application/json'
                ? json_decode($request, JSON_OBJECT_AS_ARRAY)
                : $request,
            'content-type' => $info['content_type'],
        ];

        return $response;
    }




    public static function post($url, $data)
    {
    }




    public static function put($url, $data)
    {
    }




    public static function delete($url)
    {
    }




    public static function patch($url)
    {
    }
}
