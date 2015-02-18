<?php $this->load->view('site/layout/header'); ?>



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
                <a href="<?= SITE_RAIZ ?>">Grupo 2D</a>
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
            <p>
                Envie-nos sugestões, criticas ou elogios, também use essa canal e nos solicite um orçamento que em breve entraremos em contato
            </p>
            <div id="ok" class="successmsg">
                <div class="alert alert-success alert-block animate0 bounceIn">
                    <button data-dismiss="alert" class="close" type="button">×</button>
                    <h4>Sucesso!</h4>
                    <p>Mensagem Enviada com Sucesso!</p>
                </div>
            </div>
            <div id="erro" class="erromsg">
                <div class="alert alert-error alert-block animate0 bounceIn">
                    <button data-dismiss="alert" class="close" type="button">×</button>
                    <h4>Erro!</h4>
                    <p>Erro ao enviar a Mensagem tente mas tarde!</p>
                </div>
            </div>
            <form id="contactform" name="contactform" class="contactform" action="" method="post">
                <div class="one_half">
                    <input class="validate[required]" type="text" id="nome" name="nome" placeholder="Nome (Obrigatório)">
                </div>
                <div class="one_half last">
                    <input class="validate[required,custom[email]]l" type="text" id="email" name="email" placeholder="Email (Obrigatório)">
                </div>
                <br class="clearfix">
                <div class="subject">
                    <input type="text" name="assunto" id="assunto" placeholder="Assunto (Opcional)">
                </div>
                <div class="txtwrapper">
                    <textarea class="validate[required,minSize[6]]" id="msg" name="msg" cols="50" rows="3" placeholder="Escreva sua Mensagem" style="height: 74px;"></textarea>
                </div>
                <input type="submit" name="enviar" value="ENVIAR" id="enviar"/>
                
<!--                <h1 id="erro" style="padding: 8px;width: 260px;font: 18px 'Lucida Grande', Arial, sans-serif;color: #FF0000;text-align: center;">Usuário ou senha errados!</h1>-->
                <h5 id="load" class="text-danger"><img src="<?= GD_IMG ?>media-player/loading.gif"/></h5>
                <?php echo get_msg('logoffok'); ?>
                <?php echo get_msg('errologin'); ?>
            </form>
        </div>
        <br class="clearfix">
        
    </div>
</div>

<?php $this->load->view('site/layout/footer'); ?>	