<?php
namespace WHATSAPP\SDK\Edges;

use WHATSAPP\SDK\APIEdge;
use WHATSAPP\SDK\Edges\Stats\App;
use WHATSAPP\SDK\Edges\Stats\DB;

class Stats extends APIEdge{

    public const ENDPOINT = '/v1/stats';

    public function App(): App{
        return new App($this->getAPI(),$this->getAPI()->getEndpoint().App::ENDPOINT);
    }

    public function DB(): DB{
        return new DB($this->getAPI(),$this->getAPI()->getEndpoint().DB::ENDPOINT);
    }

}