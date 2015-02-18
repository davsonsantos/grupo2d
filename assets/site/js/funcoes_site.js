jQuery(document).ready(function(){
    jQuery("#contactform").validationEngine();
    jQuery('#erro').hide();
    jQuery('#ok').hide();
    jQuery('#load').hide();
    jQuery('#enviar').click(function(){
        jQuery('#contactform').submit(function(){	
            if ($("#contactform").validationEngine('validate')) {
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
    
});
