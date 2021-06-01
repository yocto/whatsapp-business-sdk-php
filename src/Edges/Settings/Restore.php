<?php
namespace WHATSAPP\SDK\Edges\Settings;

use WHATSAPP\SDK\API;
use WHATSAPP\SDK\APIEdge;
use WHATSAPP\SDK\APIRequest;

class Restore extends APIEdge{

    public const ENDPOINT = '/v1/settings/restore';

    public function restore(string $password,string $data){
        $json = [
            'password' => $password,
            'data' => $data,
        ];
        $request = new APIRequest(API::METHOD_POST,$this->getEndpoint(),[
            'Authorization: Bearer '.$this->getAPI()->getToken(),
            'Content-Type: application/json',
        ],json_encode($json,JSON_FORCE_OBJECT));
        return $this->getAPI()->execute($request);
    }

}