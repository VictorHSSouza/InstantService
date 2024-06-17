<?php
namespace App\Models;
use MF\Model\Model;

class Pedido extends Model{

    protected $tb = "pedidos";

    protected $id_pedido;
    protected $id_usuario;
    protected $id_problema;
    protected $descricao;
    protected $endereco;

    public function cad_pedido() {
        $indice = "id_usuario, id_problema, descricao, endereco, data_solicitacao, data_alteracao, status";
        $valor = $this->__get('id_usuario').", ".$this->__get('id_problema').", '".$this->__get('descricao')."', '".$this->__get('endereco')."', '". date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."', 0";

        $this->insert($this->__get("tb"),$indice,$valor);
    } 

    public function list_pedidos() {    
        $pedidos = $this->select("id,data_solicitacao",$this->__get("tb"),"id_usuario = ".$this->__get('id_usuario') ." and status != 2" );
        return $pedidos;
    } 

    public function ver_pedido() {    
        $pedido = $this->select("pr.nome,p.descricao, p.endereco",$this->__get("tb")." p INNER JOIN problemas pr ON(p.id_problema = pr.id)","p.id_usuario = ".$this->__get('id_usuario') ." and p.id = ".$this->__get('id_pedido') );
        return $pedido[0];
    } 

    public function edit_pedido() {    
        $set = "descricao = '".$this->__get("descricao")."'";
        $this->update($this->__get("tb"),$set,"id_usuario = ".$this->__get('id_usuario') ." and id = ".$this->__get('id_pedido') );
    }

    public function exc_pedido() {    
        $this->delete($this->__get("tb"),"id_usuario = ".$this->__get('id_usuario') ." and id = ".$this->__get('id_pedido') );
    }
}