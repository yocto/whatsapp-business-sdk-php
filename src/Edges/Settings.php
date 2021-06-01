<?php
namespace WHATSAPP\SDK\Edges;

use WHATSAPP\SDK\APIEdge;
use WHATSAPP\SDK\Edges\Settings\ApplicationSettings;
use WHATSAPP\SDK\Edges\Settings\Backup;
use WHATSAPP\SDK\Edges\Settings\BusinessProfileSettings;
use WHATSAPP\SDK\Edges\Settings\ProfileSettings;
use WHATSAPP\SDK\Edges\Settings\Restore;
use WHATSAPP\SDK\Edges\Settings\TwoFactorVerification;

class Settings extends APIEdge{

    public const ENDPOINT = '/v1/settings';

    public function ApplicationSettings(): ApplicationSettings{
        return new ApplicationSettings($this->getAPI(),$this->getAPI()->getEndpoint().ApplicationSettings::ENDPOINT);
    }

    public function ProfileSettings(): ProfileSettings{
        return new ProfileSettings($this->getAPI(),$this->getAPI()->getEndpoint().ProfileSettings::ENDPOINT);
    }

    public function BusinessProfileSettings(): BusinessProfileSettings{
        return new BusinessProfileSettings($this->getAPI(),$this->getAPI()->getEndpoint().BusinessProfileSettings::ENDPOINT);
    }

    public function Backup(): Backup{
        return new Backup($this->getAPI(),$this->getAPI()->getEndpoint().Backup::ENDPOINT);
    }

    public function Restore(): Restore{
        return new Restore($this->getAPI(),$this->getAPI()->getEndpoint().Restore::ENDPOINT);
    }

    public function TwoFactorVerification(): TwoFactorVerification{
        return new TwoFactorVerification($this->getAPI(),$this->getAPI()->getEndpoint().TwoFactorVerification::ENDPOINT);
    }

}