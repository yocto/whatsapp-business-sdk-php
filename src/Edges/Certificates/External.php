<?php
namespace WHATSAPP\SDK\Edges\Certificates;

use WHATSAPP\SDK\API;
use WHATSAPP\SDK\APIEdge;
use WHATSAPP\SDK\APIRequest;

class External extends APIEdge{

    public const ENDPOINT = '/v1/certificates/external';

    public function retrieve(){
        $request = new APIRequest(API::METHOD_GET,$this->getEndpoint().'/ca',[
            'Authorization: Bearer '.$this->getAPI()->getToken(),
        ]);
        return $this->getAPI()->execute($request);
    }

    public function upload(string $certificate){
        $request = new APIRequest(API::METHOD_POST,$this->getEndpoint(),[
            'Authorization: Bearer '.$this->getAPI()->getToken(),
            'Content-Type: text/plain',
        ],$certificate);
        return $this->getAPI()->execute($request);
    }

}