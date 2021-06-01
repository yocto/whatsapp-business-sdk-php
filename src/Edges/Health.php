<?php
namespace WHATSAPP\SDK\Edges;

use WHATSAPP\SDK\API;
use WHATSAPP\SDK\APIEdge;
use WHATSAPP\SDK\APIRequest;

class Health extends APIEdge{

    public const ENDPOINT = '/v1/health';

    public function retrieve(){
        $authorization = '';
        if($this->getAPI()->getAPIKey()){
            $authorization = 'Apikey '.$this->getAPI()->getAPIKey();
        }
        if($this->getAPI()->getToken()){
            $authorization = 'Bearer '.$this->getAPI()->getToken();
        }
        $request = new APIRequest(API::METHOD_GET,$this->getEndpoint(),[
            'Authorization: '.$authorization,
        ]);
        return $this->getAPI()->execute($request);
    }

}