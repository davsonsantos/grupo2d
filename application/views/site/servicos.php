<?php $this -> load -> view('site/layout/header'); ?>

<div class="mainpanel fixedpanel animate5 fadeInLeft">
	<div class="headerpanel">
		<div class="headicon">
			<span class="iconfa-star"></span>
		</div>
		<h1>Produtos e Serviços</h1>
		<p>
			Serviços e produtos de qualidade para solucionar e administrar todo o seu negócio
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
	
	<div class="contentpanel parcontent">
		<div class="pricingpanel">
			<div class="plan">
				<div class="plan-head">
					<h3>Desenvolvimento</h3>
				</div>
				<ul class="pricinglist">
					<li>Sistemas WEB</li>
					<li>Sistemas Mobile</li>
					<li>Sistemas offline</li>
					<li>Criação de Site/Blog</li>
					<li>Lojas Virtuais</li>
				</ul>
				<div class="signup">
					<a class="btn" href="<?=SITE_RAIZ?>site/inicio/t_contato">
							Socilite um orçamento
						</a>
				</div>
			</div><!--plan-->

				<div class="plan">
					<div class="plan-head">
						<h3>Arte Gráfica</h3>
					</div>
					<ul class="pricinglist">
						<li>Criação de Logo</li>
						<li>Criação Folders</li>
						<li>Criação Fly</li>
						<li>Cartões de Visita</li>
						<li>Artes para WEB</li>
					</ul>
					<div class="signup">
						<a class="btn" href="<?=SITE_RAIZ?>site/inicio/t_contato">
							Socilite um orçamento
						</a>
					</div>
				</div><!--plan-->

				<div class="plan">
					<div class="plan-head">
						<h3>Infraestrutura</h3>
					</div>
					<ul class="pricinglist">
						<li>Montagem, instalação, configuração e manutenção de computadores / notebook</li>
						<li>Manutenção preventiva e corretiva</li>
						<li>Instalação e configuração de hardware e software</li>
						<li>Instalação e configuração de redes cabeada e sem fio</li>
						<li>Cabeamento estruturado</li>
						<li>Recuperação de arquivos</li>
					</ul>
					<div class="signup">
						<a class="btn" href="<?=SITE_RAIZ?>site/inicio/t_contato">
							Socilite um orçamento
						</a>
					</div>
				</div><!--plan-->

				<div class="plan">
					<div class="plan-head">
						<h3>Produtos</h3>
					</div>
					<ul class="pricinglist">
						<li>Automação Comercial</li>
						<li>Administração de Condominio</li>
					</ul>
					<div class="signup">
						<a class="btn" href="<?=SITE_RAIZ?>site/inicio/t_contato">
							Socilite um orçamento
						</a>
					</div>
				</div><!--plan-->

			</div><!--princingpanel-->

			<p>
				Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl.
			</p>

		</div>
</div>

<?php $this -> load -> view('site/layout/footer'); ?>
