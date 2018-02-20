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

        return self::response($request, $instance);
    }




    /**
     * @param string $url
     * @param array  $data
     *
     * @return array
     * @throws RequestException
     */
    public static function post($url, $data): array
    {
        $instance = curl_init($url);
        curl_setopt_array($instance, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => $data
        ]);
        $request = curl_exec($instance);

        if (!$request) {
            throw new RequestException(curl_error($instance));
        }

        return self::response($request, $instance);
    }




    /**
     * @param $url
     * @param $data
     *
     * @return array
     * @throws RequestException
     */
    public static function put($url, $data): array
    {
        $instance = curl_init($url);
        curl_setopt_array($instance, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST  => 'PUT',
            CURLOPT_POSTFIELDS     => $data
        ]);
        $request = curl_exec($instance);

        if (!$request) {
            throw new RequestException(curl_error($instance));
        }

        return self::response($request, $instance);
    }




    /**
     * @param string $url
     *
     * @return array
     * @throws RequestException
     */
    public static function delete($url): array
    {
        $instance = curl_init($url);
        curl_setopt_array($instance, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST  => 'DELETE'
        ]);
        $request = curl_exec($instance);

        if (!$request) {
            throw new RequestException(curl_error($instance));
        }

        return self::response($request, $instance);
    }




    /**
     * @param string $url
     * @param array  $data
     *
     * @return array
     * @throws RequestException
     */
    public static function patch($url, $data): array
    {
        $instance = curl_init($url);
        curl_setopt_array($instance, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST  => 'PATCH',
            CURLOPT_POSTFIELDS     => $data
        ]);
        $request = curl_exec($instance);

        if (!$request) {
            throw new RequestException(curl_error($instance));
        }

        return self::response($request, $instance);
    }




    /**
     * @param resource $request
     * @param resource $instance
     *
     * @return array
     */
    protected static function response($request, $instance): array
    {
        $info = curl_getinfo($instance);
        curl_close($instance);

        return [
            'code'         => $info['http_code'],
            'body'         => $info['content_type'] === 'application/json'
                ? json_decode($request, JSON_OBJECT_AS_ARRAY)
                : $request,
            'content-type' => $info['content_type'],
        ];
    }
}
