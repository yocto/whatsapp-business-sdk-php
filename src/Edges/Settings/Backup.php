<?php
namespace WHATSAPP\SDK\Edges\Settings;

use WHATSAPP\SDK\API;
use WHATSAPP\SDK\APIEdge;
use WHATSAPP\SDK\APIRequest;

class Backup extends APIEdge{

    public const ENDPOINT = '/v1/settings/backup';

    public function backup(string $password){
        $json = [
            'password' => $password,
        ];
        $request = new APIRequest(API::METHOD_POST,$this->getEndpoint(),[
            'Authorization: Bearer '.$this->getAPI()->getToken(),
            'Content-Type: application/json',
        ],json_encode($json,JSON_FORCE_OBJECT));
        return $this->getAPI()->execute($request);
    }

}