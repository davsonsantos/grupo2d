<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//inicializar o painel adm carregando os recursos necessarios
function init_sistema() {
    $CI =& get_instance();
    $CI->load->library(array('sistema', 'session', 'form_validation','pagination'));
    $CI->load->helper(array('form', 'url', 'array', 'text','email'));
	if($CI->uri->segment(2) == 'admin'){
		esta_logado();
	}
	if(!$CI->uri->segment(2) == 'inicio'){
	//	tem_acesso();
	}
}


//mostra erros de validação em forms
function erros_validacao(){ 
    if (validation_errors()) echo '<div class="alert alert-danger alert-dismissable">'.validation_errors('<p>', '</p>').'</div>';
}

//define uma mensagem para ser exibida na próxima tela carregada
function set_msg($id='msgerro', $msg=NULL, $tipo='erro'){
    $CI =& get_instance();
    switch ($tipo):
            case 'erro': 
                    $CI->session->set_flashdata($id, '<div  class="alert alert-danger"><p>'.$msg.'</p></div>');
                    break;
            case 'sucesso': 
                    $CI->session->set_flashdata($id, '<div class="alert alert-success"><p>'.$msg.'</p></div>');
                    break;
            case 'aviso': 
                    $CI->session->set_flashdata($id, '<div class="alert alert-warning"><p>'.$msg.'</p></div>');
                    break;
            case 'info': 
                    $CI->session->set_flashdata($id, '<div class="alert alert-info"><p>'.$msg.'</p></div>');
                    break;
			case 'permissao':
					$CI->session->set_flashdata($id,'<div class="alert alert-icon alert-danger"><i class="icon-close"></i>'.$msg.'</div>');
					break;
            default: 
                    $CI->session->set_flashdata($id, '<div class="alert alert-info alert-dismissable">'.$msg.'</p></div>');
                    break;
    endswitch;
}

//verifica se o usuário está logado no sistema
function esta_logado($redir=TRUE){
    $CI =& get_instance();
    $CI->load->library('session');
    $user_status = $CI->session->userdata('user_logado');
    if (!isset($user_status) || $user_status != TRUE){
        if ($redir){
           set_msg('errologin', 'Acesso restrito, faça login antes de prosseguir', 'erro');
           redirect(GD_RAIZ.'login/index');
        }else{
            return FALSE;
        }
    }else{
        return TRUE;
    }
}

//verifico se o usuario tem acesso ao programa que estar acessando
function tem_acesso($redir=TRUE){
    $CI =& get_instance();
	$CI->load->model('admin/seguranca/permissao_model', 'permissao');
	$acesso = $CI->permissao->lista_usuario_permissao($CI->session->userdata('user_id'))->result();
	$erro = 0;
    foreach ($acesso as $row) {
    	if($CI->uri->slash_segment(2).$CI->uri->segment(3) == $row->mod_formulario){
    		$erro++;
		}
    }
	
	if($erro == 0){
		set_msg('msgerro', 'Você não tem permissao de acesso a página solicitada', 'permissao');
		redirect(GD_RAIZ.'inicio/index');	
	}
}

//verifica se existe uma mensagem para ser exibida na tela atual
function get_msg($id, $printar=TRUE){
    $CI =& get_instance();
    if ($CI->session->flashdata($id)):
            if ($printar):
                echo $CI->session->flashdata($id);
            else:
                return $CI->session->flashdata($id);
            endif;
    endif;
    return FALSE;
}

//verifica se o usuário atual é administrador
function is_admin($set_msg=FALSE){
    $CI =& get_instance();
    $user_admin = $CI->session->userdata('user_admin');
    if (!isset($user_admin) || $user_admin != TRUE):
        if ($set_msg) set_msg('msgerro', 'Seu usuário não tem permissão para executar esta operação', 'erro');
        return 0;
    else:
        return 1;
    endif;
}


//carrega a logomarca do site
function logo_site(){
	$CI =& get_instance();
	$CI->load->model('admin/site/site_model', 'site');
	$conf = $CI->site->dados_conf()->result();
	$l = explode(".", $conf[0]->site_logo);

	$dados = array("logo" => $l[0]."_thumb.".$l[1],"titulo" => $conf[0]->site_titulo);
	return $dados;
}


//gera um breadcrumb com base no controller atual
function breadcrumb() {
   $CI =& get_instance();
   $CI->load->helper('url');
   $classe = ucfirst($CI->router->class);
   if($classe == 'Inicio'){
       $classe = anchor($CI->router->class, 'Inicio');
   }else{
       $classe = anchor($CI->router->class, $classe);
   }
   $metodo = ucwords(str_replace('_', ' ', $CI->router->method));
   if($metodo && $metodo != 'Index'){
       $metodo = " &raquo; ".anchor($CI->router->method,$metodo); 
   }else{
       $metodo = " ";
   }

   $bread = '<ul class="breadcrumb">
                <li><i class="fa fa-home"></i>';
   $bread .= anchor('inicio/index', 'Inicio');
   $bread .='     </li> <li>';
   $bread .= $classe.$metodo;
   $bread .= '</ul>';
   return $bread;
    
}
//remover caracteres
function remover_caracter($string){
    return preg_replace("/[^a-zA-Z0-9]/", "", $string);
}

//cria uma mascara com uma string
function mascara_string($mascara,$string){
   $string = str_replace(" ","",$string);
   for($i=0;$i<strlen($string);$i++)
   {
      $mascara[strpos($mascara,"#")] = $string[$i];
   }
   return $mascara;
}

//primeira letra maiuscula
function manipula_string($string,$tipo='MI') {
    //header('Content-type: text/html; charset=UTF-8');
    //header('Content-type: text/html; charset=ISO-8859-1');
    switch ($tipo) {
        case 'P':
            header('Content-type: text/html; charset=UTF-8');
            return ucwords(strtolower($string));
        break;
    
        case 'MI':
            return strtolower($string);
        break;
        case 'MA':
            return ucwords(strtoupper($string));
        break;

        default:
            break;
    }
    
} 

//saudacao
function saudacao( $nome = '' ) {
    #date_default_timezone_set('America/Manaus');
    $hora =  date('H');
    if( $hora >= 6 and $hora <= 12 ){
        return 'Bom dia' . (empty($nome) ? '' : ', ' . $nome);
    }else if ( $hora > 12 and $hora <=18 ){
        return 'Boa tarde' . (empty($nome) ? '' : ', ' . $nome);
    }else if($hora > 18){
        return 'Boa noite' . (empty($nome) ? '' : ', ' . $nome);
    }

}

//remove acentos e caracteres especiais de uma string
function remove_acentos($string=NULL){
    $procurar    = array('À','Á','Ã','Â','É','Ê','Í','Ó','Õ','Ô','Ú','Ü','Ç','à','á','ã','â','é','ê','í','ó','õ','ô','ú','ü','ç');
    $substituir  = array('A','A','A','A','E','E','I','O','O','O','U','U','C','a','a','a','a','e','e','i','o','o','o','u','u','c');
    return str_replace($procurar, $substituir, $string);
}

//seta um registro na tabela de auditoria
function auditoria($operacao, $obs='', $query=TRUE){
    $CI =& get_instance();
    $CI->load->library('session');
    $CI->load->model('auditoria_model', 'auditoria');
    if ($query):
            $last_query = $CI->db->last_query();
    else:
            $last_query = '';
    endif;
    if (esta_logado(FALSE)):
            $user_id = $CI->session->userdata('user_id');
            $uni_id = $CI->session->userdata('user_unidade');
        //    $user_login = $CI->usuarios->get_byid($user_id)->row()->login;
    else:
            $user_id = 'Desconhecido';
    endif;
    $dados = array(
            'aud_operacao' => $operacao,
            'aud_query' => $last_query,
            'aud_obs' => $obs,   
            'aud_operacao' => $operacao,
            'usu_id' => $user_id,
            'uni_id' => $uni_id
    );
    $CI->auditoria->do_insert($dados);
}

function formata_data($data,$tipo){
    switch ($tipo) {
        case 'br': return date('d/m/Y',strtotime(implode("-",array_reverse(explode("/",$data)))));  break;
        case 'en': return date('Y/d/m',strtotime(implode("-",array_reverse(explode("/",$data)))));  break;
        default:
            break;
    }
}

function dataextenso($data) {
    $data = explode("-",$data);

    $dia = $data[2];
    $mes = $data[1];
    $ano = $data[0];

    switch ($mes){

    case 1: $mes = "JANEIRO"; break;
    case 2: $mes = "FEVEREIRO"; break;
    case 3: $mes = "MARÇO"; break;
    case 4: $mes = "ABRIL"; break;
    case 5: $mes = "MAIO"; break;
    case 6: $mes = "JUNHO"; break;
    case 7: $mes = "JULHO"; break;
    case 8: $mes = "AGOSTO"; break;
    case 9: $mes = "SETEMBRO"; break;
    case 10: $mes = "OUTUBRO"; break;
    case 11: $mes = "NOVEMBRO"; break;
    case 12: $mes = "DEZEMBRO"; break;

    }

    $mes=strtolower($mes);
    return ("$dia de $mes de $ano");
}

function mes_extenso($referencia = NULL){
    switch ($referencia){
        case 1: $mes = "Janeiro"; break;
        case 2: $mes = "Fevereiro"; break;
        case 3: $mes = "Março"; break;
        case 4: $mes = "Abril"; break;
        case 5: $mes = "Maio"; break;
        case 6: $mes = "Junho"; break;
        case 7: $mes = "Julho"; break;
        case 8: $mes = "Agosto"; break;
        case 9: $mes = "Setembro"; break;
        case 10: $mes = "Outubro"; break;
        case 11: $mes = "Novembro"; break;
        case 12: $mes = "Dezembro"; break;
    }
    return $mes;
}

