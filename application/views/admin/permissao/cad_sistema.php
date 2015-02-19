<?php $this->load->view('admin/layout/header'); ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"> </script>


<section id="content" class="container">

    <header class="p-header">
        <h2 class="p-title"><?= $titulo ?></h2>
    </header>
        <div class="c-block" id="required">
            <div id="load" class=""><img src="<?= GD_IMG ?>media-player/loading.gif"/></div>
            <div id="msg"></div>
            <form class="form-validation-1" method="post" name="cad_sistema" id="cad_sistema" action="">
                <input type="hidden" name="acao" value="<?= $acao ?>">
                <input type="hidden" name="id" value="<?= @$id ?>">
                <div class="c-block" id="basic">
                    <div class="form-group">
                        <label for="Nome">Nome</label> <span class="text-danger">*</span>
                        <input type="text" class="form-control validate[required]" name="sis_nome" id="sis_nome" placeholder="Nome do Sistema" value="<?= @$dados->sis_nome ?>">
                    </div>
                </div>
                
                <div class="c-block" id="basic">
                    <div class="form-group">
                        <label for="Descricao">Descrição</label> <span class="text-danger">*</span>
                        <input type="text" class="form-control validate[required]" name="sis_descricao" id="sis_descricao" placeholder="Nome do Sistema" value="<?= @$dados->sis_descricao ?>">
                    </div>
                </div>
                
                <div class="c-block" id="basic">
                    <div class="form-group">
                        <label for="Icon">Icon</label> <span class="text-danger">*</span>                        
                        <select class="select" name="sis_icon" id="sis_icon">
                        	<option value="">Selecione um Ícone</option>
	                        <?php foreach ($icon as $i) { ?>
	                          <option <?php if($i->icon_nome == $dados->sis_icon) echo "selected"; ?> value="<?=trim($i->icon_nome)?>" data-icon="<?=trim($i->icon_nome)?>"> <?=$i->icon_nome?></option>    
	                        <?php } ?>
                        </select>
                    </div>
                </div>
                
                <div class="c-block" id="basic">
                    <div class="form-group">
                        <label for="Status">Status</label> <span class="text-danger">*</span>
                        <div id="check" class="c-block">
                            <div class="radio">
                                <label>
                                    <input type="radio" value="S" <?php if(@$dados->sis_ativo == 'S') echo "checked";?> id="ativo" name="sis_ativo" class="validate[required]">
                                  Ativo
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                  <input type="radio" value="N" <?php if(@$dados->sis_ativo == 'N') echo "checked";?> id="inativo" name="sis_ativo" class="validate[required]">
                                  Inativo
                                </label>
                            </div> 
                        </div>
                    </div>
                </div>
                <button type="submit" onsubmit="salvar();" id="salvar" class="btn btn-sm btn-<?= $cor ?>" value="<?= $botao ?>"><span class="icon-plus"></span> <?= $botao ?></button>
                <a href="<?=GD_RAIZ?>permissao/sistema" class="btn btn-info btn-sm btn-danger"><span class="icon-undo-2"></span> Cancelar</a>
                
                
            </form>
        </div>
</section>

<script type="text/javascript">
$(document).ready(function(){
    $('#errolog').hide();
    $('#load').hide();
    jQuery('#cad_sistema').submit(function(){	
        if ($("#cad_sistema").validationEngine('validate')) {
            $('#load').show();
            var dados = jQuery( this ).serialize();
            jQuery.ajax({
                type: "POST",
                url: "<?=GD_RAIZ?>permissao/confirmar_sistema",
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
</script>
<?php $this->load->view('admin/layout/footer'); ?>

