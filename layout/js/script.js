$(document).ready(function() {
	
	'use strict';
	
	// Hiding The Placeholder On Focusing & Showing It On Bluring
	
	$('[placeholder]').focus(function() {
		
		$(this).attr('data-text', $(this).attr('placeholder'));
		
		$(this).attr('placeholder', '');
		
	}).blur(function() {
		
		$(this).attr('placeholder', $(this).attr('data-text'));
		
	});
    
});