<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        init_sistema();
        esta_logado();
    //    $this->load->model('admin/seguranca/permissao_model', 'permissao');
    }
    
    
    public function configuracao(){
        $data = array(
            'titulo'=>'Configurações do Sistema',
           // 'lista'=>$this->permissao->get_sistema()->result()
        );
        $this->load->view('admin/site/configuracao',$data);
    }
	
	function upd_configuracao(){
		print_r($_POST);
		print_r($_FILES);
	}
    
    
   
        
}