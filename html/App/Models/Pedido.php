<?php
namespace App\Models;
use MF\Model\Model;

class Pedido extends Model{

    protected $tb = "pedidos";

    protected $idpedido;
    protected $idusuario;
    protected $idproblema;
    protected $descricao;

    public function cad_pedido() {
        $indice = "id_usuario, id_problema, descricao, data_solicitacao, data_alteracao, status";
        $valor = $this->__get('idusuario').", ".$this->__get('idproblema').", '".$this->__get('descricao')."', '". date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."', 0";

        $this->insert($this->__get("tb"),$indice,$valor);
    } 

    public function list_pedidos() {    
        $pedidos = $this->select("id,data_solicitacao",$this->__get("tb"),"id_usuario = ".$this->__get('idusuario') ." and status != 2" );
        return $pedidos;
    } 

    public function ver_pedido() {    
        $pedido = $this->select("pr.nome,p.descricao",$this->__get("tb")." p INNER JOIN problemas pr ON(p.id_problema = pr.id)","p.id_usuario = ".$this->__get('idusuario') ." and p.id = ".$this->__get('idpedido') );
        return $pedido[0];
    } 

    public function edit_pedido() {    
        $set = "descricao = '".$this->__get("descricao")."'";
        $this->update($this->__get("tb"),$set,"id_usuario = ".$this->__get('idusuario') ." and id = ".$this->__get('idpedido') );
    }

    public function exc_pedido() {    
        $this->delete($this->__get("tb"),"id_usuario = ".$this->__get('idusuario') ." and id = ".$this->__get('idpedido') );
    }
}