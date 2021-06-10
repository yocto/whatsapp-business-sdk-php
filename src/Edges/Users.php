<?php
namespace WHATSAPP\SDK\Edges;

use WHATSAPP\SDK\API;
use WHATSAPP\SDK\APIEdge;
use WHATSAPP\SDK\APIRequest;
use WHATSAPP\SDK\Edges\Users\Login;
use WHATSAPP\SDK\Edges\Users\Logout;
use WHATSAPP\SDK\Edges\Users\ManageUsers;

class Users extends APIEdge{

    public const ENDPOINT = '/v1/users';

    public function Login(): Login{
        return new Login($this->getAPI(),$this->getAPI()->getEndpoint().Login::ENDPOINT);
    }

    public function Logout(): Logout{
        return new Logout($this->getAPI(),$this->getAPI()->getEndpoint().Logout::ENDPOINT);
    }

    public function ManageUsers(): ManageUsers{
        return new ManageUsers($this->getAPI(),$this->getAPI()->getEndpoint().ManageUsers::ENDPOINT);
    }

    public function create(string $username,string $password){
        $json = [];
        $request = new APIRequest(API::METHOD_POST,$this->getEndpoint(),[
            'Authorization: Basic '.base64_encode($username.':'.$password),
            'Content-Type: application/json',
        ],json_encode($json,JSON_FORCE_OBJECT));
        return $this->getAPI()->execute($request);
    }

}