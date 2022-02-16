<?php

function limita_caracteres($texto, $limite, $quebra = true) {
    $tamanho = strlen($texto);

    if ($tamanho <= $limite) {
        $novo_texto = $texto;
    } else {
        if ($quebra == true) {
            $novo_texto = trim(substr($texto, 0, $limite)) . '...';
        } else {
            $ultimo_espaco = strrpos(substr($texto, 0, $limite), ' ');
            $novo_texto = trim(substr($texto, 0, $ultimo_espaco)) . '...';
        }
    }
    return $novo_texto;
}

function RemoveAcentos($str, $enc = 'UTF-8') {
    $acentos = array(
        'A' => '/&Agrave;|&Aacute;|&Acirc;|&Atilde;|&Auml;|&Aring;/',
        'a' => '/&agrave;|&aacute;|&acirc;|&atilde;|&auml;|&aring;/',
        'C' => '/&Ccedil;/',
        'c' => '/&ccedil;/',
        'E' => '/&Egrave;|&Eacute;|&Ecirc;|&Euml;/',
        'e' => '/&egrave;|&eacute;|&ecirc;|&euml;/',
        'I' => '/&Igrave;|&Iacute;|&Icirc;|&Iuml;/',
        'i' => '/&igrave;|&iacute;|&icirc;|&iuml;/',
        'N' => '/&Ntilde;/',
        'n' => '/&ntilde;/',
        'O' => '/&Ograve;|&Oacute;|&Ocirc;|&Otilde;|&Ouml;/',
        'o' => '/&ograve;|&oacute;|&ocirc;|&otilde;|&ouml;/',
        'U' => '/&Ugrave;|&Uacute;|&Ucirc;|&Uuml;/',
        'u' => '/&ugrave;|&uacute;|&ucirc;|&uuml;/',
        'Y' => '/&Yacute;/',
        'y' => '/&yacute;|&yuml;/',
        'a.' => '/&ordf;/',
        'o.' => '/&ordm;/'
    );
    return preg_replace($acentos, array_keys($acentos), htmlentities($str, ENT_NOQUOTES, $enc));
}

function RemovePontuacao($string) {
    $especiais = Array(
        ".",
        ",",
        ";",
        "!",
        "@",
        "#",
        "%",
        "¨",
        "*",
        "(",
        ")",
        "+",
        "-",
        "=",
        "§",
        "$",
        "|",
        ":",
        "/",
        "<",
        ">",
        "?",
        "{",
        "}",
        "[",
        "]",
        "&",
        "'",
        '"',
        "´",
        "`",
        "?",
        "º",
        "ª"
    );
    $string = str_replace($especiais, "", trim($string));
    return $string;
}

function gerarCodigo() {
    $n = microtime() . microtime();
    $n = str_replace('.', '', $n);
    $n = str_replace(' ', '', $n);
    $n = alphaID($n);

    return $n;
}

function is_email($email) {
    if (preg_match('/^[a-z0-9]+@[a-z0-9-]+\.[a-z0-9]{1,5}(\.[a-z0-9]{1,5})?$/', $email)) {
        return true;
    } else {
        return false;
    }
}

/*
 * Função para verificar se a tabela no banco de dados existe.
 * @since v1.0
 * @autor: Dian Carlos (dian.cabral@gmail.com)
 *
 * requer Banco de dados MySQL
 *
 *
 * verificaTabela(
 *      $tabela = Nome da tabela no banco de dados que também é o nome do arquivo .SQL caso a tabela não exista
 * )
 */

function verificaTabela($tabela, $MySQLi) {

    if (!($MySQLi->query('SELECT * FROM `' . $tabela . '`'))) {

        $file = 'sql/' . $tabela . '.sql';

        $f = fopen($file, 'r+');
        $sqlFile = fread($f, filesize($file));
        $sqlArray = explode(';', $sqlFile);

        foreach ($sqlArray as $stmt) {
			
            if (strlen($stmt) > 3 && substr(ltrim($stmt), 0, 2) != '/*') {
                $result = $MySQLi->query($stmt);
				
                if (!$result) {
					SA_showError('Ocorreu um erro na criação da tabela no banco de dados.', 'Código do Erro: <b>' . $MySQLi->errno . '</b><br />' . $MySQLi->error);
                    $sqlStmt = $stmt;
                }
            }
        }
    }
}

/*
 * Função para cortar as imagens
 * @version: 1.3
 * @autor: Dian Carlos (dian.cabral@gmail.com)
 *
 * requer WideImage (http://wideimage.sourceforge.net)
 *
 *
 * cortaImagem(
 *      $load = Caminho da imagem original.
 *
 *      $width = Largura para o corte.
 *      $height = Altura para o corte.
 *
 *      $orientação =
 *      'inside' = Imagem cabera dentro da largura e altura especificadas.
 *      'outside' = Imagem vai preencher a largura e altura especificadas.
 *      'auto' = Orientação será automática (Padrão galeria dinâmicas).
 *
 *      $nomefinal = Código da foto, definido antes de chamar a função.
 *      $caminhofinal = Caminho absoluto para mover a foto nas pastas.
 *
 *      $qualidade = Qualidade final da foto (Ex.: 80 = 80% de qualidade). 100 é padrão.
 *
 *      $crop = true para cortar a foto. false é padrão.
 *      $canvas = true para preencher espaços em branco. false é padrão.
 * 		$watermark = true para aplicar uma marca d'agua na imagem. false é padrão.
 * )
 */

function cortaImagem($load, $width, $height, $orientacao, $nomefinal, $caminhofinal, $qualidade = 100, $crop = false, $canvas = false, $watermark = false, $wmroot = false){

    $image = WideImage::load($load);

    //Verifica a orientação da foto se for 'auto'
    if ($orientacao == 'auto') {

        $img = $load;
        list($largura, $altura) = getimagesize($img);

        if ($altura < $largura) {
            $orientacao = 'inside';
        } else {
            $orientacao = 'outside';
        }
    }

    if ($crop == false AND $canvas == false) {

        if ($watermark == true) {

            //Chama o arquivo de marca d'agua
            $watermark = WideImage::load($wmroot);

            //Redimensiona e aplica a marca d'agua
            $mini = $image->resize($width, $height, $orientacao)->merge($watermark, 'bottom - 10', 'right - 10');
        } else {

            //Redimensiona
            $mini = $image->resize($width, $height, $orientacao);
        }
    } else {

        if ($crop == true AND $canvas == false) {

            //Redimensiona e corta
            $mini = $image->resize($width, $height, $orientacao)->crop('center', 'center', $width, $height);
        } else if ($crop == true AND $canvas == true) {

            //Redimensiona, preenche o espaço em branco e corta
            $white = $image->allocateColor(255, 255, 255);
            $mini = $image->resize($width, $height, $orientacao)->resizeCanvas($width, $height, 'center', 'center', $white)->crop('center', 'center', $width, $height);
        } else if ($crop == false AND $canvas == true) {

            //Redimensiona e preenche o espaço em branco
            $white = $image->allocateColor(255, 255, 255);
            $mini = $image->resize($width, $height, $orientacao)->resizeCanvas($width, $height, 'center', 'center', $white);
        }
    }

    //Salva o arquivo na pasta temporária com a qualidade escolhida
    $mini->saveToFile($nomefinal, $qualidade);

    //Move a foto da pasta temporária até a pasta final
    copy($nomefinal, $caminhofinal);

    //Exclui o arquivo temporário
    unlink($nomefinal);
}

/*
 * Função para formatar campos de data para o banco de dados.
 * @since v1.0
 * @autor: Dian Carlos (dian.cabral@gmail.com)
 *
 * formataData(
 *      $data = Data para ser formatada em formato DATE (d/m/Y)
 * 		$hora = true para a fomatação DATETIME (d/m/Y H:i)
 * )
 */

function formataData($data, $hora = false) {
	
	//Substitui as barras por hifen
	$data = str_replace('/', '-', $data);
	
	if($hora == false){
		
		//Explode a data para reorganizar no formato DATE (d/m/Y)
		$data = explode('-', $data);

		$dataFinal = $data[2] . '-' . $data[1] . '-' . $data[0];
		
	} else {
		
		//Explode separando data e hora
		$time = explode(' ', $data);
		
		$hora = $time[1];
		$data = $time[0];
		
		$data = explode('-', $data);
	
		$data = $data[2] . '-' . $data[1] . '-' . $data[0];
		
		//Organiza no formato DATETIME (d/m/Y H:i)
		$dataFinal = $data . ' ' . $hora;
		
	}
	
	return $dataFinal;
}

/*
 * Função Exibir Sucesso
 */

function SA_showSuccess($url) {

    echo '

			<div id="uIBox" class="sd">
			  <div class="case">
				<div class="uTitle2">
					<img src="img/load/loader-stats.gif" style="float: left; margin: 4px 10px 0px 0px">
					Aguarde. Carregando Novo Registro...
				</div>
			  </div>
			</div>

			<script>
				var parts = location.href.split("#/");
				if(parts.length > 1){location.href = parts[0] + "' . $url . '"}
        	</script>

	 ';
}

/*
 * Função Exibir Sucesso Delete
 */

function SA_showSuccessDel($url) {

    echo '

			<div id="uIBox" class="sd">
			  <div class="case">
				<div class="uTitle2">
					<img src="img/load/loader-stats.gif" style="float: left; margin: 4px 10px 0px 0px">
					Aguarde. Carregando Registros...
				</div>
			  </div>
			</div>

			<script>
				var parts = location.href.split("#/");
				if(parts.length > 1){location.href = parts[0] + "' . $url . '"}
        	</script>

	 ';
}

/*
 * Função Página não encontrada
 */

function SA_notFound($url) {

    echo '

<script>
var parts = location.href.split(\'#/\');

var count = new Number();
var count = 6;

function countDown(){

  if((count - 1) >= 0){
    count--;

    if(count === 1){

    $(\'div.uErro span b\').html(count + \' segundo\');

    } else {

    $(\'div.uErro span b\').html(count + \' segundos\');

  	}
	 if (count === 0) {

		$(\'div.uErro span\').html(\'<span class="dic">Redirecionando...</span>\');

		if(parts.length > 1){location.href = parts[0] + "' . $url . '"}

	}

setTimeout(\'countDown()\',1000);
}
}

			(function($){
$(\'div.uErro\').html(\'A página <i>#/\' + parts[1] + \'</i> não foi encontrada.<br /><br /><span class="dic">Redirecionando em <b></b>...</span>\');

countDown();

			})(jQuery);
			</script>

			<div id="uIBox" class="sd">
			  <div class="case">
				<div class="uTitle2">
					erro 404 - Not Found
				<div class="uItens">
					<div class="uErro"></div>
				</div>
				</div>
			  </div>
			</div>

	 ';
}

/*
 * Função Registro Vazio
 */

function SA_empty() {

    echo '

	 <div id="uIBox" class="sd">
			  <div class="case">
				<div class="uTitle2">
					<img src="img/load/loader-stats.gif" style="float: left; margin: 4px 10px 0px 0px">
					Nenhum Registro. Aguarde! Redirecionando...
				</div>
			  </div>
			</div>

			<script>location.href = "#/";</script>

	 ';
}

/*
 * Função Exibir Erro Normal
 */

function SA_showError($texto, $erro, $tipo = 1) {

    echo '

<div id="uIBox" class="sd">
  <div class="case">
    <div class="uTitle2">Ops. Ocorreu um erro inesperado :(</div>
    <div class="uItens">
		<div class="uErro">
		' . $texto . '<br />
            <span class="dic">';

    if ($tipo == 1) {

        echo '

					Por favor, recarregue o SiteAdmin clicando no botão <img src="img/icon/icon-refresh.png"> e tente novamente.<br /><br />
                	<i>Se o problema persistir, entre em contato com o Desenvolvedor.</i><br /><br />

					';
    }

    echo '
				<b>Detalhes do Erro: </b><br /><i>' . $erro . '</i>
            </span>
    	</div>
	</div>
  </div>
</div>

	 ';
}

/*
 * Função para exibir a paginação
 * @version: 1.2
 * @autor: Dian Carlos (dian.cabral@gmail.com)
 *
 * SA_showPagination (
 *      $url = Nome da pasta do modulo.
 *
 *      $pagina = Número da página dinâmico para mostrar a página correta.
 *      $porpagina = Número de registros de serão exibidos na página.
 *		$filtro = true para ativar a url com filtro, para paginação em categorias.
 * )
 */

function SA_showPagination($url, $pagina, $total, $porpagina, $filtro = false) {
	
	if(!$filtro == true){$url = $url . '?';}

    if ($pagina != '') {
        $prox = $pagina + 1;
    } else {
        $prox = 2;
    }
    $ant = $pagina - 1;
    $ultima_pag = ceil($total / $porpagina);
    $penultima = $ultima_pag - 1;
    $adjacentes = 2;

    if ($pagina > 1) {
        $paginacao = '<a class="pagina" href="#/' . $url . 'p=' . $ant . '">< Anterior</a>';
    }

    if ($ultima_pag <= 5) {
        for ($i = 1; $i < $ultima_pag + 1; $i++) {
            if ($i == $pagina) {
                @$paginacao .= '<span>' . $i . '</span>';
            } else {
                $paginacao .= '<a class="pagina" href="#/' . $url . 'p=' . $i . '">' . $i . '</a>';
            }
        }
    }

    if ($ultima_pag > 5) {
        if ($pagina < 1 + (2 * $adjacentes)) {
            for ($i = 1; $i < 2 + (2 * $adjacentes); $i++) {
                if ($i == $pagina) {
                    @$paginacao .= '<span>' . $i . '</span>';
                } else {
                    $paginacao .= '<a class="pagina" href="#/' . $url . 'p=' . $i . '">' . $i . '</a>';
                }
            }

            $paginacao .= '<span>...</span>';
            $paginacao .= '<a class="pagina" href="#/' . $url . 'p=' . $penultima . '">' . $penultima . '</a>';
            $paginacao .= '<a class="pagina" href="#/' . $url . 'p=' . $ultima_pag . '">' . $ultima_pag . '</a>';
        } else if ($pagina > (2 * $adjacentes) && $pagina < $ultima_pag - 3) {

            $paginacao .= '<a class="pagina" href="#/' . $url . 'p=1">1</a>';
            $paginacao .= '<a class="pagina" href="#/' . $url . 'p=2">2</a><span>...</span>';

            for ($i = $pagina - $adjacentes; $i <= $pagina + $adjacentes; $i++) {
                if ($i == $pagina) {
                    $paginacao .= '<span>' . $i . '</span>';
                } else {
                    $paginacao .= '<a class="pagina" href="#/' . $url . 'p=' . $i . '">' . $i . '</a>';
                }
            }

            $paginacao .= '<span>...</span>';
            $paginacao .= '<a class="pagina" href="#/' . $url . 'p=' . $penultima . '">' . $penultima . '</a>';
            $paginacao .= '<a class="pagina" href="#/' . $url . 'p=' . $ultima_pag . '">' . $ultima_pag . '</a>';
        } else {
            $paginacao .= '<a class="pagina" href="#/' . $url . 'p=1">1</a>';
            $paginacao .= '<a class="pagina" href="#/' . $url . 'p=2">2</a><span>...</span>';

            for ($i = $ultima_pag - 4; $i <= $ultima_pag; $i++) {
                if ($i == $pagina) {
                    $paginacao .= '<span>' . $i . '</span>';
                } else {
                    $paginacao .= '<a class="pagina" href="#/' . $url . 'p=' . $i . '">' . $i . '</a>';
                }
            }
        }
    }

    if ($prox <= $ultima_pag && $ultima_pag > 2) {
        $paginacao .= '<a class="pagina" href="#/' . $url . 'p=' . $prox . '">Próxima ></a>';
    }
    echo '<div id="uPaginacao">' . $paginacao . '</div>';
}

/*
 * Função Erro na busca
 */

function SA_searchnotfound($uKey){

    echo '
	<div class="notFound">
		Nenhum resultado foi encontrado.<br />

		<span>
			Sua busca para <i>"' . $uKey . '"</i> não retornou nenhum resultado.<br /><br />
			<b>Possiveis Causas</b><br /><br />
			 - As palavras estão digitadas incorretamente.<br />
			 - O registro foi excluido ou não existe no banco de dados.<br /><br />

			<b>Dicas</b><br /><br />
			 - Verifique se a busca está sendo feita no módulo correto.<br />
			 - Verifique se digitou todas as palavras corretamente.<br />
			 - Tente palavaras-chave mais específicas.<br />
			 - Tente palavaras-chave diferentes.<br />
			 - Verifique o excesso ou a falta de espaçoes entre as palavras.
		</span>
	</div>
	';
	
}

/*
 * Função para converter links em textos
 * @version: 1.0
 * @autor: Dian Carlos (dian.cabral@gmail.com)
 *
 * SA_convertLinks (
 *      $texto = Entrada do texto.
 * )
 */

function SA_convertLinks($texto){
		
	$texto = preg_replace('@(https?://([-\w\.]+)+(:\d+)?(/([\w/_\.]*(\?\S+)?)?)?)@', '<a rel="external" href="$1" target="_blank">$1</a>', $texto);
	
	return $texto;
}

/*
 * Função para remover os links do texto
 * @version: 1.0
 * @autor: Dian Carlos (dian.cabral@gmail.com)
 *
 * SA_removeTags (
 *      $texto = Entrada do texto.
 * )
 */

function SA_removeTags($texto){
	
    $texto = strip_tags($texto, '<b><i>');
	
	return $texto;
}