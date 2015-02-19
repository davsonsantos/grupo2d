<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Site_model extends CI_Model {
    
    public function upd_configuracao($dados=NULL){
        if ($dados != NULL):
            $this->db->update('tb_configuracao', $dados);
            if ($this->db->affected_rows()>0):
               return true;
            else:
                return false;
            endif;
        endif;
    }
    
    public function dados_conf(){
        $sql = "select * from tb_configuracao";
        return $this->db->query($sql);
    }
	
	function get_projetos(){
		$sql = "SELECT * FROM tb_portifolio p
				INNER JOIN tb_categoria_projeto c ON p.cat_projeto_id = c.cat_projeto_id";
		return $this->db->query($sql);
	}
	
	function get_categoria(){
		$sql = "select * from tb_categoria_projeto";
		return $this->db->query($sql);
	}
	
	public function inserir_projeto($dados=NULL){
        if ($dados != NULL):
            $this->db->insert('tb_portifolio', $dados);
            if ($this->db->affected_rows()>0):
               return true;
            else:
                return false;
            endif;
        endif;
    }
    
}