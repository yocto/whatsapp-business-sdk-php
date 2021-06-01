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

    public const METHOD_DELETE = 'DELETE';
    public const METHOD_GET = 'GET';
    public const METHOD_PATCH = 'PATCH';
    public const METHOD_POST = 'POST';
    public const METHOD_PUT = 'PUT';

    private $apiKey;
    private $token;

    public function __construct(string $endpoint){
        parent::__construct($this,$endpoint);
    }

    /**
     * @return string|null
     */
    public function getAPIKey(): ?string{
        return $this->apiKey;
    }

    /**
     * @param string $apiKey
     */
    public function setAPIKey(string $apiKey): void{
        $this->apiKey = $apiKey;
    }

    /**
     * @return string|null
     */
    public function getToken(): ?string{
        return $this->token;
    }

    /**
     * @param string $token
     */
    public function setToken(string $token): void{
        $this->token = $token;
    }

    public function Account(): Account{
        return new Account($this->getAPI(),$this->getAPI()->getEndpoint().Account::ENDPOINT);
    }

    public function Certificates(): Certificates{
        return new Certificates($this->getAPI(),$this->getAPI()->getEndpoint().Certificates::ENDPOINT);
    }

    public function Contacts(): Contacts{
        return new Contacts($this->getAPI(),$this->getAPI()->getEndpoint().Contacts::ENDPOINT);
    }

    public function Health(): Health{
        return new Health($this->getAPI(),$this->getAPI()->getEndpoint().Health::ENDPOINT);
    }

    public function Media(): Media{
        return new Media($this->getAPI(),$this->getAPI()->getEndpoint().Media::ENDPOINT);
    }

    public function Messages(): Messages{
        return new Messages($this->getAPI(),$this->getAPI()->getEndpoint().Messages::ENDPOINT);
    }

    public function Metrics(): Metrics{
        return new Metrics($this->getAPI(),$this->getAPI()->getEndpoint().Metrics::ENDPOINT);
    }

    public function Services(): Services{
        return new Services($this->getAPI(),$this->getAPI()->getEndpoint().Services::ENDPOINT);
    }

    public function Settings(): Settings{
        return new Settings($this->getAPI(),$this->getAPI()->getEndpoint().Settings::ENDPOINT);
    }

    public function Stats(): Stats{
        return new Stats($this->getAPI(),$this->getAPI()->getEndpoint().Stats::ENDPOINT);
    }

    public function Stickerpacks(): Stickerpacks{
        return new Stickerpacks($this->getAPI(),$this->getAPI()->getEndpoint().Stickerpacks::ENDPOINT);
    }

    public function Support(): Support{
        return new Support($this->getAPI(),$this->getAPI()->getEndpoint().Support::ENDPOINT);
    }

    public function Users(): Users{
        return new Users($this->getAPI(),$this->getAPI()->getEndpoint().Users::ENDPOINT);
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