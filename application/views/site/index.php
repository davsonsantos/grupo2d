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
			<div class="item animate0 bounceInUp">
				<div class="img"><img src="<?=SITE_IMG ?>photos/1.png" alt=""></div>
				<a href="ajax/gridphoto.php?item=1" class="itemview">
					<div style="display: none;" class="itemcontent">
						<div class="inner">
							<p class="cat">
								Nome do Projeto
							</p>
							<h3>Categoria</h3>
							<p class="desc">
								Descrição
							</p>
						</div>
					</div> 
				</a>
				<div style="display: none;" class="itemmeta">
					<ul class="im-inner">
						<li class="left">
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
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div><!--mainpanel-->
<!-- END OF MAIN PANEL -->

<?php $this -> load -> view('site/layout/footer'); ?>