<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Permissao extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        init_sistema();
        $this->load->model('admin/seguranca/permissao_model', 'permissao');
    }
    
    
/*bloco de sistemas*/    
    public function sistema(){
    	tem_acesso();
        $data = array(
            'titulo'=>'Lista de Sistemas',
            'lista'=>$this->permissao->get_sistema()->result()
        );
        $this->load->view('admin/permissao/lista_sistema',$data);
    }
    
    function cadastro_sistema(){
        $acao = base64_decode($this->input->get('acao'));
        switch ($acao) {
            case 'novo':
                $data = array('titulo'=>'Novo Sistema',
                    'acao'=>$acao,
                    'botao'=>'Cadastrar',
                    'cor'=>'success',
                    'dados'=>'',
					'icon'=>$this->permissao->get_byIcon()->result());
                
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
        $this->load->view('admin/permissao/cad_sistema',$data);
    }
    
    function confirmar_sistema(){
        $acao = $this->input->get_post('acao');
        switch ($acao) {
            case 'novo':
                $dados = array('sis_nome'=>  $this->input->post('sis_nome'),
                               'sis_descricao'=>$this->input->post('sis_descricao'),
                               'sis_ativo'=>$this->input->post('sis_ativo'),
							   'sis_icon'=>$this->input->post('sis_icon'));
                $sucesso = $this->permissao->inserir_sistema($dados);
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
    
    function excluir_sistema(){
        $dados = array('sis_id'=>$this->input->get('id'));
        $this->permissao->exc_sistema($dados);
    }
    
    /*blodo de modulos*/
        public function modulo(){
        $data = array('titulo'=>'Lista de Módulos',
                      'lista'=>$this->permissao->get_modulos()->result());
        $this->load->view('admin/permissao/lista_modulo',$data);
    }
    
    function cadastro_modulo(){
        $acao = base64_decode($this->input->get('acao'));
        switch ($acao) {
            case 'novo':
                $data = array('titulo'=>'Novo Múdulo',
                    'acao'=>$acao,
                    'botao'=>'Cadastrar',
                    'cor'=>'success',
                    'sistema'=>$this->permissao->get_sistema()->result());
                break;
            case 'editar':
                $data = array('titulo'=>'Editar Sistema',
                            'acao'=>$acao,
                            'botao'=>'Editar',
                            'cor'=>'warning',
                            'id'=>$this->input->get('id'),
                            'sistema'=>$this->permissao->get_sistema()->result(),
                            'dados'=>$this->permissao->get_byIdmodulo($this->input->get('id'))->row());
                break;
            default:
                
                break;       
        }
        $this->load->view('admin/permissao/cad_modulo',$data);
    }
    
    
    function confirmar_modulo(){
        $acao = $this->input->get_post('acao');
        $item = explode(";", $this->input->post('sis_id'));
        switch ($acao) {
            case 'novo':
                $dados = array('mod_descricao'=>  $item[1]." - ".$this->input->post('mod_descricao'),
                               'mod_ativo'=>$this->input->post('mod_ativo'),
                               'mod_formulario'=>$this->input->post('mod_formulario'),
                               'sis_id'=>$item[0]);
                $sucesso = $this->permissao->inserir_modulo($dados);
                break;
            case 'editar':
                $dados = array('mod_descricao'=>  $item[1]." - ".$this->input->post('mod_descricao'),
                               'mod_ativo'=>$this->input->post('mod_ativo'),
                               'mod_formulario'=>$this->input->post('mod_formulario'),
                               'sis_id'=>$item[0],
                                'mod_id'=>$this->input->post('id'));
                $sucesso = $this->permissao->editar_modulo($dados);
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
    
    function excluir_modulo(){
        $dados = array('mod_id'=>$this->input->get('id'));
        $this->permissao->exc_modulo($dados);
    }
    
	/*fim do bloco de modulos*/
	
	/*bloco de usuarios*/
	public function usuarios(){
        $data = array(
            'titulo'=>'Lista de Usuários',
            'lista'=>$this->permissao->get_usuarios()->result()
        );
        $this->load->view('admin/permissao/lista_usuarios',$data);
    }
	
	function cadastro_usuario(){
        $acao = base64_decode($this->input->get('acao'));
        switch ($acao) {
            case 'novo':
                $data = array('titulo'=>'Novo Usuário',
                    'acao'=>$acao,
                    'botao'=>'Cadastrar',
                    'cor'=>'success');
                break;
            case 'editar':
                $data = array('titulo'=>'Editar Usuários',
                            'acao'=>$acao,
                            'botao'=>'Editar',
                            'cor'=>'warning',
                            'id'=>$this->input->get('id'),
                            'dados'=>$this->permissao->get_byIdusuario($this->input->get('id'))->row());
                break;
            default:
                
                break;       
        }
        $this->load->view('admin/permissao/cad_usuario',$data);
    }
	
	function confirmar_usuario(){
        $acao = $this->input->get_post('acao');
        switch ($acao) {
            case 'novo':
                $dados = array('usu_nome'=>  $this->input->post('usu_nome'),
                               'usu_login'=>$this->input->post('usu_login'),
                               'usu_senha'=>md5($this->input->post('usu_senha')),
                               'usu_email'=>$this->input->post('usu_email'),
                               'usu_ativo'=>$this->input->post('usu_ativo'));
                $sucesso = $this->permissao->inserir_usuario($dados);
                break;
            case 'editar':
                $dados = array('usu_nome'=>  $this->input->post('usu_nome'),
                               'usu_login'=>$this->input->post('usu_login'),
                               'usu_email'=>$this->input->post('usu_email'),
                               'usu_ativo'=>$this->input->post('usu_ativo'),
                               'usu_id'=>$this->input->post('id'));
                $sucesso = $this->permissao->editar_usuario($dados);
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
	
	function excluir_usuario(){
        $dados = array('usu_id'=>$this->input->get('id'));
        $this->permissao->exc_usuario($dados);
    }
	
	function permissao_usuario(){
		$id = base64_decode($this->input->get('id'));
		$data = array('titulo'=>'Permissões de Acesso',
                                'botao'=>'Confirmar',
                                'cor'=>'success',
                                'id'=>$id,
                                'lista'=>$this->permissao->lista_modulos_permissao($id)->result());
		$this->load->view('admin/permissao/permissoes_acesso',$data);								
	}

	function confirmar_permissao(){
		$sucesso = 0;
		$erro = 0;
		for ($i=0; $i < count($_POST['opcao']); $i++) { 
			if($this->permissao->cad_permissao($_POST['opcao'][$i],$_POST['id'])){
				$sucesso++;
			}else{
				$erro++;
			}
		}
	
		if($erro > 0 and $sucesso > 0){
			echo 1;
		}elseif($erro > 0 and $sucesso == 0){
			echo 2;
		}elseif($erro == 0 and $sucesso > 0){
			echo 3;
		}
	}

	public function remove_permisao(){
        $id = base64_decode($this->input->get('id'));
		$data = array('titulo'=>'Permissões do Usuário',
                                'botao'=>'Remover Acesso',
                                'cor'=>'warning',
                                'id'=>$id,
                                'lista'=>$this->permissao->lista_usuario_permissao($id)->result());
        $this->load->view('admin/permissao/remover_permissao',$data);
    }
	
	function confirmar_remover_acesso(){
		$sucesso = 0;
		$erro = 0;
		for ($i=0; $i < count($_POST['opcao']); $i++) { 
			if($this->permissao->remove_acesso($_POST['opcao'][$i],$_POST['id'])){
				$sucesso++;
			}else{
				$erro++;
			}
		}
	
		if($erro > 0 and $sucesso > 0){
			echo 1;
		}elseif($erro > 0 and $sucesso == 0){
			echo 2;
		}elseif($erro == 0 and $sucesso > 0){
			echo 3;
		}
	}
    
   
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/inicio.php */