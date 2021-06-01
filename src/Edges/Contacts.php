<?php
namespace WHATSAPP\SDK\Edges;

use WHATSAPP\SDK\API;
use WHATSAPP\SDK\APIEdge;
use WHATSAPP\SDK\APIRequest;
use WHATSAPP\SDK\Edges\Contacts\Identity;

class Contacts extends APIEdge{

    public const ENDPOINT = '/v1/contacts';

    public function Identity(): Identity{
        return new Identity($this->getAPI(),$this->getAPI()->getEndpoint().Identity::ENDPOINT);
    }

    public function create(?string $blocking=null,array $contacts,?bool $force_check=null){
        $json = [
            'contacts' => $contacts,
        ];
        if($blocking){
            $json['blocking'] = $blocking;
        }
        if($force_check!=null){
            $json['force_check'] = $force_check;
        }
        $request = new APIRequest(API::METHOD_POST,$this->getEndpoint(),[
            'Authorization: Bearer '.$this->getAPI()->getToken(),
            'Content-Type: application/json',
        ],json_encode($json,JSON_FORCE_OBJECT));
        return $this->getAPI()->execute($request);
    }

}