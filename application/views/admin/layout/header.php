<!DOCTYPE html>
<html>
    
<!-- Mirrored from 192.185.228.226/projects/black-pearl/Template/profile-page.html by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 21 Jan 2015 14:23:48 GMT -->
<head>
        <title><?=GD_TITULO?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Black Pearl Responsive Admin Template">
        <meta name="keywords" content="Black Pearl, Admin, Template, Bootstrap">
        <meta charset="UTF-8">
       
        <!-- CSS -->
        <link href="<?=GD_CSS?>bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="<?=GD_CSS?>calendar.min.css" rel="stylesheet">
        <link href="<?=GD_CSS?>icomoon.min.css" rel="stylesheet">
        <link href="<?=GD_CSS?>media-player.min.css" rel="stylesheet">
        <link href="<?=GD_CSS?>file-manager.min.css" rel="stylesheet">
        <link href="<?=GD_CSS?>form.min.css" rel="stylesheet">
        <link href="<?=GD_CSS?>style.min.css" rel="stylesheet">
    </head>
    
    <body>
        <!-- Header -->
        <header id="header" class="clearfix">
            <!-- Logo -->
            <a href="<?=GD_RAIZ?>inicio/index" class="logo shadowed">
                    <?=GD_TITULO?>
            </a>
               
            <div class="dropdown profile-menu shadowed">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <img src="<?=GD_IMG?>profile-pics/profile-pic.png" alt="" class="profile-pic">
                </a>
                <ul class="dropdown-menu pull-right text-right">
                    <li><a href="<?=GD_RAIZ?>usuarios/perfil">Atualizar Perfil</a></li>
                    <li><a href="#">Notifications & Updates</a></li>
                    <li><a href="#">Settings</a></li>
                    <li class="divider"></li>
                    <li><a href="<?=GD_RAIZ?>login/logoff">Sair</a></li>
                </ul>
            </div>
            
            <ul class="nav nav-pills pull-right shadowed" id="top-menu">
                <li><a href="#">Home</a></li>
                <li class="dropdown">
                     <a class="dropdown-toggle" data-toggle="dropdown" href="#">Dropdown<b class="caret"></b></a>
                     <ul class="dropdown-menu">
                          <li><a href="#">Action</a></li>
                          <li><a href="#">Another action</a></li>
                          <li><a href="#">Something else here</a></li>
                          <li class="divider"></li>
                          <li><a href="#">Separated link</a></li>
                     </ul>
                </li>
                <li><a href="#">Users</a></li>
            </ul>
            
            <form class="form-inline top-search shadowed">
                <input type="text" class="form-control" placeholder="Search for anything...">
                <button type="submit"><i class="icon-search"></i></button>
            </form>
        </header>
        
        <section id="main" role="main">
            
            
            <!-- Left Sidebar -->
            <aside id="leftbar" class="pull-left">
                <div class="sidebar-container">
                    <?php #$this->load->view('layout/menu'); ?>
                    <?php

                    $this->load->library('Menu');
                    $menu = new Menu;
                    echo $menu->show_menu();
   
                    ?>
                </div>
                <span id="leftbar-toggle" class="visible-xs sidebar-toggle">
                     <i class="icon-angle-right"></i>
                </span>
            </aside>
               
            
            <!-- Right Sidebar -->
            <aside id="rightbar" class="pull-right">
                <div class="sidebar-container">
                    <!-- Date + Clock -->
                    <div class="clock shadowed">
                         <div id="date"></div>
                         <div id="time">
                              <span id="hours"></span>
                              :
                              <span id="min"></span>
                              :
                              <span id="sec"></span>
                         </div>
                    </div>
                    
                    <!-- Calendar -->
                    <div class="shadowed side-calendar">
                         <div id="sidebar-calendar"></div>
                    </div>
                    
                    <!-- Form -->
                    <div class="shadowed side-form">
                        <h3 class="title">Mensagem Rápida</h3>
                        <form id="side-form" action="">
                            <div class="form-group">
<!--                                <input type="text" class="input-sm form-control" placeholder="Name">-->
                                <select class="input-sm form-control" required="">
                                    <option>Lista de Usuários</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="email" class="input-sm form-control " placeholder="Email Address" required="">
                            </div>

                            <div class="form-group">    
                                 <textarea class="input-sm form-control" required=""></textarea>
                            </div>

                            <input type="submit" class="btn btn-warning btn-block btn-xs" value="ENVIAR">
                        </form>
                    </div>
                </div>

                <span id="rightbar-toggle" class="hidden-lg sidebar-toggle">
                     <i class="icon-angle-left"></i>
                </span>
            </aside>
        
            
        </section>