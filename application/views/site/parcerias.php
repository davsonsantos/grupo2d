<?php $this->load->view('site/layout/header'); ?>


<div class="mainpanel fixedpanel animate5 fadeInLeft">
    <div class="headerpanel">
        <div class="headicon">
            <span class="iconfa-group"></span>
        </div>
        <h1>Parceiros</h1>
        <p>
            Uma equipe altamente qualificada para melhor atender as suas necessidades.
        </p>
        <ul class="breadcrumbs">
            <li>
                <a href="<?= SITE_RAIZ ?>">Grupo 2D</a>
                <span>/</span>
            </li>
            <li>
                Parceiros
            </li>
        </ul>
    </div>
    <div class="contentpanel">
	
		<div class="contentpanel parcontent">
	
			<div class="row-fluid ourteampanel">
				<?php foreach ($parceiros as $p){ 
					$l = explode(".", $p->par_img);
			      	$img = $l[0]."_thumb.".$l[1]; 
					?>
			    <div class="span4">
					<div class="teaminfo">
					    <div class="img"><img alt="" src="<?=SITE_RAIZ?>assets/upload/parceiro/thumb/<?=$img?>"></div>
					    <div class="teaminfoinner">
						<h4><?php $nome = explode("-",$p->par_nome); echo $nome[0];?></h4>
						<span class="pos"><?=$p->esp_par_descricao?></span>
						<p><?=$p->par_descricao?></p>
					    </div>
					</div>
					<!-- <ul class="share">
					    <li><a title="Twitter" data-rel="tooltip" href="" class="twitter"></a></li>
					    <li><a title="Facebook" data-rel="tooltip" href="" class="facebook"></a></li>
					    <li><a title="Google Plus" data-rel="tooltip" href="" class="gplus"></a></li>
					    <li><a title="LinkedIn" data-rel="tooltip" href="" class="linkedin"></a></li>
					</ul> -->
	    		</div>
	    		<?php } ?>
			</div>
    	</div>
		<br class="clearfix">
    </div>
</div>

<?php $this->load->view('site/layout/footer'); ?>	