<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/* FUNCAO DE UPLOAD DE IMAGEM COM CRIACAO DE UM THUMB
 * PARAMENTROS
 *  path = caminho do upload
 *  img = imagem para redimensionar
 *  width = comprimento da imagem
 *  heidth = largura da imagem
 *  ratio = manter proporcao true/false
 *  thumb = criar ou nao um thumbnail
 */
function upload_imagem($arquivo, $dados) {
	$CI = &get_instance();

	$caminho = '' . $_SERVER['DOCUMENT_ROOT'] . '/grupo2d/assets/upload/' . $dados['diretorio'] . '/';
	$thumb = $caminho . 'thumb/';
	//cria a pasta raiz
	if (is_dir($caminho)) {
		$caminho = '' . $_SERVER['DOCUMENT_ROOT'] . '/grupo2d/assets/upload/' . $dados['diretorio'] . '/';
	} else {
		mkdir($caminho, 0777);
	}
	//cria a pasta thumb dentro da pasta raiz
	if (!is_dir($thumb)) {
		mkdir($thumb, 0777);
	}
	$data['caminho'] = $caminho;
	$data['diretorio'] = $data['caminho'];
	$file = "" . $arquivo . "";
	$config['upload_path'] = $caminho;
	$config['allowed_types'] = 'gif|jpg|png';
	$config['max_size'] = '0';
	$config['max_width'] = '0';
	$config['max_height'] = '0';
	$config['encrypt_name'] = true;

	$CI -> load -> library('upload', $config);
	$CI -> upload -> initialize($config);

	if (!$CI -> upload -> do_upload($file)) {
		$error = array('error' => $CI -> upload -> display_errors());
		return false;
	} else {
		$image = $CI -> upload -> data();
		$anexo = $image['raw_name'] . $image['file_ext'];
		$dados = array('path' => $caminho, 'img' => $anexo, 'width' => $dados['w'], 'heigth' => $dados['h'], 'ratio' => $dados['ratio']);
		thumbnail($dados);

		return $anexo;
	}
}

function thumbnail($dados) {
	$CI = &get_instance();
	$config['image_library'] = 'gd2';
	$config['source_image'] = $dados['path'] . $dados['img'];
	$config['new_image'] = $dados['path'] . "thumb/" . $dados['img'];
	$config['create_thumb'] = TRUE;
	$config['maintain_ratio'] = $dados['ratio'];
	$config['width'] = $dados['width'];
	$config['height'] = $dados['heigth'];
	$CI -> load -> library('image_lib', $config);
	$image = $CI -> image_lib -> resize();
	return $image;
}

function mult_upload() {
	if (!$_FILES['arquivo']['error'][0]) {
		$errors = array();
		$erro = 0;
		foreach ($_FILES['arquivo']['tmp_name'] as $key => $tmp_name) {
			$file_name = $key . $_FILES['arquivo']['name'][$key];
			$arquivo = explode(".", $file_name);
			$file_name = md5($arquivo[0]) . "." . end($arquivo);
			//	$file_size =$_FILES['arquivo']['size'][$key];
			$file_tmp = $_FILES['arquivo']['tmp_name'][$key];
			//	$file_type=$_FILES['arquivo']['type'][$key];

			$desired_dir = '' . $_SERVER['DOCUMENT_ROOT'] . '/jungle/assets/upload/suites/' . $this -> input -> post('id') . '/';
			if (empty($errors) == true) {
				if (is_dir($desired_dir) == false) {
					mkdir("$desired_dir", 0777);
				}
				if (move_uploaded_file($file_tmp, $desired_dir . "/" . $file_name)) {
					$dados = array('operacao' => 'UIS', 'id_suite' => $this -> input -> post('id'), 'foto' => $file_name);
					$this -> hotel -> sp_hotel($dados);
				} else {
					$erro++;
				}
			}
		}
		if ($erro > 0) {
			set_msg('msg', 'Erro ao realizar o upload.', 'erro');
		} else {
			set_msg('msg', 'Upload realizado com sucesso.', 'sucesso');
		}
		redirect(GS_RAIZ . 'suites/upload_img?id=' . base64_encode($this -> input -> post('id')) . '', 'refresh');
	} else {
		set_msg('msg', 'Selecione uma ou mas imagem para o upload.', 'aviso');
		redirect(GS_RAIZ . 'suites/upload_img?id=' . base64_encode($this -> input -> post('id')) . '', 'refresh');
	}
}
