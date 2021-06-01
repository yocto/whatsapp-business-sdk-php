<?php
namespace WHATSAPP\SDK\Edges\Settings;

use WHATSAPP\SDK\API;
use WHATSAPP\SDK\APIEdge;
use WHATSAPP\SDK\APIRequest;

class ApplicationSettings extends APIEdge{

    public const ENDPOINT = '/v1/settings/application';

    public function retrieve(){
        $request = new APIRequest(API::METHOD_GET,$this->getEndpoint(),[
            'Authorization: Bearer '.$this->getAPI()->getToken(),
        ]);
        return $this->getAPI()->execute($request);
    }

    public function update(?bool $callback_persist=null,?string $max_callback_backoff_delay_ms=null,?array $media=null,?string $callback_backoff_delay_ms=null,?bool $pass_through=null,?bool $sent_status=null,?array $webhooks=null,?int $unhealthy_interval=null,?int $heartbeat_interval=null,?bool $axolotl_context_striping_disabled=null,?bool $notify_user_change_number=null,?bool $show_security_notifications=null,?bool $db_garbagecollector_enable=null,?bool $skip_referral_media_download=null,?bool $webhook_payload_conversation_pricingmodel_disabled=null){
        $json = [];
        if($callback_persist!=null){
            $json['callback_persist'] = $callback_persist;
        }
        if($max_callback_backoff_delay_ms!=null){
            $json['max_callback_backoff_delay_ms'] = $max_callback_backoff_delay_ms;
        }
        if($media!=null){
            $json['media'] = $media;
        }
        if($callback_backoff_delay_ms!=null){
            $json['callback_backoff_delay_ms'] = $callback_backoff_delay_ms;
        }
        if($pass_through!=null){
            $json['pass_through'] = $pass_through;
        }
        if($sent_status!=null){
            $json['sent_status'] = $sent_status;
        }
        if($webhooks!=null){
            $json['webhooks'] = $webhooks;
        }
        if($unhealthy_interval!=null){
            $json['unhealthy_interval'] = $unhealthy_interval;
        }
        if($heartbeat_interval!=null){
            $json['heartbeat_interval'] = $heartbeat_interval;
        }
        if($axolotl_context_striping_disabled!=null){
            $json['axolotl_context_striping_disabled'] = $axolotl_context_striping_disabled;
        }
        if($notify_user_change_number!=null){
            $json['notify_user_change_number'] = $notify_user_change_number;
        }
        if($show_security_notifications!=null){
            $json['show_security_notifications'] = $show_security_notifications;
        }
        if($db_garbagecollector_enable!=null){
            $json['db_garbagecollector_enable'] = $db_garbagecollector_enable;
        }
        if($skip_referral_media_download!=null){
            $json['skip_referral_media_download'] = $skip_referral_media_download;
        }
        if($webhook_payload_conversation_pricingmodel_disabled!=null){
            $json['webhook_payload_conversation_pricingmodel_disabled'] = $webhook_payload_conversation_pricingmodel_disabled;
        }
        $request = new APIRequest(API::METHOD_PUT,$this->getEndpoint(),[
            'Authorization: Bearer '.$this->getAPI()->getToken(),
            'Content-Type: application/json',
        ],json_encode($json,JSON_FORCE_OBJECT));
        return $this->getAPI()->execute($request);
    }

    public function reset(){
        $request = new APIRequest(API::METHOD_DELETE,$this->getEndpoint(),[
            'Authorization: Bearer '.$this->getAPI()->getToken(),
        ]);
        return $this->getAPI()->execute($request);
    }

}