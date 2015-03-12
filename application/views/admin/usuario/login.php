<!DOCTYPE html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Acesso ao Sistema</title>
<link rel="stylesheet" href="<?= GD_CSS ?>stylea.css">
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
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<style>
body { 
  background: url(http://lorempixel.com/1920/1920/city/9/) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

.panel-default {
opacity: 0.9;
margin-top:30px;
}
.form-group.last { margin-bottom:0px; }
</style>

<script>
$(document).ready(function() {
  $('#olvidado').click(function(e) {
    e.preventDefault();
    $('div#form-olvidado').toggle('500');
  });
  $('#acceso').click(function(e) {
    e.preventDefault();
    $('div#form-olvidado').toggle('500');
  });
});	
</script>
</head>
<body>
	<!--
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
 -->
 
 <div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-7">
        	<div style="padding: 20px;" id="form-olvidado">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-lock"></span> Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">
                            Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">
                            Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"/>
                                    Remember me
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group last">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" class="btn btn-success btn-sm">
                                Sign in</button>
                                 <button type="reset" class="btn btn-default btn-sm">
                                Reset</button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="panel-footer">
                    Not Registred? <a href="" id="olvidado">Register here</a></div>
            </div>
            </div>
            
            <div style="display: none;" id="form-olvidado">
    <h4 class="">
      Forgot your password?
    </h4>
    <form accept-charset="UTF-8" role="form" id="login-recordar" method="post">
      <fieldset>
        <span class="help-block">
          Email address you use to log in to your account
          <br>
          We'll send you an email with instructions to choose a new password.
        </span>
        <div class="form-group input-group">
          <span class="input-group-addon">
            @
          </span>
          <input class="form-control" placeholder="Email" name="email" type="email" required="">
        </div>
        <button type="submit" class="btn btn-primary btn-block" id="btn-olvidado">
          Continue
        </button>
        <p class="help-block">
          <a class="text-muted" href="#" id="acceso"><small>Account Access</small></a>
        </p>
      </fieldset>
    </form>
  </div>
        </div>
    </div>
</div>

</body>
</html>