<?php

namespace App\Helpers;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Curl Helper
 */
class CurlHelper
{
    /**
     * Properties
     */
    private $client;

    /**
     * Constructor
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }//end __construct()

    /**
     * Performs guzzle call.
     * @param string $method HTTP action
     * @param string $url API URL
     * @return array | mixed
     */
    public function call($method, $url)
    {
        try {
            $result = $this->client->request($method, $url);
            return json_decode($result->getBody(), true);
        } catch (GuzzleException $e) {
            print_r($e->getHandlerContext());
        }
    }//end call()
}//end class