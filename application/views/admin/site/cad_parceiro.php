<?php $this->load->view('admin/layout/header'); 
error_reporting (0)
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"> </script>


<section id="content" class="container">

    <header class="p-header">
        <h2 class="p-title"><?= $titulo ?></h2>
    </header>
        <div class="c-block" id="required">
			<?php echo get_msg('msg') ?>
            <form class="form-validation-1" method="post" name="cad_projeto" id="cad_projeto" action="<?=GD_RAIZ?>site/confirmar_parceiro" enctype="multipart/form-data" >
                <input type="hidden" name="acao" value="<?= $acao ?>">
                <input type="hidden" name="id" value="<?= $id ?>">
                <?php
				$l = explode(".", $dados->par_img);
				$logo = $l[0]."_thumb.".$l[1];
                ?>                
                                        
                <div class="c-block" id="basic">
                    <div class="form-group">
                        <label for="Nome">Nome</label> <span class="text-danger">*</span>
                        <input type="text" class="form-control validate[required]" name="par_nome" id="par_nome" placeholder="Nome do Parceiro" value="<?= $dados->par_nome ?>">
                    </div>
                </div>
                
                <div class="c-block" id="basic">
                    <div class="form-group">
                        <label for="Descrição">Descrição</label> <span class="text-danger">*</span>
                        <input type="text" class="form-control validate[required]" name="par_descricao" id="par_descricao" placeholder="Informações do Parceiro" value="<?= $dados->par_descricao?>">
                    </div>
                </div>
                
                <div class="c-block" id="basic">
                    <div class="form-group">
                        <label for="Especilaidade">Especialidade</label> <span class="text-danger">*</span>
                        <select class="form-control validate[required]" id="esp_par_id" name="esp_par_id">
                            <option value="">Selecione a Especialidade</option>
                            <?php foreach ($especialidade as $e){?>
                            <option <?php if($dados->esp_par_id == $e->esp_par_id) echo "selected='selected'"; ?> value="<?=$e->esp_par_id?>"><?=$e->esp_par_descricao?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                        
                                
                <div class="c-block" id="upload">
	                <label for="Icon">Imagem</label> <span class="text-danger">Só informe caso queira mudar</span>   
	                <div class="fileupload fileupload-new" data-provides="fileupload">
	                	
	                    <div class="fileupload-preview thumbnail"><img src="<?=SITE_RAIZ?>assets/upload/parceiro/thumb/<?=$logo?>" alt="370 X 240"></div>
	                    <div>
	                        <span class="btn btn-file btn-sm btn-gr-gray">
	                            <span class="fileupload-new">Selecione a Imagem</span>
	                            <span class="fileupload-exists">Trocar</span>
	                            <input type="file" name="logo" id="logo"/>
	                            <input type="hidden" name="img" id="img" value="<?= $dados->par_img?>"/>
	                        </span>
	                        <a href="#" class="btn fileupload-exists btn-sm btn-gr-gray" data-dismiss="fileupload">Remover</a>
	                    </div>
	                </div>
                </div>
                
                <button type="submit" id="salvar" class="btn btn-sm btn-<?= $cor ?>" value="<?= $botao ?>"><span class="icon-plus"></span> <?= $botao ?></button>
                <a href="<?=GD_RAIZ?>site/parceiros" class="btn btn-info btn-sm btn-danger"><span class="icon-undo-2"></span> Cancelar</a>
                
                
            </form>
        </div>
</section>


<?php $this->load->view('admin/layout/footer'); ?>

