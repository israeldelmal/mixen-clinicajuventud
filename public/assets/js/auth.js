$('body > div > nav > a').on('click', function(event) {
	event.preventDefault();
	// ID del formulario
	let ID = $(this).attr('data-menu');
	// Desactivar y activar elementos de navegación
	$('body > div > nav > a').removeClass('active');
	$(this).addClass('active');
	// Desactivar y activar formularios
	$('body > div > form').slideUp('normal');
	$(ID).delay(500).slideDown('normal');
	// Desactivar errores y limpiar formularios
	$('body > div > form > div > div').slideUp('normal');
	$('body > div > form > div > input').val('');
});