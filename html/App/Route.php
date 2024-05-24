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

        $routes['login'] = array(
            'route' => '/login',
            'controller' => 'loginController',
            'action' => 'login'
        );

        $routes['logar'] = array(
            'route' => '/logar',
            'controller' => 'loginController',
            'action' => 'logar'
        );

        $routes['cadastrar'] = array(
            'route' => '/cadastrar',
            'controller' => 'cadastrarController',
            'action' => 'cadastrar'
        );

        $routes['registrar'] = array(
            'route' => '/registrar',
            'controller' => 'cadastrarController',
            'action' => 'registrar'
        );

        $routes['profissional'] = array(
            'route' => '/profissional',
            'controller' => 'profissionalController',
            'action' => 'profissional'
        );

        $routes['avaliar'] = array(
            'route' => '/avaliar',
            'controller' => 'avaliarController',
            'action' => 'avaliar'
        );

        $this->setRoutes($routes);
    }  
}