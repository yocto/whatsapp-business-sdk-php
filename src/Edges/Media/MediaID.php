<?php
namespace WHATSAPP\SDK\Edges\Media;

use WHATSAPP\SDK\API;
use WHATSAPP\SDK\APIEdge;
use WHATSAPP\SDK\APIRequest;

class MediaID extends APIEdge{

    public const ENDPOINT = '/v1/media/{media-id}';

    public function retrieve(string $media_id){
        $request = new APIRequest(API::METHOD_GET,str_replace('{media-id}',$media_id,$this->getEndpoint()),[
            'Authorization: Bearer '.$this->getAPI()->getToken(),
        ]);
        return $this->getAPI()->execute($request);
    }

    public function delete(string $media_id){
        $request = new APIRequest(API::METHOD_DELETE,str_replace('{media-id}',$media_id,$this->getEndpoint()),[
            'Authorization: Bearer '.$this->getAPI()->getToken(),
        ]);
        return $this->getAPI()->execute($request);
    }

}