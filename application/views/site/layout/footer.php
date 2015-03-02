<!-- START OF FOOTER -->
<div class="footer">
    <ul class="share">
        <li>
            <a class="twitter" href="" title="Twitter"></a>
        </li>
        <li>
            <a class="facebook" href="" title="Facebook"></a>
        </li>
        <li>
            <a class="gplus" href="" title="Google Plus"></a>
        </li>
        <li>
            <a class="pinterest" href="" title="Pinterest"></a>
        </li>
    </ul>
    <div class="footerinner">
        &copy; 2015/<?= date('Y') ?>. Grupo 2D by <a href="http://davsonsantos.com.br">Davson Santos</a>
    </div>
</div><!--footer-->
<!-- END OF FOOTER -->

</div><!--mainwrapper-->

<script type="text/javascript" src="<?= SITE_JS ?>jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="<?= SITE_JS ?>modernizr.min.js"></script>
<script type="text/javascript" src="<?= SITE_JS ?>superfish.js"></script>
<script type="text/javascript" src="<?= SITE_JS ?>bootstrap.min.js"></script>
<script type="text/javascript" src="<?= SITE_JS ?>jquery.resize.min.js"></script>
<script type="text/javascript" src="<?= SITE_JS ?>custom.js"></script>

<link rel="stylesheet" href="<?= GD_CSS ?>validationEngine.jquery.css">   
<script src="<?= GD_JS ?>validation/validate.min.js"></script>
<script src="<?= GD_JS ?>validation/validationEngine.min.js"></script>       
    <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->


<script>
jQuery(document).ready(function(){
    jQuery("#contactform").validationEngine();
    jQuery('#erro').hide();
    jQuery('#ok').hide();
    jQuery('#load').hide();
    jQuery('#enviar').click(function(){
        jQuery('#contactform').submit(function(){	
            if (jQuery("#contactform").validationEngine('validate')) {
                jQuery('#load').show();
                var dados = jQuery( this ).serialize();
                jQuery.ajax({
                    type: "POST",
                    url: "<?= SITE_RAIZ ?>site/inicio/enviar_email",
                    data: dados,
                    success: function(data){
                        if(data==1){
                            jQuery('#ok').show();
                            jQuery('#load').hide();
                            document.getElementById("contactform").reset();
                        }else{
                            jQuery('#erro').show();		//Informa o erro
                            jQuery('#load').hide();
                        }
                    } 
                }) 
            };
        return false;
        });
        
    });
})
</script> 



<script type="text/javascript">
    
    jQuery(document).ready(function () {
        var c = 0
        jQuery('#homepanel .item').each(function () {
            jQuery(this).addClass('animate' + c + ' bounceInUp');
            c++;
        });
        // Tooltip
        jQuery('.im-inner a').tooltip();
        // Photo grid hover
        jQuery('#homepanel .item').hover(function () {
            if (Modernizr.csstransitions) {
                jQuery(this).find('.itemcontent').addClass('animate0 fadeInDown').show();
                jQuery(this).find('.itemmeta').addClass('animate0 fadeInUp').show();
            } else {
                jQuery(this).find('.itemcontent').fadeIn();
                jQuery(this).find('.itemmeta').slideDown();
            }
        }, function () {
            jQuery(this).find('.itemcontent').removeClass('animate0 fadeInDown').fadeOut();
            jQuery(this).find('.itemmeta').removeClass('animate0 fadeInUp').fadeOut();
        });
        // Item details view
        jQuery('.itemview').click(function () {

            jQuery('<div id="itemdetails" class="itemdetails"></div>').insertAfter('.leftpanel');
            jQuery('#itemdetails').hide().fadeIn();
            var url = jQuery(this).attr('href');
            jQuery.post(url, function (data) {
                jQuery('#itemdetails').append(data);
                if (jQuery(window).width() <= 768) {
                    jQuery('.mainpanel').hide();
                    if (jQuery('.leftpanel').is(':visible'))
                        jQuery('.leftpanel').hide();
                }
            });
            return false;
        });
        jQuery('.itemdetails .close').live('click', function () {
            jQuery('.itemdetails').fadeOut(function () {
                jQuery(this).remove();
                if (jQuery(window).width() <= 768)
                    jQuery('.mainpanel').show();
            });
            return false;
        });
        jQuery('.prev').live('click', function () {
            var url = jQuery(this).attr('href');
            jQuery.post(url, function (data) {
                jQuery('#itemdetails').html(data);
            });
            return false;
        });
        jQuery('.next').live('click', function () {
            var url = jQuery(this).attr('href');
            jQuery.post(url, function (data) {
                jQuery('#itemdetails').html(data);
            });
            return false;
        });
    });
</script>

<!-- COLOR SWITCHER: DEMO PURPOSES ONLY DO NOT INCLUDE IN PRODUCTION -->
<div class="settings">
    <a class="show"></a>
    <div class="settingsinner">
        <h4>Restrito</h4>
        <div class="predefined">
            <p>
                Login de Acesso:
            </p>
<!--            <a href="" class="default"><span></span></a>
            <a href="style.blue" class="blue"><span></span></a>
            <a href="style.brown" class="brown"><span></span></a>
            <a href="style.green" class="green"><span></span></a>
            <a href="style.gray" class="gray"><span></span></a>
            <a href="style.lime" class="lime"><span></span></a>
            <a href="style.magenta" class="magenta"><span></span></a>
            <a href="style.navyblue" class="navyblue"><span></span></a>
            <a href="style.purple" class="purple"><span></span></a>
            <a href="style.red" class="red"><span></span></a>-->
            <form action="" id="form_login" name="form_login" class="login" method="post">
                <input type="text" class="form-control" style="width: 100%" placeholder="Login" name="usuario">
                <input type="password" class="form-control" style="width: 100%" placeholder="Senha" name="senha">
                <button type="submit" id="botao" class="btn btn-default">Login</button>
            </form>
        </div>
    </div><!--settingsinner-->
</div><!--settings-->

<div class="menubar">
    <a class="showleftmenu"></a><img src="<?= SITE_IMG ?>sartana-logo.png" alt="Sartana">
</div>


<script>
jQuery(document).ready(function(){
    jQuery('#form_login').submit(function(){	
        if (jQuery("#form_login").validationEngine('validate')) {
        	jQuery('#botao').addClass( "alert" );
        	jQuery('#botao').html('Acessando...');
            var dados = jQuery( this ).serialize();
            jQuery.ajax({
                type: "POST",
                url: "<?= GD_RAIZ ?>login/logar",
                data: dados,
                success: function(data){
                    if(data==1){
                    	jQuery('#botao').addClass( "alert-success" );
                        location.href='<?= GD_RAIZ ?>inicio/index'	//Redireciona
                    }else{
                    	jQuery('#botao').addClass( "alert-error" );
                        jQuery('#botao').html('Erro ao Acessar');
                    }
                } 
            }) 
        };
        return false;
    });
})
</script> 

</body>
</html> 