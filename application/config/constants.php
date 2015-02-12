<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',                            'rb');
define('FOPEN_READ_WRITE',                      'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',        'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',   'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',                    'ab');
define('FOPEN_READ_WRITE_CREATE',               'a+b');
define('FOPEN_WRITE_CREATE_STRICT',             'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',        'x+b');

/*
 * constante de sistema
 */
define('MODAL_LOAD','<div class="progress progress-striped active"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="50" style="width:100%"> Carregando Dados...</div></div>');


//CONSTANTES DO SITE
define('SITE_TITULO', 'Portifólio Grupo 2D'); // define o título das páginas
define('SITE_RODAPE', '<p>&copy 2014/'.date('Y').' | Todos os direitos reservados ao Grupo 2D');
define('SITE_RAIZ', 'http://'.$_SERVER['HTTP_HOST'].'/grupo2d/'); // define o título das páginas
define('SITE_CSS', 'http://'.$_SERVER['HTTP_HOST'].'/grupo2d/assets/site/css/'); // define o caminho para as paginas de stylo .css
define('SITE_BOOT', 'http://'.$_SERVER['HTTP_HOST'].'/grupo2d/assets/site/bootstrap/'); // define o caminho para as paginas de stylo .css
define('SITE_JS', 'http://'.$_SERVER['HTTP_HOST'].'/grupo2d/assets/site/js/'); // define o caminho para as paginas javascript .js
define('SITE_IMG', 'http://'.$_SERVER['HTTP_HOST'].'/grupo2d/assets/site/images/'); // define o caminho para as paginas de images
define('SITE_FONTE', 'http://'.$_SERVER['HTTP_HOST'].'/grupo2d/assets/site/fonts/'); // define o caminho para as paginas de stylo .css
define('SITE_ARQUIVO', 'http://'.$_SERVER['HTTP_HOST'].'/grupo2d/application/upload/');


//CONSTANTES DO ADMINTRATIVO
define('GD_RODAPE', '<p>&copy 2014/'.date('Y').' | Todos os direitos reservados ao Grupo 2D');
define('GD_TITULO', 'Admnistrativo');
define('GD_RAIZ', 'http://'.$_SERVER['HTTP_HOST'].'/grupo2d/admin/');
define('GD_CSS', 'http://'.$_SERVER['HTTP_HOST'].'/grupo2d/assets/admin/css/');
define('GD_JS', 'http://'.$_SERVER['HTTP_HOST'].'/grupo2d/assets/admin/js/');
define('GD_IMG', 'http://'.$_SERVER['HTTP_HOST'].'/grupo2d/assets/admin/img/');
define('GD_FONTS', 'http://'.$_SERVER['HTTP_HOST'].'/grupo2d/assets/admin/fonts/');
define('GD_MEDIA', 'http://'.$_SERVER['HTTP_HOST'].'/grupo2d/assets/admin/media/');
/* End of file constants.php */
/* Location: ./application/config/constants.php */