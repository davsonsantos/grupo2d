<link rel="stylesheet" href="<?= GD_CSS ?>validationEngine.jquery.css">
    
<script src="<?= GD_JS ?>jquery-1.10.2.min.js"></script>
<script src="<?= GD_JS ?>validation/validate.min.js"></script>
<script src="<?= GD_JS ?>validation/validationEngine.min.js"></script>

<script>
    function sair() {
        var url = "<?= GD_RAIZ ?>inicio/index";
        window.location.href = url;
    }
</script>
<script>
    jQuery(document).ready(function(){
        jQuery("#conf_senha").validationEngine();
    });
</script> 
<script>
$(document).ready(function(){
    $('#errolog').hide();
    $('#load').hide();
    jQuery('#conf_senha').submit(function(){	
        if ($("#conf_senha").validationEngine('validate')) {
            $('#load').show();
            var dados = jQuery( this ).serialize();
            jQuery.ajax({
                type: "POST",
                url: "<?= GD_RAIZ ?>login/conf_senha",
                data: dados,
                success: function(data){
                    if(data==1){ 
                 //   var url = window.location.pathname;
                    var pathArray = window.location.pathname.split( '/' );
                    var url = pathArray.lastIndexOf("n"));
                    if(url==4){
                        
                    }
            //$('#modalWider').modal('hide')                       
                    }else{
                        $('#errolog').show();		//Informa o erro
                        $('#load').hide();
                    }
                } 
            }) 
        };
        return false;
    });
})
</script> 
<form action="" id="conf_senha" name="conf_senha" class="login" method="post">
    <div class="modal-dialog modal-narrow">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Confirmação de Senha</h4>
            </div>
            <div class="modal-body">
                <p>Informe seu Login e Senha para poder acessar essa tela</p>
                <div class="c-block" id="basic">
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="password" class="form-control validate[required]" name="senha" id="senha" placeholder="Confirme sua Senha">
                    </div>
                </div>
                <div class="c-block" id="basic">
                    <h1 id="errolog" style="margin: 70px auto 40px;margin-top: 30px;padding: 8px;width: 260px;font: 18px 'Lucida Grande', Arial, sans-serif;color: #FF0000;text-align: center;">Você não tem permissão de acesso!</h1>
                    <h5 id="load" class="text-danger"><img src="<?= GD_IMG ?>media-player/loading.gif"/></h5>
                    <?php echo get_msg('logoffok'); ?>
                    <?php echo get_msg('errologin'); ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit"  class="btn btn-sm closeModal">Confirmar</button>
                <button type="button" class="btn btn-sm closeModal" data-dismiss="modal" onclick="sair()">Cancelar</button>
            </div> 
        </div>
    </div>
</form>