<?php
namespace WHATSAPP\SDK;

use WHATSAPP\SDK\Edges\Account;
use WHATSAPP\SDK\Edges\Certificates;
use WHATSAPP\SDK\Edges\Contacts;
use WHATSAPP\SDK\Edges\Health;
use WHATSAPP\SDK\Edges\Media;
use WHATSAPP\SDK\Edges\Messages;
use WHATSAPP\SDK\Edges\Metrics;
use WHATSAPP\SDK\Edges\Services;
use WHATSAPP\SDK\Edges\Settings;
use WHATSAPP\SDK\Edges\Stats;
use WHATSAPP\SDK\Edges\Stickerpacks;
use WHATSAPP\SDK\Edges\Support;
use WHATSAPP\SDK\Edges\Users;

class API extends APIEdge{

    public function __construct(string $endpoint){
        parent::__construct($this,$endpoint);
    }

    public function Account(){
        return new Account($this->getAPI(),$this->getEndpoint().Account::ENDPOINT);
    }

    public function Certificates(){
        return new Certificates($this->getAPI(),$this->getEndpoint().Certificates::ENDPOINT);
    }

    public function Contacts(){
        return new Contacts($this->getAPI(),$this->getEndpoint().Contacts::ENDPOINT);
    }

    public function Health(){
        return new Health($this->getAPI(),$this->getEndpoint().Health::ENDPOINT);
    }

    public function Media(){
        return new Media($this->getAPI(),$this->getEndpoint().Media::ENDPOINT);
    }

    public function Messages(){
        return new Messages($this->getAPI(),$this->getEndpoint().Messages::ENDPOINT);
    }

    public function Metrics(){
        return new Metrics($this->getAPI(),$this->getEndpoint().Metrics::ENDPOINT);
    }

    public function Services(){
        return new Services($this->getAPI(),$this->getEndpoint().Services::ENDPOINT);
    }

    public function Settings(){
        return new Settings($this->getAPI(),$this->getEndpoint().Settings::ENDPOINT);
    }

    public function Stats(){
        return new Stats($this->getAPI(),$this->getEndpoint().Stats::ENDPOINT);
    }

    public function Stickerpacks(){
        return new Stickerpacks($this->getAPI(),$this->getEndpoint().Stickerpacks::ENDPOINT);
    }

    public function Support(){
        return new Support($this->getAPI(),$this->getEndpoint().Support::ENDPOINT);
    }

    public function Users(){
        return new Users($this->getAPI(),$this->getEndpoint().Users::ENDPOINT);
    }

    public function execute(APIRequest $request): APIResponse{
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