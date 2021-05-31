<?php
namespace WHATSAPP\SDK;

abstract class APIEdge{

    private $api;
    private $endpoint;

    public function __construct(API $api,string $endpoint){
        $this->api = $api;
        $this->endpoint = $endpoint;
    }

    /**
     * @return API
     */
    public function getAPI(){
        return $this->api;
    }

    /**
     * @return string
     */
    public function getEndpoint(){
        return $this->endpoint;
    }

}