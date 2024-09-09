<?php
namespace App\Models;
use MF\Model\Model;

class Pedido extends Model{

    protected $tb = "pedidos";

    protected $id_pedido;
    protected $id_cliente;
    protected $id_profissional;
    protected $id_problema;
    protected $descricao;
    protected $endereco;
    protected $data_confirmacao;

    public function cad_pedido() {
        date_default_timezone_set('America/Sao_Paulo');
        
        $indice = "id_cliente, id_problema, descricao, endereco, data_solicitacao, status";
        $valor = $this->id_cliente.", ".$this->id_problema.", '".$this->descricao."', '".$this->endereco."', '". date('Y-m-d H:i:s')."', 0";

        $this->insert($this->tb,$indice,$valor);
    } 

    public function list_pedidos() {    
        $pedidos = $this->select("id_pedido,data_solicitacao,descricao",$this->tb,"id_cliente = ".$this->id_cliente ." and status != 2", "order by id_pedido desc" );
        return $pedidos;
    } 

    public function ver_pedido() {    
        $pedido = $this->select("pr.nome,p.descricao, p.endereco",$this->tb." p INNER JOIN problemas pr ON(p.id_problema = pr.id_problema)","p.id_cliente = ".$this->id_cliente ." and p.id_pedido = ".$this->id_pedido);
        return $pedido[0];
    } 

    public function edit_pedido() {    
        $set = "descricao = '".$this->descricao."', endereco = '".$this->endereco."'";
        $this->update($this->tb,$set,"id_cliente = ".$this->id_cliente ." and id_pedido = ".$this->id_pedido );
    }

    public function exc_pedido() {    
        $this->delete($this->tb,"id_cliente = ".$this->id_cliente." and id_pedido = ".$this->id_pedido);
    }

    public function list_servicos() {    
        $pedidos = $this->select("id_pedido, nome_completo, problema, descricao, endereco, data_solicitacao","list_servicos","id_profissional = ".$this->id_cliente. " and id_profissional_vinculado is null");
        return $pedidos;
    } 

    public function list_servicos_vinculados() {    
        $pedidos = $this->select("*","list_servicos","id_profissional_vinculado = ".$this->id_profissional. " and id_profissional =". $this->id_profissional);
        return $pedidos;
    } 

    public function vincular_pedido() {    
        $pedidos = $this->update($this->tb, "id_profissional =". $this->id_profissional.",data_confirmacao ='". $this->data_confirmacao. "'", "id_pedido =". $this->id_pedido);
        return $pedidos;
    } 
}