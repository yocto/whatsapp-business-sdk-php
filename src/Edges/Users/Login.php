<?php
namespace WHATSAPP\SDK\Edges\Users;

use WHATSAPP\SDK\API;
use WHATSAPP\SDK\APIEdge;
use WHATSAPP\SDK\APIRequest;

class Login extends APIEdge{

    public const ENDPOINT = '/login';

    public function create(string $username,string $password,?string $new_password=null){
        $json = [];
        if($new_password){
            $json['new_password'] = $new_password;
        }
        $request = new APIRequest(API::METHOD_POST,$this->getEndpoint(),[
            'Authorization: Basic '.base64_encode($username.':'.$password),
            'Content-Type: application/json',
        ],json_encode($json,JSON_FORCE_OBJECT));
        return $this->getAPI()->execute($request);
    }

}