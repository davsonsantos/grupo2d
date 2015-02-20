<?php $this -> load -> view('site/layout/header'); ?>

<!-- START OF MAIN PANEL -->
<div class="mainpanel animate5 fadeInDown">
	<div class="headerpanel">
		<div class="headicon">
			<span class="iconfa-home"></span>
		</div>
		<h1 class="longheadtitle"><?=$titulo?></h1>
		<p>
			Conheça aqui todo meu trabalho na área de desenvolvimento web, assessoria em informática entre outros serviços.
		</p>
	</div><!--headerpanel-->

	<div class="contentpanel padding0">
		<div id="homepanel" class="homepanel">
			
			<?php 
			  for ($i=0; count($projetos) > $i; $i++) {
			  $l = explode(".", $projetos[$i]->por_img);
		      $img = $l[0]."_thumb.".$l[1]; 
			?>
			<div class="item animate0 bounceInUp">
				<div class="img">
					<img src="<?=SITE_RAIZ?>assets/upload/portifolio/thumb/<?=$img?>" alt="">
				</div>
				<a href="<?=SITE_RAIZ?>site/inicio/detalhe?item=<?=$projetos[$i]->por_id?>" class="itemview">
					<div style="display: none;" class="itemcontent">
						<div class="inner">
							<p class="cat">
								<?=$projetos[$i]->cat_projeto_descricao?>
							</p>
							<h3><?=$projetos[$i]->por_nome?>	</h3>
							<p class="desc">
								<?=$projetos[$i]->por_descricao?>
							</p>
						</div>
					</div> 
				</a>
				<div style="display: none;" class="itemmeta">
					<ul class="im-inner">
						<!-- <li class="left">
							<i class="iconfa-eye-open"></i> 1,000
						</li>
						<li class="left">
							<a href="" data-rel="tooltip" data-original-title="Click to Like"><i class="iconfa-heart"></i></a> 245,000
						</li>
						<li>
							<a href="" data-rel="tooltip" data-original-title="Share"><i class="iconfa-facebook"></i></a>
						</li>
						<li>
							<a href="" data-rel="tooltip" data-original-title="Tweet"><i class="iconfa-twitter"></i></a>
						</li>
						<li>
							<a href="" data-rel="tooltip" data-original-title="Share"><i class="iconfa-google-plus"></i></a>
						</li> -->
					</ul>
				</div>
			</div>
			<?php } ?>
			
		</div>
	</div>
</div><!--mainpanel-->
<!-- END OF MAIN PANEL -->

<?php $this -> load -> view('site/layout/footer'); ?>