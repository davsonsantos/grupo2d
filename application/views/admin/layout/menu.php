<!--ativa o menu-->
<?php
//verifico a pagina q estou
$end =  $this->uri->rsegment_array();
$ult = array_pop($end);
//inicializo as variaveis
$inicio = "";
$usuario = "";
$base = "";
$personalizar = "";
switch ($ult) {
    case 'index': $inicio = 'active'; break;
    case 'personalizar': $personalizar = 'active'; break;
    case 'base': $base = 'active'; break;

    default:  break;
}
?>
<!-- Main Menu -->
<ul class="side-menu shadowed">
    <li>
        <a href="<?=GD_RAIZ?>inicio/" class="<?=$inicio?>"><i class="icon-home"></i>Inicio</a>
    </li>
<!--    <li>
        <a href="<?=GD_RAIZ?>inicio/base"><i class="icon-quill"></i>Typography</a>
    </li>
    <li>
        <a href="wall.html"><i class="icon-bubbles-4"></i>Social Wall</a>
    </li>
    <li class="submenu">
        <a href="#"><i class="icon-cog"></i>Widgets</a>
        <ul>
            <li><a href="sidebar-widgets.html">Sidebar</a></li>
            <li><a href="content-widgets.html">Content</a></li>
            <li><a href="shortcut-widgets.html">Shortcuts</a></li>
        </ul>
    </li>
    <li class="submenu">
        <a href="#"><i class="icon-table-2"></i>Tables</a>
        <ul>
            <li><a href="tables.html">Normal Tables</a></li>
            <li><a href="data-table.html">Data Table</a></li>
        </ul>
    </li>
    <li class="submenu">
        <a href="#"><i class="icon-copy-2"></i>Forms</a>
        <ul>
            <li><a href="form-elements.html">Basic Form Elements</a></li>
            <li><a href="form-components.html">Form Components</a></li>
            <li><a href="form-examples.html">Form Examples</a></li>
            <li><a href="form-validation.html">Form Validation</a></li>
            <li><a href="form-wizard.html">Form Wizard</a></li>
        </ul>
    </li>
    <li class="submenu">
        <a href="#"><i class="icon-glass"></i>User Interface</a>
        <ul>
            <li><a href="buttons.html">Buttons</a></li>
            <li><a href="labels.html">Labels</a></li>
            <li><a href="images-icons.html">Images & Icons</a></li>
            <li><a href="alerts.html">Alerts</a></li>
            <li><a href="media.html">Media</a></li>
            <li><a href="pagination-breadcrumbs.html">Pagination & Breadcrumbs</a></li>
            <li><a href="components.html">Components</a></li>
            <li><a href="other-components.html">Others</a></li>
        </ul>
    </li>
    <li>
        <a href="charts.html"><i class="icon-bars"></i>Charts</a>
    </li>
    <li>
        <a href="file-manager.html"><i class="icon-folder"></i>File Manager</a>
    </li>
    <li>
        <a href="calendar.html"><i class="icon-calendar"></i>Calendar</a>
    </li>
    <li class="submenu">
        <a href="#"><i class="icon-camera"></i>Photo Gallery</a>
        <ul>
            <li><a href="photo-gallery-default.html">Default Gallery</a></li>
            <li><a href="photo-gallery-sortable.html">Sortable Gallery</a></li>

        </ul>
    </li>-->
    <li class="submenu open">
        <a class="<?=$usuario?>" href="#"><i class="icon-users"></i>Usuários</a>
        <ul>
            <li><a href="<?=GD_RAIZ?>inicio/base" class="<?=$base?>">Lista de Usuários</a></li>
            <li><a href="<?=GD_RAIZ?>usuario/index" class="<?=$personalizar?>">Personalizar</a></li>
        </ul>
    </li>
</ul>