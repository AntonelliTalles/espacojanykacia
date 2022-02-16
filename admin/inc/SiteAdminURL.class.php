<?php

class SiteAdminURL {

	/*
	* Função para exibir a paginação
	* @version: 1.4
	* @autor: Dian Carlos (dian.cabral@gmail.com)
	*
	* SA_showPagination (
	*      $url = Nome da pasta do modulo.
	*
	*      $pagina = Número da página dinâmico para mostrar a página correta.
	*      $porpagina = Número de registros de serão exibidos na página.
	*		(v1.2) $filtro = true para ativar a url com filtro, para paginação em categorias.
	*		(v1.3) $modulo = true (padrão) para uso dentro do SiteAdmin, false para uso em qualquer página.
	*		(v1.4) $htaccess = true para usar URL's amigáveis em qualquer página juntamente com o filtro.
	* )
	*/
	
	static function Paginacao($url, $pagina, $total, $porpagina, $filtro = false, $modulo = true, $htaccess = false){
		
		if(!$filtro == true){$url = $url . '?';}
		if($modulo == true){$url = '#/' . $url;} else {$url = $url;}
		if($htaccess == false){$url = $url . 'p=';}
		
		$prox = ($pagina != '') ? $pagina + 1 : 2;
		$ant = $pagina - 1;
		$ultima_pag = ceil($total / $porpagina);
		$penultima = $ultima_pag - 1;
		$adjacentes = 2;
	
		if ($pagina > 1) $paginacao = '<a class="pagina" href="' . $url . $ant . '">< Anterior</a>';
	
		if ($ultima_pag <= 5){
			
			for ($i = 1; $i < $ultima_pag + 1; $i++){
				if ($i == $pagina) {
					@$paginacao .= '<span>' . $i . '</span>';
				} else {
					$paginacao .= '<a class="pagina" href="' . $url . $i . '">' . $i . '</a>';
				}
			}
			
		}
	
		if ($ultima_pag > 5){
				
			if ($pagina < 1 + (2 * $adjacentes)){
				
				for ($i = 1; $i < 2 + (2 * $adjacentes); $i++){
					if ($i == $pagina) {
						@$paginacao .= '<span>' . $i . '</span>';
					} else {
						$paginacao .= '<a class="pagina" href="' . $url . $i . '">' . $i . '</a>';
					}
				}
	
				$paginacao .= '<span>...</span>';
				$paginacao .= '<a class="pagina" href="' . $url . $penultima . '">' . $penultima . '</a>';
				$paginacao .= '<a class="pagina" href="' . $url . $ultima_pag . '">' . $ultima_pag . '</a>';
			} else if ($pagina > (2 * $adjacentes) && $pagina < $ultima_pag - 3){
	
				$paginacao .= '<a class="pagina" href="' . $url . '1">1</a>';
				$paginacao .= '<a class="pagina" href="' . $url . '2">2</a><span>...</span>';
	
				for ($i = $pagina - $adjacentes; $i <= $pagina + $adjacentes; $i++){
					if ($i == $pagina) {
						$paginacao .= '<span>' . $i . '</span>';
					} else {
						$paginacao .= '<a class="pagina" href="' . $url . $i . '">' . $i . '</a>';
					}
				}
	
				$paginacao .= '<span>...</span>';
				$paginacao .= '<a class="pagina" href="' . $url . $penultima . '">' . $penultima . '</a>';
				$paginacao .= '<a class="pagina" href="' . $url . $ultima_pag . '">' . $ultima_pag . '</a>';
				
			} else {
				
				$paginacao .= '<a class="pagina" href="' . $url . '1">1</a>';
				$paginacao .= '<a class="pagina" href="' . $url . '2">2</a><span>...</span>';
	
				for ($i = $ultima_pag - 4; $i <= $ultima_pag; $i++){
					if ($i == $pagina){
						$paginacao .= '<span>' . $i . '</span>';
					} else {
						$paginacao .= '<a class="pagina" href="' . $url . $i . '">' . $i . '</a>';
					}
				}
				
			}
		}
	
		if ($prox <= $ultima_pag && $ultima_pag > 2) $paginacao .= '<a class="pagina" href="' . $url . $prox . '">Próxima ></a>';

		echo '<div id="uPaginacao">' . $paginacao . '</div>';
	}

}