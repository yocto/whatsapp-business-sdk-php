<?php
namespace WHATSAPP\SDK\Edges;

use WHATSAPP\SDK\API;
use WHATSAPP\SDK\APIEdge;
use WHATSAPP\SDK\APIRequest;

class Messages extends APIEdge{

    public const ENDPOINT = '/v1/messages';

    public function create(array $parameters = []){
        $request = new APIRequest(API::METHOD_POST,$this->getEndpoint(),[
            'Authorization: Bearer '.$this->getAPI()->getToken(),
            'Content-Type: application/json',
        ],json_encode($parameters,JSON_FORCE_OBJECT));
        return $this->getAPI()->execute($request);
    }

}