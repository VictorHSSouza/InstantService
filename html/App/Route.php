<?php

namespace App;

use MF\Init\Bootstrap;

Class Route extends Bootstrap {    

    protected function initRoutes() {
        $routes['home'] = array(
            'route' => '/',
            'controller' => 'indexController',
            'action' => 'index'
        );

        $routes['profissional'] = array(
            'route' => '/profissional',
            'controller' => 'profissionalController',
            'action' => 'profissional'
        );

        $routes['teste'] = array(
            'route' => '/teste',
            'controller' => 'testeController',
            'action' => 'teste'
        );

        $this->setRoutes($routes);
    }  
}