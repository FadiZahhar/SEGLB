jQuery(document).ready(function () {

	
	
		jQuery(".orderby, .ordering").change(function(){
			alert("General Settings are disabled in free version. If you need those functionalityes, you need to buy the commercial version.");
			return false;
		});

	jQuery("#the-list > tr .orderID").change(function(){
		var intRegex = /[0-9 -()+]+$/; 
		if(intRegex.test(parseInt($(this).val()))) {
			if($(this).val()>jQuery("#the-list > tr").length){
				$(this).val(jQuery("#the-list > tr").length-1);
			}
		}
		
		
		
		if($(this).val()=="0"){

			$(this).parents("#the-list > tr").insertBefore(jQuery("#the-list > tr").eq(($(this).val())));
		}else{
			$(this).parents("#the-list > tr").insertAfter(jQuery("#the-list > tr").eq(($(this).val()-1)));
		}
		
		jQuery("#the-list > tr").removeClass('has-background');
		count=jQuery("#the-list > tr").length;
		for(var i=0;i<=count;i+=2){
				jQuery("#the-list > tr").eq(i).addClass("has-background");
		}
		jQuery("#the-list > tr").each(function(){
			jQuery(this).find('.orderID').val(jQuery(this).index());
		});
		
	
		
	})
});


$(function() {
$( "#the-list" ).sortable({
  stop: function() {
		jQuery("#the-list > tr").removeClass('has-background');
		count=jQuery("#the-list > tr").length;
		for(var i=0;i<=count;i+=2){
				jQuery("#the-list > tr").eq(i).addClass("has-background");
		}
		jQuery("#the-list > tr").each(function(){
			jQuery(this).find('.orderID').val(jQuery(this).index());
		});
  },
  revert: true
});
// $( "ul, li" ).disableSelection();
});