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
	
	
	public function portifolio(){
        $data = array(
            'titulo'=>'Lista de Projetos Realizados',
            'lista'=>$this->site->get_projetos()->result()
        );
        $this->load->view('admin/site/lista_portifolio',$data);
    }
	
	function cadastro_projeto(){
        $acao = base64_decode($this->input->get('acao'));
        switch ($acao) {
            case 'novo':
                $data = array('titulo'=>'Novo Projeto',
                    'acao'=>$acao,
                    'botao'=>'Cadastrar',
                    'cor'=>'success',
                    'dados'=>'',
                    'categoria'=>$this->site->get_categoria()->result()
					);
                
                break;
            case 'editar':
                $data = array('titulo'=>'Editar Sistema',
                            'acao'=>$acao,
                            'botao'=>'Editar',
                            'cor'=>'warning',
                            'id'=>$this->input->get('id'),
                            'dados'=>$this->permissao->get_byIdsistema($this->input->get('id'))->row(),
							'icon'=>$this->permissao->get_byIcon()->result());
                break;
            default:
                
                break;       
        }
        $this->load->view('admin/site/cad_projeto',$data);
    }

	function confirmar_projeto(){
        $acao = $this->input->get_post('acao');
        switch ($acao) {
            case 'novo':
				$config_img = array('diretorio'=>'portifolio','w'=>370,'h'=>240,'ratio'=>FALSE);
		        $anexo = upload_imagem('logo',$config_img);
                $dados = array('por_nome'=>  $this->input->post('por_nome'),
                               'por_descricao'=>$this->input->post('por_descricao'),
                               'por_img'=>$anexo,
							   'por_link'=>$this->input->post('por_link'),
							   'cat_projeto_id'=>$this->input->post('cat_projeto_id'));
							   
                $sucesso = $this->site->inserir_projeto($dados);
				if ($sucesso){
		            set_msg('msg', 'Dados Inseridos com sucesso', 'sucesso');
		        }else{
		            set_msg('msg', 'Erro ao Cadastrar os dados', 'erro');
		        }
				redirect(GD_RAIZ.'site/portifolio');
                break;
            case 'editar':
                $dados = array('sis_nome'=>  $this->input->post('sis_nome'),
                               'sis_descricao'=>$this->input->post('sis_descricao'),
                               'sis_ativo'=>$this->input->post('sis_ativo'),
                               'sis_icon'=>$this->input->post('sis_icon'),
                               'sis_id'=>$this->input->post('id'));
                $sucesso = $this->permissao->editar_sistema($dados);
                break;
            default:
                
                break;       
        }
        if($sucesso){
            echo 1;
        }else{
            echo 0;
        }
    }
    
    
   
        
}