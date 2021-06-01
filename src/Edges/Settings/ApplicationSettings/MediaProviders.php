<?php
namespace WHATSAPP\SDK\Edges\Settings\ApplicationSettings;

use WHATSAPP\SDK\API;
use WHATSAPP\SDK\APIEdge;
use WHATSAPP\SDK\APIRequest;

class MediaProviders extends APIEdge{

    public const ENDPOINT = '/v1/settings/application/media/providers';

    public function retrieve(){
        $request = new APIRequest(API::METHOD_GET,$this->getEndpoint(),[
            'Authorization: Bearer '.$this->getAPI()->getToken(),
        ]);
        return $this->getAPI()->execute($request);
    }

    public function update(string $name,string $type,array $config){
        $json = [
            'name' => $name,
            'type' => $type,
            'config' => $config,
        ];
        $request = new APIRequest(API::METHOD_POST,$this->getEndpoint(),[
            'Authorization: Bearer '.$this->getAPI()->getToken(),
            'Content-Type: application/json',
        ],json_encode($json,JSON_FORCE_OBJECT));
        return $this->getAPI()->execute($request);
    }

    public function delete(string $config_name){
        $request = new APIRequest(API::METHOD_DELETE,$this->getEndpoint().'/'.$config_name,[
            'Authorization: Bearer '.$this->getAPI()->getToken(),
        ]);
        return $this->getAPI()->execute($request);
    }

}