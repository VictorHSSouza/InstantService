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

        $routes['sobre_nos'] = array(
            'route' => '/sobre_nos',
            'controller' => 'indexController',
            'action' => 'sobre_nos'
        );
        
        //login 
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

        $routes['logout'] = array(
            'route' => '/logout',
            'controller' => 'loginController',
            'action' => 'logout'
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

        // perfil
        $routes['perfil'] = array(
            'route' => '/perfil',
            'controller' => 'perfilController',
            'action' => 'perfil'
        );

        $routes['atualizar_dados'] = array(
            'route' => '/atualizar_dados',
            'controller' => 'perfilController',
            'action' => 'atualizar_dados'
        );

        // profissional
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

        $routes['profissional_pedidos_vinculados'] = array(
            'route' => '/profissional_pedidos_vinculados',
            'controller' => 'profissionalController',
            'action' => 'profissional_pedidos_vinculados'
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

        $routes['api_correio'] = array(
            'route' => '/api_correio',
            'controller' => 'profissionalController',
            'action' => 'api_correio'
        );

        // avaliar
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

        $routes['avaliar_envio'] = array(
            'route' => '/avaliar_envio',
            'controller' => 'avaliarController',
            'action' => 'avaliar_envio'
        );

        // pedido
        $routes['fazer_pedido'] = array(
            'route' => '/fazer_pedido',
            'controller' => 'pedidoController',
            'action' => 'fazer_pedido'
        );

        $routes['list_problemas'] = array(
            'route' => '/list_problemas',
            'controller' => 'pedidoController',
            'action' => 'list_problemas'
        );

        $routes['cad_pedido'] = array(
            'route' => '/cad_pedido',
            'controller' => 'pedidoController',
            'action' => 'cad_pedido'
        );

        $routes['ver_pedido'] = array(
            'route' => '/ver_pedido',
            'controller' => 'pedidoController',
            'action' => 'ver_pedido'
        );

        $routes['ver_pedido_profissional'] = array(
            'route' => '/ver_pedido_profissional',
            'controller' => 'pedidoController',
            'action' => 'ver_pedido_profissional'
        );

        $routes['detalhes_pedido'] = array(
            'route' => '/detalhes_pedido',
            'controller' => 'pedidoController',
            'action' => 'detalhes_pedido'
        );

        $routes['edit_pedido'] = array(
            'route' => '/edit_pedido',
            'controller' => 'pedidoController',
            'action' => 'edit_pedido'
        );

        $routes['excluir_pedido'] = array(
            'route' => '/excluir_pedido',
            'controller' => 'pedidoController',
            'action' => 'excluir_pedido'
        );

        $routes['vincular_pedido'] = array(
            'route' => '/vincular_pedido',
            'controller' => 'pedidoController',
            'action' => 'vincular_pedido'
        );

        $routes['recusar_pedido'] = array(
            'route' => '/recusar_pedido',
            'controller' => 'pedidoController',
            'action' => 'recusar_pedido'
        );

        $routes['finalizar_pedido'] = array(
            'route' => '/finalizar_pedido',
            'controller' => 'pedidoController',
            'action' => 'finalizar_pedido'
        );

        // funcionario 
        $routes['funcionario'] = array(
            'route' => '/funcionario',
            'controller' => 'funcionarioController',
            'action' => 'funcionario'
        );

        $routes['funcionario_cadastro'] = array(
            'route' => '/funcionario_cadastro',
            'controller' => 'funcionarioController',
            'action' => 'funcionario_cadastro'
        );

        $routes['cadastrar_funcionario'] = array(
            'route' => '/cadastrar_funcionario',
            'controller' => 'funcionarioController',
            'action' => 'cadastrar_funcionario'
        );

        $routes['excluir_funcionario'] = array(
            'route' => '/excluir_funcionario',
            'controller' => 'funcionarioController',
            'action' => 'excluir_funcionario'
        );
        // mensagem 
        $routes['cad_mensagem'] = array(
            'route' => '/cad_mensagem',
            'controller' => 'PedidoController',
            'action' => 'cad_mensagem'
        );
        
        $this->setRoutes($routes);
    }  
}