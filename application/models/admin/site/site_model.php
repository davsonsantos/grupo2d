<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Site_model extends CI_Model {
    
    public function upd_configuracao($dados=NULL){
        if ($dados != NULL):
            $this->db->update('tb_configuracao', $dados);
            if ($this->db->affected_rows()>0):
               return true;
            else:
                return false;
            endif;
        endif;
    }
    
    public function dados_conf(){
        $sql = "select * from tb_configuracao";
        return $this->db->query($sql);
    }
    
}