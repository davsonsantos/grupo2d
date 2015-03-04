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
            <form class="form-validation-1" method="post" name="cad_projeto" id="cad_projeto" action="<?=GD_RAIZ?>site/confirmar_projeto" enctype="multipart/form-data" >
                <input type="hidden" name="acao" value="<?= $acao ?>">
                <input type="hidden" name="id" value="<?= $id ?>">
                <?php
                $conf = $dados->por_img;
				$l = explode(".", $dados->por_img);
				$logo = $l[0]."_thumb.".$l[1];
				
                ?>                
                <div class="c-block" id="basic">
                    <div class="form-group">
                        <label for="Sistema">Categoria</label> <span class="text-danger">*</span>
                        <select class="form-control validate[required]" id="cat_projeto_id" name="cat_projeto_id">
                            <option value="">Selecione uma Categoria</option>
                            <?php foreach ($categoria as $c){?>
                            <option <?php if($dados->cat_projeto_id == $c->cat_projeto_id) echo "selected='selected'"; ?> value="<?=$c->cat_projeto_id?>"><?=$c->cat_projeto_descricao?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                        
                <div class="c-block" id="basic">
                    <div class="form-group">
                        <label for="Nome">Nome</label> <span class="text-danger">*</span>
                        <input type="text" class="form-control validate[required]" name="por_nome" id="por_nome" placeholder="Nome do Projeto" value="<?= $dados->por_nome ?>">
                    </div>
                </div>
                
                <div class="c-block" id="basic">
                    <div class="form-group">
                        <label for="Sistema">Desenvolvido por:</label> <span class="text-danger">*</span>
                        <select class="form-control validate[required]" id="par_id" name="par_id">
                            <option value="">Selecione o Parceiro</option>
                            <?php foreach ($parceiro as $p){?>
                            <option <?php if($dados->par_id == $p->par_id) echo "selected='selected'"; ?> value="<?=$p->par_id?>"><?=$p->par_nome?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                
                <div class="c-block" id="basic">
                    <div class="form-group">
                        <label for="Descrição">Descrição</label> <span class="text-danger">*</span>
                        <input type="text" class="form-control validate[required]" name="por_descricao" id="por_descricao" placeholder="Descreva o Projeto" value="<?= $dados->por_descricao?>">
                    </div>
                </div>
                
                <div class="c-block" id="basic">
                    <div class="form-group">
                        <label for="Link">Link</label> <span class="text-danger">*</span>
                        <input type="text" class="form-control" name="por_link" id="por_link" placeholder="Endereço URL" value="<?= $dados->por_descricao?>">
                    </div>
                </div>
                
                <div class="c-block" id="upload">
	                <label for="Icon">Imagem</label> <span class="text-danger">Só informe caso queira mudar</span>   
	                <div class="fileupload fileupload-new" data-provides="fileupload">
	                	
	                    <div class="fileupload-preview thumbnail"><img src="<?=SITE_RAIZ?>assets/upload/portifolio/thumb/<?=$logo?>" alt="370 X 240"></div>
	                    <div>
	                        <span class="btn btn-file btn-sm btn-gr-gray">
	                            <span class="fileupload-new">Selecione a Imagem</span>
	                            <span class="fileupload-exists">Trocar</span>
	                            <input type="file" name="logo" id="logo"/>
	                            <input type="hidden" name="img" id="img" value="<?= $dados->por_img?>"/>
	                        </span>
	                        <a href="#" class="btn fileupload-exists btn-sm btn-gr-gray" data-dismiss="fileupload">Remover</a>
	                    </div>
	                </div>
                </div>
                
                <button type="submit" id="salvar" class="btn btn-sm btn-<?= $cor ?>" value="<?= $botao ?>"><span class="icon-plus"></span> <?= $botao ?></button>
                <a href="<?=GD_RAIZ?>site/portifolio" class="btn btn-info btn-sm btn-danger"><span class="icon-undo-2"></span> Cancelar</a>
                
                
            </form>
        </div>
</section>


<?php $this->load->view('admin/layout/footer'); ?>

