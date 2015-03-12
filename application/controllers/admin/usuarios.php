<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    public function __construct() {
        parent:: __construct();             
        init_sistema();
		
        $this->load->model('admin/usuarios_model','usuarios');
    }
    
    function perfil(){
        $data = array('titulo' => 'Atualizar Perfil');
        $this->load->view('admin/usuario/atualizar_perfil',$data);
    }
    
    function foto_perfil(){
        print_r($_FILES);exit;
    }


    public function index(){
    	tem_acesso();
        if($this->session->userdata('user_master') == 1){
            $dados = $this->usuarios->get_all($this->session->userdata('user_unidade'))->result();
        }else{
            $dados = $this->usuarios->get_byId($this->session->userdata('user_id'))->result();
        }
        $data = array('titulo' => 'Lista de Usuários',
                      'subtitulo' => 'Gerenciador de Usuários',
                      'dados' => $dados );
        $this->load->view('usuario/lista_usuario',$data);
    }
    
    function cadastrar(){ 
        if($this->input->post('acao') == 1){
            $dados = array(
                       'usu_nome' => manipula_string($this->input->post('nome'),'P'),
                       'usu_login' => manipula_string($this->input->post('login'),'MI'),
                       'usu_senha' => md5(manipula_string($this->input->post('senha'),'MI')),
                       'usu_email' => manipula_string($this->input->post('email'),'MI'),
                       'usu_admin' => 0,
                       'uni_id' => intval($this->session->userdata('user_unidade')),
                       'usu_ativo' => ($this->input->post('ativo')==1) ? 1 : 0,
                       'usu_master' => ($this->input->post('master')==1) ? 1 : 0,
                       'usu_tipo' => $this->input->post('tipo'),
                       'usu_cd_pessoa' => $this->input->post('associa'),
                      );
            $this->usuarios->do_insert($dados);
         //   auditoria('I', 'Usuário '.$this->session->userdata('usu_nome').' realizou um novo cadastro de usuário ('.$this->input->post('nome').')');
        }else{
            $data = array('titulo' => 'Cadastrar de Usuários',
                          'subtitulo' => 'Gerenciador de Usuários',
                          'pessoa'=>$this->usuarios->lista_pessoas()->result());
            
            $this->load->view('admin/usuario/cadastrar_usuario',$data);
        }
    }
    
    function excluir(){
        if(is_admin(TRUE)){ 
            $iduser = $this->uri->segment(3);
            if($iduser != NULL){
                $query = $this->usuarios->get_byid($iduser);
                if($query->num_rows() == 1){
                    $query = $query->row();
                    if($query->usu_id != 1){              
                        $dados['usu_ativo'] = 0;
                        $this->usuarios->do_delete($dados,array('usu_id'=>$query->usu_id), FALSE);
                        set_msg('msgok','Registro excluido com sucesso','sucesso');
                    }else{
                         set_msg('msgerro','Este usuário não pode ser excluido','erro');
                    }
                }else{
                    set_msg('msgerro','Usuário não encontrado para exclusão','erro');
                }
            }else{
                set_msg('msgerro','Escolha um usuário para excluir','erro');
            }
        }
        redirect('admin/usuarios/');
    }
    
    
    function editar(){
        if($this->input->post('acao') == 1){
            if($this->input->post('senha')){
                $dados['usu_senha'] = $this->input->post('senha');
            }
            $dados['usu_cd_pessoa'] = $this->input->post('associa');
            $dados['usu_nome'] = manipula_string($this->input->post('nome'),'P');
            $dados['usu_email'] = manipula_string($this->input->post('email'),'MI');
            if (is_admin()) $dados['usu_ativo'] = ($this->input->post('ativo')==1) ? 1 : 0;
            if (is_admin()) $dados['usu_master'] = ($this->input->post('master')==1) ? 1 : 0;
            $this->usuarios->do_update($dados, array('usu_id'=>$this->input->post('user_id')));
        }else{
            $data = array('titulo' => 'Editar',
                          'subtitulo' => 'Editar dados do usuário',
                          'pessoa'=>$this->usuarios->lista_pessoas()->result());
            $data['dados'] = $this->usuarios->get_byId($this->uri->segment(3))->row();
            $this->load->view('admin/usuario/editar_usuario',$data);
        }
    }    
    
    function valida_login(){
        $retorno = $this->usuarios->get_byLogin($this->input->post('login'),$this->session->userdata('user_unidade'))->num_rows();
        echo $retorno;
    }
    
    function confirma_senha(){
       $this->load->view('admin/usuario/confimacao_senha'); 
    }
    
}

/* End of file usuarios.php */
/* Location: ./application/controllers/usuarios.php */