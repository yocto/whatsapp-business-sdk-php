<?php
namespace WHATSAPP\SDK\Edges;

use WHATSAPP\SDK\API;
use WHATSAPP\SDK\APIEdge;
use WHATSAPP\SDK\APIRequest;
use WHATSAPP\SDK\Edges\Account\Verify;

class Account extends APIEdge{

    public const ENDPOINT = '/v1/account';

    public function Verify(): Verify{
        return new Verify($this->getAPI(),$this->getEndpoint().Verify::ENDPOINT);
    }

    public function request(string $cc,string $phone_number,string $method,string $cert,?string $pin=null){
        $json = [
            'cc' => $cc,
            'phone_number' => $phone_number,
            'method' => $method,
            'cert' => $cert,
        ];
        if($pin){
            $json['pin'] = $pin;
        }
        $request = new APIRequest(API::METHOD_POST,$this->getEndpoint(),[
            'Authorization: Bearer '.$this->getAPI()->getToken(),
        ],json_encode($json,JSON_FORCE_OBJECT));
        return $this->getAPI()->execute($request);
    }

}