<?php
/**
 * Created by PhpStorm.
 * User: scodx
 * Date: 10/18/16
 * Time: 22:47
 */

namespace DMS;

use GuzzleHttp\Client;

class omdbapi
{

    private $client;

    /**
     * @return mixed
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param mixed $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }

    public function __construct()
    {

        $this->setClient(new Client(array(
            'base_uri'  => "http://www.omdbapi.com/",
            'timeout'   => 2.0,
        )));

    }


    private function jsonRequest($url)
    {
        $request = $this->getClient()->get(
            $url,
            array(
                'Accept' => 'application/json',
            )
        );

        return json_decode( $request->getBody(), true );
    }

    public function search($title)
    {

        return $this->jsonRequest("?s={$title}&y=&plot=short&r=json&type=movie");

    }

    public function getById($id)
    {
        return $this->jsonRequest("?i={$id}&plot=short&r=json");
    }

}