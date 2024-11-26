<?php 
namespace App\Models;

use Google\Client;
use Google\Service\Oauth2 as ServiceOauth2;
use GuzzleHttp\Client as GuzzleClient;
use Google\Service\Oauth2\Userinfo;

class GoogleClient {

    public Client $client;

    private Userinfo $data;

    public function __construct() {       
        $this->client =  new Client;
    }

    public function init() {
        $guzzleClient = new GuzzleClient(['curl' => [CURLOPT_SSL_VERIFYPEER => false]]);
        $this->client->setHttpClient($guzzleClient);
        $this->client->setAuthConfig('../App/credentials.json');
        $this->client->setRedirectUri('http://localhost:8080/logar');
        $this->client->addScope('email');
        $this->client->addScope('profile');
        
    }

    public function authorized() {
        if(isset($_GET['code'])) {
            $token = $this->client->fetchAccessTokenWithAuthCode($_GET['code']);
            $this->client->setAccessToken($token['access_token']);
            $googleService = new ServiceOauth2($this->client);
            $this->data = $googleService->userinfo->get();
        }
    }

    public function getData() {
        $retorno = (isset($this->data))? true:false;
        return $retorno;
    }

    public function getEmail() {
        return $this->data->getEmail();
    }

    public function generateAuthLink() {
        return $this->client->createAuthUrl();
    }

}


?>