<?php
namespace WHATSAPP\SDK\Edges\Users;

use WHATSAPP\SDK\API;
use WHATSAPP\SDK\APIEdge;
use WHATSAPP\SDK\APIRequest;

class ManageUsers extends APIEdge{

    public const ENDPOINT = '/{username}';

    public function retrieve(string $username){
        $request = new APIRequest(API::METHOD_GET,str_replace($this->getEndpoint(),'{username}',$username),[
            'Authorization: Bearer '.$this->getAPI()->getToken(),
        ]);
        return $this->getAPI()->execute($request);
    }

    public function update(string $username,string $password){
        $json = [
            'password' => $password,
        ];
        $request = new APIRequest(API::METHOD_PUT,str_replace($this->getEndpoint(),'{username}',$username),[
            'Authorization: Bearer '.$this->getAPI()->getToken(),
            'Content-Type: application/json',
        ],json_encode($json,JSON_FORCE_OBJECT));
        return $this->getAPI()->execute($request);
    }

    public function delete(string $username){
        $request = new APIRequest(API::METHOD_DELETE,str_replace($this->getEndpoint(),'{username}',$username),[
            'Authorization: Bearer '.$this->getAPI()->getToken(),
        ]);
        return $this->getAPI()->execute($request);
    }

}