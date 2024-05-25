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
        //
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
        //
        $routes['profissional'] = array(
            'route' => '/profissional',
            'controller' => 'profissionalController',
            'action' => 'profissional'
        );

        $routes['profissional_cadastro'] = array(
            'route' => '/profissional_cadastro',
            'controller' => 'profissionalController',
            'action' => 'profissional_cadastro'
        );

        $routes['profissional_habilidades_cadastro'] = array(
            'route' => '/profissional_habilidades_cadastro',
            'controller' => 'profissionalController',
            'action' => 'profissional_habilidades_cadastro'
        );

        $routes['profissional_habilidades'] = array(
            'route' => '/profissional_habilidades',
            'controller' => 'profissionalController',
            'action' => 'profissional_habilidades'
        );
        //
        $routes['avaliar'] = array(
            'route' => '/avaliar',
            'controller' => 'avaliarController',
            'action' => 'avaliar'
        );

        $routes['avaliar_profissional'] = array(
            'route' => '/avaliar_profissional',
            'controller' => 'avaliarController',
            'action' => 'avaliar_profissional'
        );

        $this->setRoutes($routes);
    }  
}