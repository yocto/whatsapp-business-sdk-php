<?php
namespace WHATSAPP\SDK\Edges\Stats;

use WHATSAPP\SDK\API;
use WHATSAPP\SDK\APIEdge;
use WHATSAPP\SDK\APIRequest;

class App extends APIEdge{

    public const ENDPOINT = '/v1/stats/app';

    public function retrieve(?string $format=null){
        $authorization = '';
        if($this->getAPI()->getAPIKey()){
            $authorization = 'Apikey '.$this->getAPI()->getAPIKey();
        }
        if($this->getAPI()->getToken()){
            $authorization = 'Bearer '.$this->getAPI()->getToken();
        }
        $request = new APIRequest(API::METHOD_GET,$this->getEndpoint().(!empty($format)?'?'.http_build_query(['format'=>$format]):''),[
            'Authorization: '.$authorization,
        ]);
        return $this->getAPI()->execute($request);
    }

}