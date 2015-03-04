<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        init_sistema();
		$this->load->model('admin/site/site_model', 'site');
    }
    
    public function index(){
		$logo = logo_site();
    	$data = array('titulo'=>$logo['titulo'],'logo'=>$logo['logo'],
					  'projetos' => $this->site->get_projetos(TRUE)->result()
					  );

        $this->load->view('site/index',$data);
    }
	
    function t_contato(){
    	$logo = logo_site();
		$data = array('titulo'=>$logo['titulo'],'logo'=>$logo['logo']);
        $this->load->view('site/contato',$data);
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
	
	function detalhe(){
		$data = array('detalhe'=>$this->site->get_byIdprojeto($this->input->get('item'))->result());
		$this->load->view('site/det_portifolio',$data);
	}
	
	function sobre(){
		$logo = logo_site();
		$data = array('titulo'=>$logo['titulo'],
					  'logo'=>$logo['logo']);
        $this->load->view('site/sobre',$data);
	}
	
	function parceiros(){
		$logo = logo_site();
		$data = array('titulo'=>$logo['titulo'],
					  'logo'=>$logo['logo'],
					  'parceiros' => $this->site->get_parceiros(TRUE)->result());
        $this->load->view('site/parcerias',$data);
	}
	
	function servicos(){
		$logo = logo_site();
		$data = array('titulo'=>$logo['titulo'],
					  'logo'=>$logo['logo'],
					  'parceiros' => $this->site->get_parceiros(TRUE)->result());
        $this->load->view('site/servicos',$data);
	}
}