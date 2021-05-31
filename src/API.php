<?php
namespace WHATSAPP\SDK;

class API{

    public static function execute(APIRequest $request): APIResponse{
        $ch = curl_init($request->getURL());
        curl_setopt($ch,CURLOPT_CUSTOMREQUEST,$request->getMethod());
        curl_setopt($ch,CURLOPT_HTTPHEADER,$request->getHeaders());
        if($request->getBody()){
            curl_setopt($ch,CURLOPT_POSTFIELDS,$request->getBody());
        }
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $resp = curl_exec($ch);
        $statusCode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
        curl_close($ch);
        return new APIResponse($statusCode,$resp);
    }

}