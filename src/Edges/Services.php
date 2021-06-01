<?php
namespace WHATSAPP\SDK\Edges;

use WHATSAPP\SDK\API;
use WHATSAPP\SDK\APIEdge;
use WHATSAPP\SDK\APIRequest;

class Services extends APIEdge{

    public const ENDPOINT = '/v1/services/message/gc';//'/v1/services';

    public function request(){
        $request = new APIRequest(API::METHOD_PUT,$this->getEndpoint(),[
            'Authorization: Bearer '.$this->getAPI()->getToken(),
        ]);
        return $this->getAPI()->execute($request);
    }

}