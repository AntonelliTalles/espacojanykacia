/**
 * Escopo de compatibilidade do jQuery
 */
(function($){
	
	$(document).ready(function() {

		// Cria uma div.paginas que receberá os paginadores
		var div = $('<div></div>').addClass('paginas');
		// Insere a div criada antes da lista de destaques
		$('#blocoDestaques ul').before(div);
		
		/**
		 * Roda o jQuery Cycle na lista (ul) que está
		 * dentro do bloco de destaques (#blocoDestaques) 
		 */
		$('#blocoDestaques ul').cycle({
			pager: 'div.paginas', // Paginadores
			pause: true, // Pausa ao passar o mouse sobre ele?
			pauseOnPagerHover: true, // Pausa ao passar o mouse sobre as páginas?
			timeout: 7000
		});
	});
	
})(jQuery);