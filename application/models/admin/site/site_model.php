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
	
	function get_projetos($site){
		if($site == true){
			$compl = " limit 0,12";
		}else{
			$compl = " order by por_id";	
		}
		$sql = "SELECT * FROM tb_portifolio p
				INNER JOIN tb_categoria_projeto c ON p.cat_projeto_id = c.cat_projeto_id 
				INNER JOIN tb_parceiros pa on pa.par_id = p.par_id".$compl;
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
	
	public function exc_projeto($dados,$redir=true){ 
        $sql = "delete from tb_portifolio where por_id = ".$dados['por_id'];
        if ($this->db->query($sql)){
            return TRUE;
        }else{
            return FALSE;
        }
    }
	
	public function get_byIdprojeto($id=NULL){
        $sql = "SELECT * FROM tb_portifolio p
				INNER JOIN tb_categoria_projeto c ON p.cat_projeto_id = c.cat_projeto_id
				INNER JOIN tb_parceiros pa on pa.par_id = p.par_id
				 where por_id=".$id;
        return $this->db->query($sql);
    }
	
	public function editar_projeto($dados){
        $sql = "update tb_portifolio set por_nome = '".$dados['por_nome']."', por_descricao = '".$dados['por_descricao']."',
                                      por_img = '".$dados['por_img']."', por_link = '".$dados['por_link']."', par_id = '".$dados['par_id']."'  
                                      where por_id = ".$dados['por_id'];
        if ($this->db->query($sql)){
            return true;
        }else{
            return false;
        }
    }
	
	function get_parceiros(){
		$sql = "SELECT * FROM tb_parceiros p
		         INNER JOIN tb_especialidade_parceiro e on p.esp_par_id = e.esp_par_id";
		return $this->db->query($sql);
	}
	
	public function inserir_parceiro($dados=NULL){
        if ($dados != NULL):
            $this->db->insert('tb_parceiros', $dados);
            if ($this->db->affected_rows()>0):
               return true;
            else:
                return false;
            endif;
        endif;
    }
    
    public function exc_parceiro($dados,$redir=true){ 
        $sql = "delete from tb_parceiros where par_id = ".$dados['par_id'];
        if ($this->db->query($sql)){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
	public function get_byIdparceiro($id=NULL){
        $sql = "SELECT * FROM tb_parceiros where par_id=".$id;
        return $this->db->query($sql);
    }
    
    public function editar_parceiro($dados){
        $sql = "update tb_parceiros set par_nome = '".$dados['par_nome']."', par_descricao = '".$dados['par_descricao']."',
                                      par_img = '".$dados['par_img']."', esp_par_id = ".$dados['esp_par_id']."  where par_id = ".$dados['par_id'];
        if ($this->db->query($sql)){
            return true;
        }else{
            return false;
        }
    }
	
	function get_esp_parceiro(){
		$sql = "SELECT * FROM tb_especialidade_parceiro";
		return $this->db->query($sql);
	}
}