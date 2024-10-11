<?php
namespace App\Models;
use MF\Model\Model;

class Mensagem extends Model{

    protected $tb = "mensagem";

    protected $id_pedido;

    public function view_chat() {    
        $pedidos = $this->select("nome_cliente, nome_profissional, remetente, mensagem","chat","id_pedido = ".$this->id_pedido);
        return $pedidos;
    }
}