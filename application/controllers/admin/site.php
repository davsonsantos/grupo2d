<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        init_sistema();
        esta_logado();
		$this->load->helper(array('upload'));
        $this->load->model('admin/site/site_model', 'site');
    }
    
    
    public function configuracao(){
    	$conf = $this->site->dados_conf()->result();
		$l = explode(".", $conf[0]->site_logo);
		$logo = $l[0]."_thumb.".$l[1];
        $data = array(
            'titulo'=>'Configurações do Sistema',
            'titulo_site'=>$conf[0]->site_titulo,
            'logo'=>$logo
        );
        $this->load->view('admin/site/configuracao',$data);
    }
	
	function upd_configuracao(){
		header('Content-type: text/html; charset=UTF-8');
        $config_img = array('diretorio'=>'configuracao','w'=>230,'h'=>81,'ratio'=>TRUE);
        $anexo = upload_imagem('logo',$config_img);
        if(is_array($anexo)){
        	echo "aqui";
        	$conf = $this->site->dados_conf()->result();
            $anexo = $conf[0]->site_logo;
        }
		$dados = array('site_titulo'=>$this->input->post('site_titulo'),'site_logo'=>$anexo);
		
		$retorno = $this->site->upd_configuracao($dados);
		if ($retorno){
            set_msg('msg', 'Dados alterados com sucesso', 'sucesso');
        }else{
            set_msg('msg', 'Erro ao alterar os dados', 'erro');
        }
		redirect(GD_RAIZ.'site/configuracao');
	}
    
    
   
        
}