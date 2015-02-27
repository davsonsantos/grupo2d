<?php $this->load->view('admin/layout/header'); 
error_reporting(0);
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"> </script>



<script type="text/javascript">
function marcardesmarcar(){
  jQuery('.marcar').each(
         function(){
           if (jQuery(this).prop( "disabled")){
                jQuery(this).prop("checked", false);
           }else { 
               jQuery(this).prop("checked", true);
            }           
         }
    );
}
</script>

<section id="content" class="container">

    <header class="p-header">
        <h2 class="p-title"><?= $titulo ?></h2>
    </header>
    <div id="load" class=""><img src="<?= GD_IMG ?>media-player/loading.gif"/></div>
    <div id="msg"></div>
    <div class="table-responsive">
        <div class="c-block" id="required">
            <form class="form-validation-1" method="post" name="racesso" id="racesso" action="">
                <input type="hidden" name="id" value="<?= $id ?>">
                <div class="table-responsive">
			        <table class="table table-bordered table-striped" id="example">
			            <thead>
			                <tr style="" class="cor">
			                    <th>ID</th>
			                    <th>Acesso</th>
			                    <th class="text-center">
			                    	<button class='btn btn-xs btn-danger' type='button' id='todos' onclick='marcardesmarcar();'><span class="icon-minus"></span></button>
			                    </th>
			                </tr>
			            </thead>
			            <tbody>
			                <?php foreach ($lista as $l) { ?>
			                    <tr class="gradeX">
			                        <td class="center"><?= $l->mod_id ?></td>
			                        <td><?= $l->mod_descricao ?></td>
			                        <td class="text-center">       
			                            <input type="checkbox" name="opcao[]" value="<?= $l->mod_id ?>" id="opcao" class="marcar"/>
			                        </td>
			                    </tr>
			                <?php } ?>
			            </tbody>
			            <tfoot>
			                <th>
			                <td class="gradeX text-right" colspan="2">
			                        Legenda: <span class="icon-pencil-2" aria-hidden="true"></span> &nbsp;Editar Registro&nbsp;
			                                 <span class="icon-remove-2" aria-hidden="true"></span> &nbsp;Excluir Registro&nbsp;
			                                 <span class="icon-lock" aria-hidden="true"></span> &nbsp;Permissão de Acesso
			                    </td>
			                </th>
			            </tfoot>
			        </table>
			    </div>
                
                <button type="submit" onsubmit="salvar();" id="salvar" class="btn btn-sm btn-<?= $cor ?>" value="<?= $botao ?>"><span class="icon-plus"></span> <?= $botao ?></button>
                <a href="<?=GD_RAIZ?>permissao/usuarios" class="btn btn-info btn-sm btn-danger"><span class="icon-undo-2"></span> Cancelar</a>
                
                
            </form>
        </div>
    </div>
</section>

<script type="text/javascript">
$(document).ready(function(){
    $('#errolog').hide();
    $('#load').hide();
    jQuery('#racesso').submit(function(){	
        if ($("#racesso").validationEngine('validate')) {
            $('#load').show();
            var dados = jQuery( this ).serialize();
            jQuery.ajax({
                type: "POST",
                url: "<?=GD_RAIZ?>permissao/confirmar_remover_acesso",
                data: dados,
                success: function(data){ alert(data);
                    if(data==1){ 
                        $('#msg').html('<div id="msg" class="alert alert-warning"> Nem todas os acessos selecionadas foram deletados. </div>');
                        $('#load').hide();
                        location.reload(); 
                    }else if(data == 2){
                        $('#msg').html('<div id="msg" class="alert alert-danger"> Erro ao excluir as permissões. </div>');
                        location.reload(); 
                    }else if(data == 3){
                        $('#msg').html('<div id="msg" class="alert alert-success"> Acessos removidos com sucesso. </div>');
                        location.reload(); 
                	} 

                } 
            }) 
        };
        return false;
    });
})
</script>





<?php $this->load->view('admin/layout/footer'); ?>

