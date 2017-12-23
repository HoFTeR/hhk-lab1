jQuery(function( $ ) {
	if (!$.cookie('hideModal')) {
		var delay_popup = 2000;
		setTimeout( function () { document.getElementById('modal-10').classList.add('md-show'); }, delay_popup );
		}
		$.cookie('hideModal', true, {
			expires: 7,
			path: '/'
		});
	}
);