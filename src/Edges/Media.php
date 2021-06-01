<?php
namespace WHATSAPP\SDK\Edges;

use WHATSAPP\SDK\API;
use WHATSAPP\SDK\APIEdge;
use WHATSAPP\SDK\APIRequest;
use WHATSAPP\SDK\Edges\Media\MediaID;

class Media extends APIEdge{

    public const ENDPOINT = '/v1/media';

    public function MediaID(): MediaID{
        return new MediaID($this->getAPI(),$this->getAPI()->getEndpoint().MediaID::ENDPOINT);
    }

    public function upload(string $content_type,string $binary_media_content){
        $request = new APIRequest(API::METHOD_POST,$this->getEndpoint(),[
            'Authorization: Bearer '.$this->getAPI()->getToken(),
            'Content-Type: '.$content_type,
        ],$binary_media_content);
        return $this->getAPI()->execute($request);
    }

}