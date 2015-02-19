<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//inicializar o painel adm carregando os recursos necessarios
function enviar_email_site($dados) {
    $CI =& get_instance();
//    $config = array(
//                    'protocol' => 'sendmail',
//                    'mailpath' => '/usr/sbin/sendmail',
//                    'charset' => 'UTF-8',
//                    'wordwrap' => TRUE,
//                    'newline' => "\r\n",
//                   );
    $CI->load->library('email');
    $CI->email->set_newline("\r\n");
    $CI->email->from($dados['email'], $dados['nome']);
    $CI->email->to('davsonsantos@gmail.com');
    $CI->email->subject($dados['assunto']);
    if($dados['anexo']){
        $CI->email->attach($dados['anexo']);
    }
    $CI->email->message(
                            "Nome: " . $dados['nome'] . "\n\n" .
                            "Email: " . $dados['email'] . "\n\n" .
                            "Assunto: " . $dados['assunto'] . "\n\n" .
                            "Mensagem: " . $dados['msg'] . "\n"
                        );
    if ($CI->email->send()){
        return true;
    }else{
        return false;
    }
}

