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
<script src="<?= GD_JS ?>jquery-1.10.2.min.js"></script>
<script src="<?= GD_JS ?>validation/validate.min.js"></script>
<script src="<?= GD_JS ?>validation/validationEngine.min.js"></script>       
    <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<script>
    jQuery(document).ready(function(){
        jQuery("#contactform").validationEngine();
    });
</script> 

<script>
$(document).ready(function(){
    $('#erro').hide();
    $('#ok').hide();
    $('#load').hide();
    jQuery('#contactform').submit(function(){	
        if ($("#contactform").validationEngine('validate')) {
            $('#load').show();
            var dados = jQuery( this ).serialize();
            jQuery.ajax({
                type: "POST",
                url: "<?= SITE_RAIZ ?>site/inicio/enviar_email",
                data: dados,
                success: function(data){
                    if(data==1){
                        $('#ok').show();
                        $('#load').hide();
                    }else{
                        $('#erro').show();		//Informa o erro
                        $('#load').hide();
                    }
                } 
            }) 
        };
        return false;
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
        <h4>Style Switcher</h4>
        <div class="predefined">
            <p>
                Predefined style:
            </p>
            <a href="" class="default"><span></span></a>
            <a href="style.blue" class="blue"><span></span></a>
            <a href="style.brown" class="brown"><span></span></a>
            <a href="style.green" class="green"><span></span></a>
            <a href="style.gray" class="gray"><span></span></a>
            <a href="style.lime" class="lime"><span></span></a>
            <a href="style.magenta" class="magenta"><span></span></a>
            <a href="style.navyblue" class="navyblue"><span></span></a>
            <a href="style.purple" class="purple"><span></span></a>
            <a href="style.red" class="red"><span></span></a>
        </div>
    </div><!--settingsinner-->
</div><!--settings-->

<div class="menubar">
    <a class="showleftmenu"></a><img src="<?= SITE_IMG ?>sartana-logo.png" alt="Sartana">
</div>




</body>
</html> 