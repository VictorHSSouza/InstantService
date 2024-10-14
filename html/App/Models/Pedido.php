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
        
        $indice = "id_cliente, id_problema, descricao, endereco, data_solicitacao, id_status";
        $valor = $this->id_cliente.", ".$this->id_problema.", '".$this->descricao."', '".$this->endereco."', '". date('Y-m-d H:i:s')."', 1";

        $this->insert($this->tb,$indice,$valor);
    } 

    public function list_pedidos() {    
        $pedidos = $this->select("id_pedido,data_solicitacao,$this->tb.descricao, $this->tb.id_status,status_pedido.descricao as descricao_status", "$this->tb inner join status_pedido on (status_pedido.id_status = $this->tb.id_status)","id_cliente = ".$this->id_cliente ." and $this->tb.id_status != 0", "order by id_status desc" );
        return $pedidos;
    } 

    public function ver_pedido() {    
        $pedido = $this->select("pr.nome,p.descricao, p.endereco",$this->tb." p INNER JOIN problemas pr ON(p.id_problema = pr.id_problema)","p.id_cliente = ".$this->id_cliente ." and p.id_pedido = ".$this->id_pedido ." and id_status != 0");
        return $pedido[0];
    } 

    public function ver_pedido_profissional() {    
        $pedido = $this->select("pr.nome,p.descricao, p.endereco",$this->tb." p INNER JOIN problemas pr ON(p.id_problema = pr.id_problema)","p.id_cliente != ".$this->id_cliente ." and p.id_pedido = ".$this->id_pedido ." and id_status != 0");
        return $pedido[0];
    } 

    public function edit_pedido() {    
        $set = "descricao = '".$this->descricao."', endereco = '".$this->endereco."'";
        $this->update($this->tb,$set,"id_cliente = ".$this->id_cliente ." and id_pedido = ".$this->id_pedido );
    }

    public function exc_pedido() {    
        date_default_timezone_set('America/Sao_Paulo');
        $this->update($this->tb, "data_finalizacao='". date('Y-m-d H:i:s')."', id_status=1","id_cliente = ".$this->id_cliente." and id_pedido = ".$this->id_pedido);
    }

    public function list_servicos() {    
        $pedidos = $this->select("id_pedido, nome_completo, problema, descricao, endereco, data_solicitacao","list_servicos","id_profissional = ".$this->id_cliente. " and id_profissional_vinculado is null and id_cliente != ".$this->id_cliente);
        return $pedidos;
    }

    public function list_servicos_vinculados() {    
        $pedidos = $this->select("*","list_servicos","id_profissional_vinculado = ".$this->id_profissional. " and id_profissional =". $this->id_profissional);
        return $pedidos;
    }

    public function vincular_pedido() {    
        $pedidos = $this->update($this->tb, "id_profissional =". $this->id_profissional.",data_confirmacao ='". $this->data_confirmacao. "',id_status=2", "id_pedido =". $this->id_pedido);
        return $pedidos;
    }

    public function recusar_pedido() {    
        $pedidos = $this->update($this->tb, "id_profissional = NULL".",data_confirmacao =NULL,id_status=1", "id_pedido =". $this->id_pedido);
        return $pedidos;
    }

    public function finalizar_pedido() {    
        date_default_timezone_set('America/Sao_Paulo');
        $pedidos = $this->update($this->tb, "data_finalizacao='". date('Y-m-d H:i:s')."', id_status=0","id_pedido =". $this->id_pedido);
        return $pedidos;
    }

    public function status_mensagem($remetente) {    
        $this->id_profissional = ($remetente == "P")?$this->id_profissional:null;

        if($this->id_profissional == null) {
            $this->update($this->tb, "id_status=3","id_pedido=$this->id_pedido");
        } else {
            $this->update($this->tb, "id_status=4","id_pedido=$this->id_pedido");
        }
    }
}