<?php
namespace WHATSAPP\SDK\Edges;

use WHATSAPP\SDK\APIEdge;
use WHATSAPP\SDK\APIRequest;

class Users extends APIEdge{

    public const ENDPOINT = '/users';

    public function login($username,$password,$new_password=null){
        $json = [];
        if($new_password){
            $json['new_password'] = $new_password;
        }
        $request = new APIRequest('POST',$this->getEndpoint().'/login',[
            'Authorization: Basic '.base64_encode($username.':'.$password),
            'Content-Type: application/json',
        ],json_encode($json,JSON_FORCE_OBJECT));
        return $this->getAPI()->execute($request);
    }

}