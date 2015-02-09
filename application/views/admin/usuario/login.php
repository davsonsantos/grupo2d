<!DOCTYPE html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Acesso ao Sistema</title>
<link rel="stylesheet" href="<?= GD_CSS ?>style.css">
<link rel="stylesheet" href="<?= GD_CSS ?>validationEngine.jquery.css">
    
<script src="<?= GD_JS ?>jquery-1.10.2.min.js"></script>
<script src="<?= GD_JS ?>validation/validate.min.js"></script>
<script src="<?= GD_JS ?>validation/validationEngine.min.js"></script>       
    <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<script>
    jQuery(document).ready(function(){
        jQuery("#form_login").validationEngine();
    });
</script> 

<script>
$(document).ready(function(){
    $('#errolog').hide();
    $('#load').hide();
    jQuery('#form_login').submit(function(){	
        if ($("#form_login").validationEngine('validate')) {
            $('#load').show();
            var dados = jQuery( this ).serialize();
            jQuery.ajax({
                type: "POST",
                url: "<?= GD_RAIZ ?>login/logar",
                data: dados,
                success: function(data){
                    if(data==1){
                        location.href='<?= GD_RAIZ ?>inicio/index'	//Redireciona
                    }else{
                        $('#errolog').show();		//Informa o erro
                        $('#load').hide();
                    }
                } 
            }) 
        };
        return false;
    });
})
</script> 
</head>
<body>
    <section class="logo">
        <img src="<?=GD_IMG?>logoa.png"/>
    </section>
    <form action="" id="form_login" name="form_login" class="login" method="post">
        <p>
            <label for="usuario">Usuário:</label>
            <input type="text" name="usuario" id="usuario" class="form-control input-lg validate[required]" placeholder="Login">
        </p>

        <p>
            <label for="password">Password:</label>
            <input type="password" name="senha" id="senha" class="form-control input-lg validate[required]" placeholder="Senha">
        </p>

        <p class="login-submit">
            <button type="submit" class="login-button">Login</button>
        </p>

        <p class="forgot-password"><a href="index.html">Esqueceu a Senha?</a></p>
    </form>
    
    <section class="logo">
        <h1 id="errolog" style="margin: 70px auto 40px;margin-top: -80px;padding: 8px;width: 260px;font: 18px 'Lucida Grande', Arial, sans-serif;color: #FF0000;text-align: center;">Usuário ou senha errados!</h1>
        <h5 id="load" class="text-danger"><img src="<?= GD_IMG ?>media-player/loading.gif"/></h5>
        <?php echo get_msg('logoffok'); ?>
        <?php echo get_msg('errologin'); ?>
    </section>
     <footer id="rodape">
         <div style="text-align: center;" class="text-danger">
             &copy; 2015&ndash;<?= date('Y') ?> <a href="http://grupo2d.net.br" target="_blank">Davson Santos</a>
         </div>
    </footer>
 
</body>
</html>
