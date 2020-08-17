jQuery(document).ready(function(){


	//=========================================================================
	//	Faculty Sorting via Isotope
	//=========================================================================
	
	var facultycontainer = jQuery('#facultylisting');
	// initialize isotope
	facultycontainer.isotope({
		itemSelector : '.facultylist-item',
		layoutMode : 'fitRows'
	});
	
	// filter items when filter link is clicked
	jQuery('.secondarynav a').click(function(){
		var selector = jQuery(this).attr('data-filter');
		facultycontainer.isotope({ filter: selector });
		return false;
	});
	
	

});
