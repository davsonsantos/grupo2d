<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Permissao_model extends CI_Model {
    
    public function permissao_sistema(){         
        $query = $this->db->query("SELECT * FROM tb_modulo m
                                    INNER JOIN tb_permissao p ON p.mod_id = m.mod_id
                                    WHERE m.mod_ativo = 'S'
                                    AND p.usu_id = ".$this->session->userdata('user_id')." ORDER BY m.mod_id ASC");	
        if($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    /*bloco de sistema*/
    
    function get_sistema(){
        $sql = "SELECT sis_id, sis_nome, sis_descricao, sis_icon,
                    CASE sis_ativo WHEN 'S' THEN 'Ativo'
                                   WHEN 'N' THEN 'Inativo'
                    ELSE 'Sstatus Indefinido' END AS sis_ativo      
                    FROM tb_sistema
                    ORDER BY sis_id";
        return $this->db->query($sql);
    }
    
	public function get_byIcon(){
        $sql = "select * from tb_icon order by icon_nome";
        return $this->db->query($sql);
    }
    
    public function get_byIdsistema($id=NULL){
        $sql = "select * from tb_sistema where sis_id=".$id;
        return $this->db->query($sql);
    }
    
    public function get_byNomesistema($nome=NULL){
        $sql = "select * from tb_sistema where sis_nome='".$nome."'";
        return $this->db->query($sql);
    }
    
    public function inserir_sistema($dados=NULL){
        if ($dados != NULL):
            $this->db->insert('tb_sistema', $dados);
            if ($this->db->affected_rows()>0):
               return true;
            else:
                return false;
            endif;
        endif;
    }
    
    public function editar_sistema($dados){ 
        $sql = "update tb_sistema set sis_nome = '".$dados['sis_nome']."', sis_descricao = '".$dados['sis_descricao']."',
                                      sis_ativo = '".$dados['sis_ativo']."', sis_icon = '".$dados['sis_icon']."' 
                                      where sis_id = ".$dados['sis_id'];
        if ($this->db->query($sql)){
            return true;
        }else{
            return false;
        }
    }
    
    public function exc_sistema($dados,$redir=true){ 
        $sql = "delete from tb_sistema where sis_id = ".$dados['sis_id'];

        if ($this->db->query($sql)){
            set_msg('msg', 'Exclusão efetuada com sucesso', 'sucesso');
        }else{
            set_msg('msg', 'Erro ao efetuar a exclusão', 'erro');
        }
            
            if ($redir) redirect(GD_RAIZ.'permissao/sistema');
    }
    /*from do bloco de sistema */
    
    /*bloco de modulos*/
    
    function get_modulos(){
        $sql = "SELECT * FROM tb_modulo m
                INNER JOIN tb_sistema s on s.sis_id = m.sis_id
                WHERE m.mod_ativo = 'S'";
        return $this->db->query($sql);
    }
    
    public function inserir_modulo($dados=NULL){
        if ($dados != NULL):
            $this->db->insert('tb_modulo', $dados);
            if ($this->db->affected_rows()>0):
               return true;
            else:
                return false;
            endif;
        endif;
    }
    
    public function get_byIdmodulo($id=NULL){
        $sql = "select * from tb_modulo where mod_id=".$id;
        return $this->db->query($sql);
    }
    
    public function editar_modulo($dados){ 
        $sql = "update tb_modulo set mod_descricao = '".$dados['mod_descricao']."', mod_ativo = '".$dados['mod_ativo']."',
                                      mod_formulario = '".$dados['mod_formulario']."', sis_id = ".$dados['sis_id']." where mod_id = ".$dados['mod_id'];
        if ($this->db->query($sql)){
            return true;
        }else{
            return false;
        }
    }
    
    public function exc_modulo($dados,$redir=true){ 
        $sql = "delete from tb_modulo where mod_id = ".$dados['mod_id'];

        if ($this->db->query($sql)){
            set_msg('msg', 'Exclusão efetuada com sucesso', 'sucesso');
        }else{
            set_msg('msg', 'Erro ao efetuar a exclusão', 'erro');
        }
            
            if ($redir) redirect(GD_RAIZ.'permissao/modulo');
    }
	/*fim do bloco de modulos*/
	
	/*bloco de usuarios*/
	function get_usuarios(){
        $sql = "SELECT * FROM tb_usuarios";
        return $this->db->query($sql);
    }
	
	public function inserir_usuario($dados=NULL){
        if ($dados != NULL):
            $this->db->insert('tb_usuarios', $dados);
            if ($this->db->affected_rows()>0):
               return true;
            else:
                return false;
            endif;
        endif;
    }
	
	public function get_byIdusuario($id=NULL){
        $sql = "select * from tb_usuarios where usu_id=".$id;
        return $this->db->query($sql);
    }
    
	public function editar_usuario($dados){ 
        $sql = "update tb_usuarios set usu_nome = '".$dados['usu_nome']."', usu_login = '".$dados['usu_login']."',
                                      usu_ativo = ".$dados['usu_ativo']." where usu_id = ".$dados['usu_id'];
        if ($this->db->query($sql)){
            return true;
        }else{
            return false;
        }
    }
	
	public function exc_usuario($dados,$redir=true){ 
        $sql = "delete from tb_usuarios where usu_id = ".$dados['usu_id'];

        if ($this->db->query($sql)){
            set_msg('msg', 'Exclusão efetuada com sucesso', 'sucesso');
        }else{
            set_msg('msg', 'Erro ao efetuar a exclusão', 'erro');
        }
            
            if ($redir) redirect(GD_RAIZ.'permissao/usuario');
    }
	/*fim do modulo de usuarios*/
	
	/*modulo de permissoes*/
	function lista_modulos_permissao($id){
		$sql = "select * from tb_modulo where mod_id not in (select mod_id from tb_permissao WHERE usu_id = ".$id.")";
		return $this->db->query($sql);
	}

	function cad_permissao($item,$id){
		$sql = "insert into tb_permissao(usu_id,mod_id,excluir,editar,inserir,visualizar)
		        values(".$id.",".$item.",1,1,1,1)";
		return $this->db->query($sql);
	}
	
	function lista_usuario_permissao($id){
		$sql = "select * from tb_modulo where mod_id in (select mod_id from tb_permissao WHERE usu_id = ".$id.")";
		return $this->db->query($sql);
	}
    
    function remove_acesso($item,$id){
    	$sql = "delete from tb_permissao where usu_id = ".$id." and mod_id = ".$item." ";
		return $this->db->query($sql);
    }
}