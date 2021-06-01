<?php
namespace WHATSAPP\SDK\Edges\Settings;

use WHATSAPP\SDK\API;
use WHATSAPP\SDK\APIEdge;
use WHATSAPP\SDK\APIRequest;
use WHATSAPP\SDK\Edges\Settings\ApplicationSettings\About;
use WHATSAPP\SDK\Edges\Settings\ApplicationSettings\Photo;

class ProfileSettings extends APIEdge{

    public const ENDPOINT = '/v1/settings/profile';

    public function About(): About{
        return new About($this->getAPI(),$this->getAPI()->getEndpoint().About::ENDPOINT);
    }

    public function Photo(): Photo{
        return new Photo($this->getAPI(),$this->getAPI()->getEndpoint().Photo::ENDPOINT);
    }

}