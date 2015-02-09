<?php $this->load->view('admin/layout/header'); 
error_reporting (0)
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"> </script>


<section id="content" class="container">

    <header class="p-header">
        <h2 class="p-title"><?= $titulo ?></h2>
    </header>
        <div class="c-block" id="required">
            <div id="load" class=""><img src="<?= GD_IMG ?>media-player/loading.gif"/></div>
            <div id="msg"></div>
            <form class="form-validation-1" method="post" name="cad_modulo" id="cad_modulo" action="">
                <input type="hidden" name="acao" value="<?= $acao ?>">
                <input type="hidden" name="id" value="<?= $id ?>">
                
                
                <div class="c-block" id="basic">
                    <div class="form-group">
                        <label for="Sistema">Sistema</label> <span class="text-danger">*</span>
                        <select class="form-control validate[required]" id="sis_id" name="sis_id">
                            <option value="">Selecione um Sistema</option>
                            <?php foreach ($sistema as $s){?>
                            <option <?php if($dados->sis_id == $s->sis_id) echo "selected"; ?> value="<?=$s->sis_id?>;<?=$s->sis_nome?>"><?=$s->sis_nome?> - <?=$s->sis_descricao?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                        
                        
                <div class="c-block" id="basic">
                    <div class="form-group">
                        <label for="Descricao">Nome</label> <span class="text-danger">*</span>
                        <?php $des = explode("-", $dados->mod_descricao);
                              $descricao = $des[1];
                        ?>
                        <input type="text" class="form-control validate[required]" name="mod_descricao" id="mod_descricao" placeholder="Nome do Módulo" value="<?= trim($descricao) ?>">
                    </div>
                </div>
                
                <div class="c-block" id="basic">
                    <div class="form-group">
                        <label for="Formulario">Formulário</label> <span class="text-danger">*</span>
                        <input type="text" class="form-control validate[required]" name="mod_formulario" id="mod_formulario" placeholder="Formulário de Chamada" value="<?= $dados->mod_formulario ?>">
                    </div>
                </div>
                
                <div class="c-block" id="basic">
                    <div class="form-group">
                        <label for="Status">Status</label> <span class="text-danger">*</span>
                        <div id="check" class="c-block">
                            <div class="radio">
                                <label>
                                    <input type="radio" value="S" <?php if($dados->mod_ativo == 'S') echo "checked";?> id="ativo" name="mod_ativo" class="validate[required]">
                                  Ativo
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                  <input type="radio" value="N" <?php if($dados->mod_ativo == 'N') echo "checked";?> id="inativo" name="mod_ativo" class="validate[required]">
                                  Inativo
                                </label>
                            </div> 
                        </div>
                    </div>
                </div>
                <button type="submit" onsubmit="salvar();" id="salvar" class="btn btn-sm btn-<?= $cor ?>" value="<?= $botao ?>"><span class="icon-plus"></span> <?= $botao ?></button>
                <a href="<?=GD_RAIZ?>permissao/modulo" class="btn btn-info btn-sm btn-danger"><span class="icon-undo-2"></span> Cancelar</a>
                
                
            </form>
        </div>
</section>

<script type="text/javascript">
$(document).ready(function(){
    $('#errolog').hide();
    $('#load').hide();
    jQuery('#cad_modulo').submit(function(){	
        if ($("#cad_modulo").validationEngine('validate')) {
            $('#load').show();
            var dados = jQuery( this ).serialize();
            jQuery.ajax({
                type: "POST",
                url: "<?=GD_RAIZ?>permissao/confirmar_modulo",
                data: dados,
                success: function(data){
                    if(data==1){
                        $('#msg').html('<div id="msg" class="alert alert-success"> Dados Cadastrados com sucesso. </div>');
                        $('#load').hide();
                        document.getElementById("cad_modulo").reset();
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

