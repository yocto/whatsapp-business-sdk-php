<?php
namespace WHATSAPP\SDK\Edges\Settings;

use WHATSAPP\SDK\API;
use WHATSAPP\SDK\APIEdge;
use WHATSAPP\SDK\APIRequest;

class TwoFactorVerification extends APIEdge{

    public const ENDPOINT = '/v1/settings/account/two-step';

    public function enable(string $pin){
        $json = [
            'pin' => $pin,
        ];
        $request = new APIRequest(API::METHOD_POST,$this->getEndpoint(),[
            'Authorization: Bearer '.$this->getAPI()->getToken(),
            'Content-Type: application/json',
        ],json_encode($json,JSON_FORCE_OBJECT));
        return $this->getAPI()->execute($request);
    }

    public function disable(){
        $request = new APIRequest(API::METHOD_DELETE,$this->getEndpoint(),[
            'Authorization: Bearer '.$this->getAPI()->getToken(),
        ]);
        return $this->getAPI()->execute($request);
    }

}