<!DOCTYPE html>
<html class=" js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage no-websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients no-cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title><?= SITE_TITULO ?></title>
    <link type="text/css" href="<?= SITE_CSS ?>style.default.css" rel="stylesheet">
</head>

                    <?php
//valida o bacground da página
                    $bg = $this->uri->segment(3);
                    switch ($bg) {
                        case 't_contato':
                            $fundo = "bg1";
                            break;

                        default:
                            $fundo = "mainwrapper";
                            break;
                    }
                    ?>	

                    <body class="<?= $fundo ?>">

                        <div class="mainwrapper">

                            <!-- START OF LEFT PANEL -->
                            <div class="leftpanel">
                                <div class="logopanel">
                                    <a href="<?=SITE_RAIZ?>"><img src="<?=SITE_RAIZ?>assets/upload/configuracao/thumb/<?=$logo?>" alt="<?=$titulo?>"></a>
                                </div>
                                <!--
                                                                <div class="searchpanel">
                                                                        <form action="results.html" method="post">
                                                                                <input name="keyword" placeholder="Search and hit enter..." type="text">
                                                                        </form>
                                                                </div>
                                -->
                                <?php $this->load->view('site/layout/menu'); ?>


                            </div><!--leftpanel-->
                            <!-- END OF LEFT PANEL -->


                            <!--http://demo.themepixels.com/webpage/sartana/index.html-->




