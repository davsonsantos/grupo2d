<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent:: __construct();   
  //      init_sistema();
		$this->load->library(array('sistema', 'session'));
		$this->load->helper(array('form', 'url', 'array', 'text','email'));
        $this->load->model('admin/usuarios_model','usuarios',TRUE);
    }
    
    public function index(){
        $this->load->view('admin/usuario/login');
    }
    
    function logar(){
        $usuario = $this->input->post('usuario',TRUE);
        $senha = md5($this->input->post('senha',TRUE));

        if($this->usuarios->do_login($usuario,$senha) == TRUE){
            $query = $this->usuarios->get_bylogin($usuario)->row();
            $dados = array(
                          'user_id' => $query->usu_id,
                          'user_nome' => $query->usu_nome,
                          'user_login' => $query->usu_login,
                          'user_email' => $query->usu_email,
                          'user_admin' => $query->usu_admin,
                          'user_master' => $query->usu_master,
                          'user_logado' => TRUE
                        );
            $this->session->set_userdata($dados);
            echo 1;
        }else{
            echo 0;
        }
    }
    
    function conf_senha(){ 
        $senha = md5($this->input->post('senha',TRUE));
        if($this->usuarios->get_bySenha($senha) == TRUE){            
            echo 1;
        }else{
            echo 0;
        }
    }

    public function logoff(){
        $this->session->unset_userdata(array('user_id'=>'', 'user_nome'=>'', 'user_admin'=>'', 'user_logado'=>''));
        $this->session->sess_destroy();
        $this->session->sess_create();
        set_msg('logoffok', 'Logoff efetuado com sucesso', 'sucesso');
        redirect(GD_RAIZ.'login/');
    }    
    
    function esqueceu_senha(){
            $data['unidades'] = $this->usuarios->lista_unidades()->result();
            $this->load->view('admin/usuario/esqueceu_senha',$data);
    }
    
    function enviar_email(){
        $email = $this->input->post('email');
        $query = $this->usuarios->get_byemail($email); 
        if ($query->num_rows()==1){
            $novasenha = substr(str_shuffle('qwertyuiopasdfghjklzxcvbnm0123456789'), 0, 6);
            $texto = "<p>Você solicitou uma nova senha para acesso ao painel de administração do site, a partir de agora use a seguinte senha para acesso: <h1><strong><p style='color: #f5756c;'>$novasenha</p></strong></h1></p>Troque esta senha para uma senha segura e de sua preferência o quanto antes.</p>";
            $info = array('email_titulo'=>'Recuperação de Senha',
                          'conteudo'=>$texto,
                          'tipo'=>'Solicitação de recuperação de senha');
            ob_start();
            $this->load->view('layout/email_senha',$info);
            $mensagem = ob_get_contents();
            ob_end_clean();
            
            if ($this->sistema->enviar_email($email, 'Nova senha de acesso', $mensagem)){
                $dados['usu_senha'] = md5($novasenha);
                $dados['usu_nome'] = $query->row()->usu_nome;
                $dados['uni_id'] = $query->row()->uni_id;
                $this->usuarios->do_update_senha($dados, array('usu_email'=>$email), FALSE);
                echo 1;
            }else{
               echo 2; 
            }
        }else{
            echo 3;
        }
    }
    
    
}

/* End of file login.php */
/* Location: ./application/controllers/usuaiors/login.php */