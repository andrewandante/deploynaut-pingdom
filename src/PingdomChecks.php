<?php

class PingdomChecks
{
    private $client;

    public function __construct($client)
    {
        $this->client = $client;
    }

    public function getChecks()
    {
        return $this->client->get('checks');
    }

    public function getCheck($id)
    {
        return $this->client->get('check/'.$id);
    }

    /**
     * @param string $name
     * @param string $host
     * @param string $type
     * @param array  $options
     */
    public function createCheck($name, $host, $type = 'http', $options)
    {
    }
}
