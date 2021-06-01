<?php
namespace WHATSAPP\SDK\Edges\Settings;

use WHATSAPP\SDK\API;
use WHATSAPP\SDK\APIEdge;
use WHATSAPP\SDK\APIRequest;

class BusinessProfileSettings extends APIEdge{

    public const ENDPOINT = '/v1/settings/business/profile';

    public function retrieve(){
        $request = new APIRequest(API::METHOD_GET,$this->getEndpoint(),[
            'Authorization: Bearer '.$this->getAPI()->getToken(),
        ]);
        return $this->getAPI()->execute($request);
    }

    public function update(?string $address=null,?string $description=null,?string $email=null,?string $vertical=null){
        $json = [];
        if($address){
            $json['address'] = $address;
        }
        if($address){
            $json['description'] = $description;
        }
        if($address){
            $json['email'] = $email;
        }
        if($address){
            $json['vertical'] = $vertical;
        }
        $request = new APIRequest(API::METHOD_PUT,$this->getEndpoint(),[
            'Authorization: Bearer '.$this->getAPI()->getToken(),
            'Content-Type: application/json',
        ],json_encode($json,JSON_FORCE_OBJECT));
        return $this->getAPI()->execute($request);
    }

}