<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Usuarios_model extends CI_Model {
    
    public function do_login($usuario=NULL, $senha=NULL){  
        
        if ($usuario && $senha){
            $this->db->where('usu_login', $usuario);
            $this->db->where('usu_senha', $senha);
            $this->db->where('usu_ativo', 1);
            $query = $this->db->get('tb_usuarios');
            if ($query->num_rows == 1){
                return TRUE;
            }else{
                return FALSE;
            }
        }else{
            return FALSE;
        }
    }
    
    public function get_bylogin($login=NULL){ 
        if ($login != NULL){
            $this->db->select('u.usu_id, u.usu_nome, u.usu_login, u.usu_senha, u.usu_email, u.usu_ativo, u.usu_admin, u.usu_master');
            $this->db->from('tb_usuarios u');
            $this->db->where('u.usu_login', $login);
            $this->db->limit(1);
            return $this->db->get();
        }else{
            return FALSE;
        }
    }
    
    public function get_byemail($email=NULL){
        if ($email != NULL):
            $this->db->where('usu_email', $email);
            $this->db->limit(1);
            return $this->db->get('tb_usuarios');
        else:
            return FALSE;
        endif;
    }
    
    public function get_byId($id=NULL){
        if ($id != NULL):
            $this->db->where('usu_id', $id);
            $this->db->limit(1);
            return $this->db->get('tb_usuarios');
        else:
            return FALSE;
        endif;
    }
    
    public function get_bySenha($senha=NULL){
//        $sql = "select usu_id from tb_usuarios where usu_login = '".$this->session->userdata('user_login')."' and usu_senha = '".$senha."'";
//        return $this->db->query($sql);
        if ($senha != NULL):
            $this->db->where('usu_login', $this->session->userdata('user_login'));
            $this->db->where('usu_senha', $senha);
            $this->db->where('usu_master', 1);
            $this->db->where('usu_ativo', 1);
            $query = $this->db->get('tb_usuarios');
            if ($query->num_rows == 1){
                return TRUE;
            }else{
                return FALSE;
            }
        else:
            return FALSE;
        endif;
    }
    
    public function do_insert($dados=NULL, $redir=TRUE){
        if ($dados != NULL):
            $this->db->insert('tb_usuarios', $dados);
            if ($this->db->affected_rows()>0):
                #auditoria('I', 'Usuário "'.$dados['login'].'" cadastrado no sistema');
                set_msg('msgok', 'Cadastro efetuado com sucesso', 'sucesso');
            else:
                set_msg('msgerro', 'Erro ao inserir dados', 'erro');
            endif;
            if ($redir){
                redirect('usuarios/cadastrar');
            }
        endif;
    }

    public function do_update($dados=NULL, $condicao=NULL, $redir=TRUE){ 
        if ($dados != NULL && is_array($condicao)){
            $this->db->update('tb_usuarios', $dados, $condicao);
            if ($this->db->affected_rows()>0){
                #auditoria('U', 'Edição de Usuário: ('.$dados['usu_nome'].')');
                set_msg('msgerro', 'Registro atualizado com sucesso', 'sucesso');
                redirect('usuarios/');
            }else{
                set_msg('msgerro', 'Erro ao atualizar dados', 'erro');
                redirect('usuarios/');
            }
        }else{
            set_msg('msgerro', 'Não há registros para atualizar', 'erro');
            redirect('usuarios/');
        }
    }
    
    public function do_update_senha($dados=NULL, $condicao=NULL){ 
        if ($dados != NULL && is_array($condicao)){
            $this->db->update('tb_usuarios', $dados, $condicao);
            if ($this->db->affected_rows()>0){
              #  auditoria('U', 'Usuário solicitou auteração de senha');
            }
        }else{
            set_msg('msgerro', 'Não há registros para atualizar', 'erro');
            redirect('usuarios/esuqeceu_senha');
        }
    }
    
    public function do_delete($dados=NULL, $condicao=NULL, $redir=TRUE){ 
        if($condicao != NULL && is_array($condicao)){
            $this->db->update('tb_usuarios', $dados, $condicao);
            if($this->db->affected_rows() > 0){
                #auditoria('E', 'Exclusão de Usuário');
                set_msg('msgok', 'Exclusão efetuada com sucesso', 'sucesso');
            }else{
                set_msg('msgerro', 'Erro ao efetuar a exclusão', 'erro');
            }
            
            if ($redir) redirect(current_url());
        }
    }
            
    function get_all($unidade=NULL){
        $this->db->where('uni_id', $unidade);
        return $this->db->get('tb_usuarios');
    }
    
    
}