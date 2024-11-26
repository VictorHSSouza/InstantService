<?php 

namespace MF\Controller;

abstract class Action {
    
    protected $view;
    private $classeAtual;

    public function __construct() {
        $this->view = new \stdClass();
    }

    protected function render($view, $layout) {
        $this->view->page = $view;
        if(file_exists("../App/Views/".$layout.".phtml")){
            require_once "../App/Views/".$layout.".phtml";
        } else {
            $this->content();
        }        
    }

    protected function content() {
        $this->setClassAtual();
        require_once "../App/Views/".$this->getClassAtual()."/".$this->view->page.".phtml";
    }

    protected function setClassAtual() {
        $classeAtual = get_class($this);
        $classeAtual = str_replace('App\\Controllers\\','', $classeAtual);
        $classeAtual = strtolower(str_replace('Controller','', $classeAtual));
        $this->classeAtual = $classeAtual;
    }

    protected function getClassAtual() {
        return $this->classeAtual;
    }

}