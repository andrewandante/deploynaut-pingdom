<?php

class Pingdom extends Object
{
    /**
     * This is used by the SilverStripe Injector to instantiate an object as $this->client. See _config/config.yml.
     *
     * @config
     * @var array
     */
    private static $dependencies = [
        'client' => '%$PingdomClient',
    ];

    private $appKey;
    private $username;
    private $password;

    private $apiURL = 'https://api.pingdom.com/api/2.0/';

    public function __construct() {
        if(defined('PINGDOM_USERNAME')) {
            $this->username = PINGDOM_USERNAME;
        }
        if(defined('PINGDOM_PASSWORD')) {
            $this->password = PINGDOM_PASSWORD;
        }
        if(defined('PINGDOM_API_KEY')) {
            $this->appKey = PINGDOM_API_KEY;
        }
     }

    public function getUsername() {
        if(!$this->username) {
            throw new LogicException("Pingdom username not set! Define PINGDOM_USERNAME or use Injector to set username");
        }
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function getPassword() {
        if(!$this->password) {
            throw new LogicException("Pingdom password not set! Define PINGDOM_PASSWORD or use Injector to set password");
        }
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getAppKey() {
        if(!$this->appKey) {
            throw new LogicException("Pingdom app key not set! Define PINGDOM_APPIKEY or use Injector to set app key");
        }
        return $this->appKey;
    }

    public function setAppKey($key) {
        $this->appKey = $key;
    }

    public function get($endpoint) {
        return $this->client->get($this->apiURL . $endpoint, [
            'auth' => [
                $this->getUsername(),
                $this->getPassword()
            ],
            'headers' => [
                'App-Key' => $this->getAppKey()
            ]
        ]);
    }

}
