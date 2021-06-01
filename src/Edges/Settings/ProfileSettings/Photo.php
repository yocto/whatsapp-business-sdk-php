<?php
namespace WHATSAPP\SDK\Edges\Settings\ProfileSettings;

use WHATSAPP\SDK\API;
use WHATSAPP\SDK\APIEdge;
use WHATSAPP\SDK\APIRequest;

class Photo extends APIEdge{

    public const ENDPOINT = '/v1/settings/profile/photo';

    public function retrieve(?string $format=null){
        $request = new APIRequest(API::METHOD_GET,$this->getEndpoint().(!empty($format)?'?'.http_build_query(['format'=>$format]):''),[
            'Authorization: Bearer '.$this->getAPI()->getToken(),
        ]);
        return $this->getAPI()->execute($request);
    }

    public function update(string $content_type,string $binary_image_content){
        $request = new APIRequest(API::METHOD_POST,$this->getEndpoint(),[
            'Authorization: Bearer '.$this->getAPI()->getToken(),
            'Content-Type: '.$content_type,
        ],$binary_image_content);
        return $this->getAPI()->execute($request);
    }

    public function delete(){
        $request = new APIRequest(API::METHOD_DELETE,$this->getEndpoint(),[
            'Authorization: Bearer '.$this->getAPI()->getToken(),
        ]);
        return $this->getAPI()->execute($request);
    }

}