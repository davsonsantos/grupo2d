<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu {

    public $tipo;

    function icon($tipo) {
    	$obj = & get_instance();
		$icon = $obj->permissao->get_byNomesistema($tipo)->result();
        return($icon[0]->sis_icon);
    }

    public function show_menu() {
        $obj = & get_instance();
        $obj->load->helper('url');
        $obj->load->library('session');

        //--------------
        // CRIA O MENU
        
        /*modal de confirmacao*/
        $pop_permisao = '<div class="modal fade" id="321321" tabindex="-1" role="dialog" aria-hidden="true" data-remote="'.GD_RAIZ.'usuarios/confirma_senha"></div>';

        
        $menu = '<ul class="side-menu shadowed">';
        $menu  .= '<li class="">'.anchor(GD_RAIZ.'inicio/index','<i class="icon-home"></i><span class="mm-text">Inicio</span>','').'</li>';

        $obj->load->model('admin/seguranca/permissao_model', 'permissao', TRUE);
        $permissao = $obj->permissao->permissao_sistema();
		
        $i = 0;
		if(count($permissao[0]) > 0){
	        foreach ($permissao as $row) {
	            $item = explode(' - ', $row->mod_descricao);
	            $input[$i] = $item[0];
	            if (!empty($item[1]))
	                $mnu[$i] = $item[1];
	            $i = $i + 1;
	        }
			
	        $topico = array_keys(array_flip($input));
	
	        foreach ($topico as $row) {
	             $j = 0;
	            $menu .= '<li class="submenu"><a href="#"><i class="'.$this->icon($row).'"></i>'. $row.'</a>';
	            $menu .= '<ul>';
	            foreach ($permissao as $l) {
	         
	                $parte = explode(' - ', $l->mod_descricao);
	                $item[$j] = $parte[0];
	                $mnu[$j] = $parte[1];
	               
	                if ($row == $item[$j]) {
	                    $menu .= ' <li><a href="'.GD_RAIZ.$l->mod_formulario.'">'. $mnu[$j].'</a></li>';
	                }
	                $j = $j + 1;
	            }
	            $menu .= '</ul>';
	            $menu .= '</li>';
	        }
		}
        
        /*modulo de permissao*/
        // $menu .= '<li class="submenu"><a href="#"><i class="icon-lock"></i>Permissões</a>';
        // $menu .= '<ul>';
            // $menu .= ' <li><a href="'.GD_RAIZ.'permissao/sistema">Cadastrar Sistemas</a></li>';
            // $menu .= ' <li><a href="'.GD_RAIZ.'permissao/modulo">Cadastrar Módulos</a></li>';
			// $menu .= ' <li><a href="'.GD_RAIZ.'permissao/usuarios">Cadastrar Usuários</a></li>';
        // $menu .= '</ul>';
        // $menu .= '</li>';
        // $menu .= '</ul>';
        $menu .= '<li class="">'.anchor(GD_RAIZ.'login/logoff','<i class="icon-exit"></i><span class="mm-text">Sair do Sistema</span>','').'</li>';

        
        
        return $menu;
    }

}

?>
