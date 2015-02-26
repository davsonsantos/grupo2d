<?php $this->load->view('admin/layout/header'); 
error_reporting(0);
?>
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
        <div class="c-block" id="required">
            <form class="form-validation-1" method="post" name="per_usuario" id="per_usuario" action="">
                <input type="hidden" name="id" value="<?= $id ?>">
                <input type="hidden" id="toda_turma" name="toda_turma"/>
                <div class="table-responsive">
			        <table class="table table-bordered table-striped" id="example">
			            <thead>
			                <tr style="" class="cor">
			                    <th>ID</th>
			                    <th>Acesso</th>
			                    <th class="text-center">
			                    	<button class='btn btn-xs btn-info' type='button' id='todos' onclick='marcardesmarcar();'><span class="icon-undo-2"></span></button>
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

