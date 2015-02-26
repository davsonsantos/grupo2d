<?php $this->load->view('admin/layout/header'); 
error_reporting(0);
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"> </script>


<section id="content" class="container">

    <header class="p-header">
        <h2 class="p-title"><?= $titulo ?></h2>
    </header>
        <div class="c-block" id="required">
            <div id="load" class=""><img src="<?= GD_IMG ?>media-player/loading.gif"/></div>
            <div id="msg"></div>
            <form class="form-validation-1" method="post" name="cad_usuario" id="cad_usuario" action="">
                <input type="hidden" name="acao" value="<?= $acao ?>">
                <input type="hidden" name="id" value="<?= @$id ?>">
                <div class="c-block" id="basic">
                    <div class="form-group">
                        <label for="Nome">Nome</label> <span class="text-danger">*</span>
                        <input type="text" class="form-control validate[required]" name="usu_nome" id="usu_nome" placeholder="Nome do Usuário" value="<?= $dados->usu_nome ?>">
                    </div>
                </div>
                
                <div class="c-block" id="basic">
                    <div class="form-group">
                        <label for="Login">Login</label> <span class="text-danger">*</span>
                        <input type="text" class="form-control validate[required]" name="usu_login" id="usu_login" placeholder="Login de Acesso" value="<?= $dados->usu_login ?>">
                    </div>
                </div>
                
                <div class="c-block" id="basic">
                    <div class="form-group">
                        <label for="Email">Email</label> <span class="text-danger">*</span>
                        <input type="text" class="form-control validate[required,custom[email]]" name="usu_email" id="usu_email" placeholder="Email" value="<?= $dados->usu_email ?>">
                    </div>
                </div>
                
                <?php if($acao != 'editar'){ ?>
                <div class="c-block" id="basic">
                    <div class="form-group">
                        <label for="Senha">Senha</label> <span class="text-danger">*</span>
                        <input type="password" class="form-control validate[required]" name="usu_senha" id="usu_senha" placeholder="Senha" value="<?= $dados->usu_senha ?>">
                    </div>
                </div>
                
                <div class="c-block" id="basic">
                    <div class="form-group">
                        <label for="confSenha">Confirmar Senha</label> <span class="text-danger">*</span>
                        <input type="password" class="form-control validate[required,equals[usu_senha]]" name="confSenha" id="confSenha" placeholder="Senha" value="<?= $dados->usu_senha ?>">
                    </div>
                </div>
                <?php } ?>
                
                <div class="c-block" id="basic">
                    <div class="form-group">
                        <label for="Status">Status</label> <span class="text-danger">*</span>
                        <div id="check" class="c-block">
                            <div class="radio">
                                <label>
                                    <input type="radio" value="1" <?php if($dados->usu_ativo == 1) echo "checked";?> id="ativo" name="usu_ativo" class="validate[required]">
                                  Ativo
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                  <input type="radio" value="0" <?php if($dados->usu_ativo == 0) echo "checked";?> id="inativo" name="usu_ativo" class="validate[required]">
                                  Inativo
                                </label>
                            </div> 
                        </div>
                    </div>
                </div>
                <button type="submit" onsubmit="salvar();" id="salvar" class="btn btn-sm btn-<?= $cor ?>" value="<?= $botao ?>"><span class="icon-plus"></span> <?= $botao ?></button>
                <a href="<?=GD_RAIZ?>permissao/usuarios" class="btn btn-info btn-sm btn-danger"><span class="icon-undo-2"></span> Cancelar</a>
                
                
            </form>
        </div>
</section>

<script type="text/javascript">
$(document).ready(function(){
    $('#errolog').hide();
    $('#load').hide();
    jQuery('#cad_usuario').submit(function(){	
        if ($("#cad_usuario").validationEngine('validate')) {
            $('#load').show();
            var dados = jQuery( this ).serialize();
            jQuery.ajax({
                type: "POST",
                url: "<?=GD_RAIZ?>permissao/confirmar_usuario",
                data: dados,
                success: function(data){
                    if(data==1){
                        $('#msg').html('<div id="msg" class="alert alert-success"> Dados Cadastrados com sucesso. </div>');
                        $('#load').hide();
                        document.getElementById("cad_usuario").reset();
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

