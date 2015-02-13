<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        init_sistema();
    }
    
    public function index(){
        $this->load->view('site/index');
    }
	
	function t_contato(){
		$this->load->view('site/contato');
	}
	
    function error404() { 
        $this->load->view('site/layout/erro404');
    } 
}