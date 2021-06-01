<?php
namespace WHATSAPP\SDK\Edges;

use WHATSAPP\SDK\APIEdge;
use WHATSAPP\SDK\Edges\Users\Login;
use WHATSAPP\SDK\Edges\Users\Logout;
use WHATSAPP\SDK\Edges\Users\ManageUsers;

class Users extends APIEdge{

    public const ENDPOINT = '/v1/users';

    public function Login(): Login{
        return new Login($this->getAPI(),$this->getEndpoint().Login::ENDPOINT);
    }

    public function Logout(): Logout{
        return new Logout($this->getAPI(),$this->getEndpoint().Logout::ENDPOINT);
    }

    public function ManageUsers(): ManageUsers{
        return new ManageUsers($this->getAPI(),$this->getEndpoint().ManageUsers::ENDPOINT);
    }

}