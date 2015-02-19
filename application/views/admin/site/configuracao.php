<?php $this->load->view('admin/layout/header'); ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"> </script>


<section id="content" class="container">

    <header class="p-header">
        <h2 class="p-title"><?= $titulo ?></h2>
    </header>
        <div class="c-block" id="required">
            <?php echo get_msg('msg') ?>
            <form class="form-validation-1" method="post" name="cad_conf" id="cad_conf" action="<?=GD_RAIZ?>site/upd_configuracao" enctype="multipart/form-data">
                <div class="c-block" id="basic">
                    <div class="form-group">
                        <label for="titulo">Titulo Site</label> <span class="text-danger">*</span>
                        <input type="text" class="form-control" name="site_titulo" id="site_titulo" placeholder="Titulo do Site" value="<?=$titulo_site?>">
                    </div>
                </div>
                <div class="c-block" id="upload">
	                <label for="Icon">Logomarca</label> <span class="text-danger">Só informe caso queira mudar</span>   
	                <div class="fileupload fileupload-new" data-provides="fileupload">
	                	
	                    <div class="fileupload-preview thumbnail"><img src="<?=SITE_RAIZ?>assets/upload/configuracao/thumb/<?=$logo?>" alt="<?=$titulo?>"></div>
	                    <div>
	                        <span class="btn btn-file btn-sm btn-gr-gray">
	                            <span class="fileupload-new">Selecione a Imagem</span>
	                            <span class="fileupload-exists">Trocar</span>
	                            <input type="file" name="logo" id="logo" />
	                        </span>
	                        <a href="#" class="btn fileupload-exists btn-sm btn-gr-gray" data-dismiss="fileupload">Remover</a>
	                    </div>
	                </div>
                </div>
                <button type="submit" id="salvar" class="btn btn-sm btn-success" value="Confirmar"><span class="icon-plus"></span> Confirmar</button>
                <a href="<?=GD_RAIZ?>inicio/index" class="btn btn-info btn-sm btn-danger"><span class="icon-undo-2"></span> Cancelar</a>
                
                
            </form>
        </div>
</section>

<!-- <script type="text/javascript">
$(document).ready(function(){
    $('#errolog').hide();
    $('#load').hide();
    jQuery('#cad_conf').submit(function(){	
        if ($("#cad_conf").validationEngine('validate')) {
            $('#load').show();
            var dados = jQuery( this ).serialize();
            jQuery.ajax({
                type: "POST",
                contentType:attr( "enctype", "multipart/form-data" ),
                url: "<?=GD_RAIZ?>site/upd_configuracao",
                data: dados,
                success: function(data){
                    if(data==1){
                        $('#msg').html('<div id="msg" class="alert alert-success"> Dados Cadastrados com sucesso. </div>');
                        $('#load').hide();
                        document.getElementById("cad_sistema").reset();
                    }else{
                         $('#msg').html('<div id="msg" class="alert alert-danger"> Erro ao cadastrar o registro. </div>');
                        $('#load').hide();
                    }
                } 
            }) 
        };
        return false;
    });
})
</script> -->
<?php $this->load->view('admin/layout/footer'); ?>

