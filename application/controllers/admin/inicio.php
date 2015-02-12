<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        init_sistema();
//        esta_logado();
//        $this->load->model('admin/album_model', 'album');
    }
    
    public function index(){
            $this->load->view('admin/inicio/index');
    }
    
    public function base(){
            $this->load->view('admin/inicio/teste');
    }
    
    function error404() { 
        $this->load->view('admin/layout/erro404');
    } 
}

/* End of file welcome.php */
/* Location: ./application/controllers/inicio.php */
/*projeto Aptana com GIT*/
