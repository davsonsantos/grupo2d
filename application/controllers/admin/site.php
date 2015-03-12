<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        init_sistema();
		$this->load->helper(array('upload'));
        $this->load->model('admin/site/site_model', 'site');
    }
    
    
    public function configuracao(){
    	tem_acesso();
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
		tem_acesso();
        $data = array(
            'titulo'=>'Lista de Projetos Realizados',
            'lista'=>$this->site->get_projetos(FALSE)->result()
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
	                    'categoria'=>$this->site->get_categoria()->result(),
						'parceiro'=>$this->site->get_parceiros()->result()
						);
	                
	                break;
	            case 'editar':
	                $data = array('titulo'=>'Editar Projeto',
	                            'acao'=>$acao,
	                            'botao'=>'Editar',
	                            'cor'=>'warning',
	                            'id'=>$this->input->get('id'),
	                            'categoria'=>$this->site->get_categoria()->result(),
	                            'dados'=>$this->site->get_byIdprojeto($this->input->get('id'))->row(),
								'parceiro'=>$this->site->get_parceiros()->result()
								);
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
							   'cat_projeto_id'=>$this->input->post('cat_projeto_id'),
							   'par_id'=>$this->input->post('par_id')
							   );
							   
                $sucesso = $this->site->inserir_projeto($dados);
				if ($sucesso){
		            set_msg('msg', 'Dados Inseridos com sucesso', 'sucesso');
		        }else{
		            set_msg('msg', 'Erro ao Cadastrar os dados', 'erro');
		        }
                break;
            case 'editar':
				$config_img = array('diretorio'=>'portifolio','w'=>370,'h'=>240,'ratio'=>FALSE);
		        $anexo = upload_imagem('logo',$config_img);
				if($anexo==false){
					$anexo = $this->input->post('img');
				}
                $dados = array('por_nome'=>  $this->input->post('por_nome'),
                               'por_descricao'=>$this->input->post('por_descricao'),
                               'por_img'=>$anexo,
							   'por_link'=>$this->input->post('por_link'),
							   'par_id'=>$this->input->post('par_id'),
							   'cat_projeto_id'=>$this->input->post('cat_projeto_id'),
							   'por_id'=>$this->input->post('id'));
                $sucesso = $this->site->editar_projeto($dados);
				if ($sucesso){
		            set_msg('msg', 'Dados Editados com sucesso', 'sucesso');
		        }else{
		            set_msg('msg', 'Erro ao Editar os dados', 'erro');
		        }
                break;
			case 'excluir':
				$dados = array('por_id'=>$this->input->get('id'));
        		$sucesso = $this->site->exc_projeto($dados);
				if ($sucesso){
		            set_msg('msg', 'Exclusão efetuada com sucesso', 'sucesso');
		        }else{
		            set_msg('msg', 'Erro ao efetuar a exclusão', 'erro');
		        }
            default:
                
                break;       
        }
		redirect(GD_RAIZ.'site/portifolio');
        
    }

	public function parceiros(){
		tem_acesso();
        $data = array(
            'titulo'=>'Lista de Parceiros',
            'lista'=>$this->site->get_parceiros()->result()
        );
        $this->load->view('admin/site/lista_parceiros',$data);
    }

	function cadastro_parceiro(){
        $acao = base64_decode($this->input->get('acao'));
        switch ($acao) {
            case 'novo':
                $data = array('titulo'=>'Novo Parceiro',
                    'acao'=>$acao,
                    'botao'=>'Cadastrar',
                    'cor'=>'success',
                    'dados'=>'',
                   	'especialidade'=>$this->site->get_esp_parceiro()->result()
					);
                break;
            case 'editar':
                $data = array('titulo'=>'Editar Parceiro',
                            'acao'=>$acao,
                            'botao'=>'Editar',
                            'cor'=>'warning',
                            'id'=>$this->input->get('id'),
                            'dados'=>$this->site->get_byIdparceiro($this->input->get('id'))->row(),
							'especialidade'=>$this->site->get_esp_parceiro()->result());
							print_r($data['dados']);
                break;
            default:
                
                break;       
        }
        $this->load->view('admin/site/cad_parceiro',$data);
    }

	function confirmar_parceiro(){
        $acao = $this->input->get_post('acao');
		
        switch ($acao) {
            case 'novo':
				$config_img = array('diretorio'=>'parceiro','w'=>370,'h'=>240,'ratio'=>FALSE);
		        $anexo = upload_imagem('logo',$config_img);
				if($anexo==false){
					$anexo = $this->input->post('img');
				}
                $dados = array('par_nome'=>  $this->input->post('par_nome'),
                               'par_descricao'=>$this->input->post('par_descricao'),
                               'par_img'=>$anexo,
                               'esp_par_id'=>$this->input->post('esp_par_id')
							   );
							   
                $sucesso = $this->site->inserir_parceiro($dados);
				if ($sucesso){
		            set_msg('msg', 'Dados Inseridos com sucesso', 'sucesso');
		        }else{
		            set_msg('msg', 'Erro ao Cadastrar os dados', 'erro');
		        }
                break;
            case 'editar':
				$config_img = array('diretorio'=>'parceiro','w'=>370,'h'=>240,'ratio'=>FALSE);
		        $anexo = upload_imagem('logo',$config_img);
				if(is_array($anexo)){
					$anexo = $this->input->post('img');
				}
                $dados = array('par_nome'=>  $this->input->post('par_nome'),
                               'par_descricao'=>$this->input->post('par_descricao'),
                               'par_img'=>$anexo,
                               'esp_par_id'=>$this->input->post('esp_par_id'),
							   'par_id'=>$this->input->post('id'));
                $sucesso = $this->site->editar_parceiro($dados);
				if ($sucesso){
		            set_msg('msg', 'Dados Editados com sucesso', 'sucesso');
		        }else{
		            set_msg('msg', 'Erro ao Editar os dados', 'erro');
		        }
                break;
			case 'excluir':
				$dados = array('par_id'=>$this->input->get('id'));
        		$sucesso = $this->site->exc_parceiro($dados);
				if ($sucesso){
		            set_msg('msg', 'Exclusão efetuada com sucesso', 'sucesso');
		        }else{
		            set_msg('msg', 'Erro ao efetuar a exclusão', 'erro');
		        }
            default:
                
                break;       
        }
		redirect(GD_RAIZ.'site/parceiros');
        
    }
    
   
        
}