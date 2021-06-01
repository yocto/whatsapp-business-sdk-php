<?php
namespace WHATSAPP\SDK\Edges\Settings\ProfileSettings;

use WHATSAPP\SDK\API;
use WHATSAPP\SDK\APIEdge;
use WHATSAPP\SDK\APIRequest;

class About extends APIEdge{

    public const ENDPOINT = '/v1/settings/profile/about';

    public function retrieve(){
        $request = new APIRequest(API::METHOD_GET,$this->getEndpoint(),[
            'Authorization: Bearer '.$this->getAPI()->getToken(),
        ]);
        return $this->getAPI()->execute($request);
    }

    public function update(string $text){
        $json = [
            'name' => $text,
        ];
        $request = new APIRequest(API::METHOD_POST,$this->getEndpoint(),[
            'Authorization: Bearer '.$this->getAPI()->getToken(),
            'Content-Type: application/json',
        ],json_encode($json,JSON_FORCE_OBJECT));
        return $this->getAPI()->execute($request);
    }

}