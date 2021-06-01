<?php
namespace WHATSAPP\SDK\Edges;

use WHATSAPP\SDK\APIEdge;
use WHATSAPP\SDK\Edges\Certificates\External;
use WHATSAPP\SDK\Edges\Certificates\Webhooks;

class Certificates extends APIEdge{

    public const ENDPOINT = '/v1/certificates';

    public function External(): External{
        return new External($this->getAPI(),$this->getAPI()->getEndpoint().External::ENDPOINT);
    }

    public function Webhooks(): Webhooks{
        return new Webhooks($this->getAPI(),$this->getAPI()->getEndpoint().Webhooks::ENDPOINT);
    }

}