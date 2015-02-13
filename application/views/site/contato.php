<?php $this->load->view('site/layout/header');?>

<div class="mainpanel fixedpanel animate5 fadeInLeft">
	<div class="headerpanel">
		<div class="headicon">
			<span class="iconfa-envelope"></span>
		</div>
		<h1>Contate-nos</h1>
		<p>
			Envie sua susgentão ou critica que em breve retornaremos.
		</p>
		<ul class="breadcrumbs">
			<li>
				<a href="<?=SITE_RAIZ?>">Grupo 2D</a>
				<span>/</span>
			</li>
			<li>
				Contato
			</li>
		</ul>
	</div>
	<div class="contentpanel">
		<br>
		<br>
		<div class="one_half">
			<h3 class="sectitle">Sede</h3>
			<div class="one_half address">
				<h4>Endereço</h4>
				<p>
					Rua Papagaio, 223 - Condominio Villa dos Pássaros - Tarumã
				</p>
				<p>
					Tel Nº: +55 92 99167 0359 (Vivo)
				</p>
				<p>
					Tel Nº: +55 92 98403 3363 (Claro)
				</p>
			</div>
			<div class="one_half last address">
				<h4>Email</h4>
				<p>
					davsonsantos@gmail.com
					<br>
					atendimento@grupo2d.net.br
				</p>
			</div>
		</div>
		<div class="one_half last contact">
			<h3 class="sectitle">Contact Form</h3>
			<div class="successmsg"></div>
			<form id="contactform" name="contactform" class="contactform" action="" method="post">
				<div class="one_half">
					<input class="validate[required]" type="text" name="nome" placeholder="Nome (Obrigatório)">
				</div>
				<div class="one_half last">
					<input class="validate[required,custom[email]]l" type="text" name="email" placeholder="Email (Obrigatório)">
				</div>
				<br class="clearfix">
				<div class="subject">
					<input type="text" name="assunto" placeholder="Assunto (Opcional)">
				</div>
				<div class="txtwrapper">
					<textarea class="validate[required,minSize[6]]" name="msg" cols="50" rows="3" placeholder="Escreva sua Mensagem" style="height: 74px;"></textarea>
				</div>
				<input type="submit" name="enviar" value="ENVIAR" id="enviar"/>
			</form>
		</div>
		<br class="clearfix">
	</div>
</div>


<?php $this->load->view('site/layout/footer');?>	