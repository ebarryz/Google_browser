$(document).ready(function() {
	var searchButton = $('.szukaj');

	// Do tej funkcji należy doimplementować albo:
	// jQuery.ajax
	// albo użyć natywnego FetchAPI
	function doMagic() {
		console.log('Do magic!');
	}

	searchButton.on('keypress', function(event) {
		var code = event.keyCode || event.which;

		// sprawdzanie czy naciśnięto "enter"
		if(code == 13) {
			// jeżeli naciśnięto - nie wykonuj akcji domyślnej
			// (czyli przeładowania strony z przekazaniem parametru GET)
			event.preventDefault();
			// tylko wykonuj "magię"
			doMagic();
		}

	});
	console.log('DOM CONTENT LOADED!');
});