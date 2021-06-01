<?php
namespace WHATSAPP\SDK\Edges\Stickerpacks;

use WHATSAPP\SDK\API;
use WHATSAPP\SDK\APIEdge;
use WHATSAPP\SDK\APIRequest;

class Sticker extends APIEdge{

    /**
     * The API reference has '/v1/stickerpacks/{stickerpack-id}/sticker' without 's' by accident.
     */
    public const ENDPOINT = '/v1/stickerpacks/{stickerpack-id}/stickers';

    public function retrieve(string $stickerpack_id,?string $namespace=null){
        $request = new APIRequest(API::METHOD_GET,str_replace($this->getEndpoint(),'{stickerpack-id}',$stickerpack_id).(!empty($namespace)?'?'.http_build_query(['namespace'=>$namespace]):''),[
            'Authorization: Bearer '.$this->getAPI()->getToken(),
        ]);
        return $this->getAPI()->execute($request);
    }

    public function retrieveByIndex(string $stickerpack_id,string $sticker_index,?string $namespace=null){
        $request = new APIRequest(API::METHOD_GET,str_replace($this->getEndpoint(),'{stickerpack-id}',$stickerpack_id).'/'.$sticker_index.(!empty($namespace)?'?'.http_build_query(['namespace'=>$namespace]):''),[
            'Authorization: Bearer '.$this->getAPI()->getToken(),
        ]);
        return $this->getAPI()->execute($request);
    }

    public function create(string $stickerpack_id,string $image_data_id,array $emojis = []){
        $json = [
            'image_data_id' => $image_data_id,
        ];
        if($emojis && !empty($emojis)){
            $json['emojis'] = $emojis;
        }
        $request = new APIRequest(API::METHOD_POST,str_replace($this->getEndpoint(),'{stickerpack-id}',$stickerpack_id),[
            'Authorization: Bearer '.$this->getAPI()->getToken(),
            'Content-Type: application/json',
        ],json_encode($json,JSON_FORCE_OBJECT));
        return $this->getAPI()->execute($request);
    }

    public function update(string $stickerpack_id,string $sticker_index,?string $image_data_id=null,array $emojis = []){
        $json = [];
        if($image_data_id){
            $json['image_data_id'] = $image_data_id;
        }
        if($emojis && !empty($emojis)){
            $json['emojis'] = $emojis;
        }
        $request = new APIRequest(API::METHOD_PATCH,str_replace($this->getEndpoint(),'{stickerpack-id}',$stickerpack_id).'/'.$sticker_index,[
            'Authorization: Bearer '.$this->getAPI()->getToken(),
            'Content-Type: application/json',
        ],json_encode($json,JSON_FORCE_OBJECT));
        return $this->getAPI()->execute($request);
    }

    public function delete(string $stickerpack_id,string $sticker_index){
        $request = new APIRequest(API::METHOD_DELETE,str_replace($this->getEndpoint(),'{stickerpack-id}',$stickerpack_id).'/'.$sticker_index,[
            'Authorization: Bearer '.$this->getAPI()->getToken(),
        ]);
        return $this->getAPI()->execute($request);
    }

}