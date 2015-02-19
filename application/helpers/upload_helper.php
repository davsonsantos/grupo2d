<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* FUNCAO DE UPLOAD DE IMAGEM COM CRIACAO DE UM THUMB
 * PARAMENTROS
 *  path = caminho do upload
 *  img = imagem para redimensionar
 *  width = comprimento da imagem
 *  heidth = largura da imagem
 *  ratio = manter proporcao true/false
 */
function upload_imagem($arquivo,$dados){
    
    $CI =& get_instance();
    
    $caminho = ''.$_SERVER['DOCUMENT_ROOT'].'/grupo2d/application/upload/'.$dados['diretorio'].'/';
    $thumb = $caminho.'thumb/';
    //cria a pasta raiz
    if(is_dir($caminho)){
        $caminho = ''.$_SERVER['DOCUMENT_ROOT'].'/grupo2d/application/upload/'.$dados['diretorio'].'/';
    }else{
        mkdir ($caminho, 0777);
    }
    //cria a pasta thumb dentro da pasta raiz
    if(!is_dir($thumb)){
        mkdir ($thumb, 0777);
    }
    $data['caminho'] = $caminho;
    $data['diretorio'] = directory_map($data['caminho']);
    $file = "".$arquivo."";
    $config['upload_path'] = $caminho;
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size']	= '0';
    $config['max_width'] = '0';
    $config['max_height'] = '0';
    $config['encrypt_name']  = true;

    $CI->load->library('upload', $config);
    $CI->upload->initialize($config);

    if ( ! $CI->upload->do_upload($file)){
        $error = array('error' => $CI->upload->display_errors());
        return $error;
    }else{
        $image = $CI->upload->data();
        $anexo =  $image['raw_name'].$image['file_ext'];
        $dados = array('path'=>$caminho,'img'=>$anexo,'width'=>$dados['w'],'heigth'=>$dados['h'],'ratio'=>$dados['ratio']);
		if($dados['thumb'] == true){
        	thumbnail($dados);
		}
        return $anexo;
    }
}


function thumbnail($dados){   
    $CI =& get_instance();
    $config['image_library'] = 'gd2';
    $config['source_image'] = $dados['path'].$dados['img'];
    $config['new_image'] = $dados['path']."thumb/".$dados['img'];
    $config['create_thumb'] = TRUE;
    $config['maintain_ratio'] = $dados['ratio'];
    $config['width'] = $dados['width'];
    $config['height'] = $dados['heigth'];
    $CI->load->library('image_lib', $config);
    $image = $CI->image_lib->resize();
    return $image;
}

