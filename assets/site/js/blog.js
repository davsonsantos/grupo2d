jQuery(document).ready(function(){
	
	//flexslider in blog
	if(jQuery('.flexslider-blog').length > 0 ) {
		jQuery('.flexslider-blog').flexslider({
			animation: "slide",
			controlNav: false
		});
	}
	
	// Tooltip
	if(jQuery('.share').length > 0) {
		if(jQuery().tooltip)
			jQuery('.share a').tooltip();
	}	
	
	// form validation
	if(jQuery().validationEngine) {
		jQuery("#commentform").validationEngine('attach', {
		    promptPosition: 'bottomLeft',
		    onValidationComplete: function(form, status){
			if(status) {
			    var url = form.attr('action');
			    var formdata = form.serialize();
			    jQuery.post(url,formdata,function(data){
				jQuery('.successmsg').append(data);
			    });
			}
		    }
		});
	}

});