<?php
namespace WHATSAPP\SDK\Edges\Stickerpacks;

use WHATSAPP\SDK\API;
use WHATSAPP\SDK\APIEdge;
use WHATSAPP\SDK\APIRequest;

class StickerpackID extends APIEdge{

    public const ENDPOINT = '/{stickerpack-id}';

    public function retrieve(string $stickerpack_id,?string $namespace=null){
        $request = new APIRequest(API::METHOD_GET,str_replace($this->getEndpoint(),'{stickerpack-id}',$stickerpack_id).(!empty($namespace)?'?'.http_build_query(['namespace'=>$namespace]):''),[
            'Authorization: Bearer '.$this->getAPI()->getToken(),
        ]);
        return $this->getAPI()->execute($request);
    }

    public function update(string $stickerpack_id,?string $publisher=null,?string $name=null,?string $ios_app_store_link=null,?string $android_app_store_link=null){
        $json = [];
        if($publisher){
            $json['publisher'] = $publisher;
        }
        if($name){
            $json['name'] = $name;
        }
        if($ios_app_store_link){
            $json['ios_app_store_link'] = $ios_app_store_link;
        }
        if($android_app_store_link){
            $json['android_app_store_link'] = $android_app_store_link;
        }
        $request = new APIRequest(API::METHOD_PATCH,str_replace($this->getEndpoint(),'{stickerpack-id}',$stickerpack_id),[
            'Authorization: Bearer '.$this->getAPI()->getToken(),
            'Content-Type: application/json',
        ],json_encode($json,JSON_FORCE_OBJECT));
        return $this->getAPI()->execute($request);
    }

    public function delete(string $stickerpack_id){
        $request = new APIRequest(API::METHOD_DELETE,str_replace($this->getEndpoint(),'{stickerpack-id}',$stickerpack_id),[
            'Authorization: Bearer '.$this->getAPI()->getToken(),
        ]);
        return $this->getAPI()->execute($request);
    }

}