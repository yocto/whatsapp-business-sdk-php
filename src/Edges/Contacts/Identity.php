<?php
namespace WHATSAPP\SDK\Edges\Contacts;

use WHATSAPP\SDK\API;
use WHATSAPP\SDK\APIEdge;
use WHATSAPP\SDK\APIRequest;

class Identity extends APIEdge{

    public const ENDPOINT = '/v1/contacts/{users-whatsapp-id}/identity';

    public function read(string $users_whatsapp_id){
        $request = new APIRequest(API::METHOD_GET,str_replace($this->getEndpoint(),'{users-whatsapp-id}',$users_whatsapp_id),[
            'Authorization: Bearer '.$this->getAPI()->getToken(),
        ]);
        return $this->getAPI()->execute($request);
    }

    public function create(string $users_whatsapp_id,string $hash){
        $json = [
            'hash' => $hash,
        ];
        $request = new APIRequest(API::METHOD_PUT,str_replace($this->getEndpoint(),'{users-whatsapp-id}',$users_whatsapp_id),[
            'Authorization: Bearer '.$this->getAPI()->getToken(),
            'Content-Type: application/json',
        ],json_encode($json,JSON_FORCE_OBJECT));
        return $this->getAPI()->execute($request);
    }

}