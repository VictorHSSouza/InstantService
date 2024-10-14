<?php
namespace App\Models;
use MF\Model\Model;

class Mensagem extends Model{

    protected $tb = "mensagem";
    protected $campos = ['id_pedido','id_profissional','remetente','mensagem'];

    protected $id_mensagem;
    protected $id_pedido;
    protected $id_profissional;
    protected $remetente;
    protected $mensagem;

    public function view_chat() {    
        $pedidos = $this->select("nome_cliente, nome_profissional, remetente, mensagem","chat","id_pedido = ".$this->id_pedido);
        return $pedidos;
    }

    public function cad_chat() {
        $this->id_profissional = ($this->remetente == "P")?$this->id_profissional:null;
        $indice="";
        $valor="";
        foreach($this->campos as $campo) {
            $indice .= $campo.",";
            $valor .="'".$this->$campo."',";
        }
        $indice = substr($indice,0,-1);
        $valor = substr($valor,0,-1);
        $this->insert($this->tb,$indice,$valor);
    }
}