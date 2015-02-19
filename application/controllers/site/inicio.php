<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        init_sistema();
		$this->load->model('admin/site/site_model', 'site');
    }
    
    public function index(){
    	$conf = $this->site->dados_conf()->result();
		$l = explode(".", $conf[0]->site_logo);
		$logo = $l[0]."_thumb.".$l[1];
    	$data = array('titulo'=>$conf[0]->site_titulo,
					  'logo'=>$logo);
        $this->load->view('site/index',$data);
    }
	
    function t_contato(){
            $this->load->view('site/contato');
    }
	
    function error404() { 
        $this->load->view('site/layout/erro404');
    } 
    
    function enviar_email(){
        $dados = array('nome'=>$this->input->post('nome'),
                       'email'=>$this->input->post('email'),
                       'assunto'=>$this->input->post('assunto'),
                       'msg'=>$this->input->post('msg'),    
                       'anexo'=>"");
        $retorno = enviar_email_site($dados);
        if($retorno == true){
            echo 1;
        }else{
            echo 0;
        }
    }
}