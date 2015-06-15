
$(function(){
	
	$('.accContainer').hide();
	$('.accordian:first').next().slideDown();
	
	$('.accordian').click(function(){
		
		if( $('.accordian').next().is(':hidden')) {
			$('.accordian').next().slideUp();
			$(this).next().slideDown();
		}
		return false;
	});
});