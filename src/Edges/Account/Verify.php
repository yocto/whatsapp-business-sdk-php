<?php
namespace WHATSAPP\SDK\Edges\Account;

use WHATSAPP\SDK\API;
use WHATSAPP\SDK\APIEdge;
use WHATSAPP\SDK\APIRequest;

class Verify extends APIEdge{

    public const ENDPOINT = '/v1/account/verify';

    public function create(string $code){
        $json = [
            'code' => $code,
        ];
        $request = new APIRequest(API::METHOD_POST,$this->getEndpoint(),[
            'Authorization: Bearer '.$this->getAPI()->getToken(),
        ],json_encode($json,JSON_FORCE_OBJECT));
        return $this->getAPI()->execute($request);
    }

}