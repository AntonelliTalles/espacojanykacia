<?php

class SiteAdmin {

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

	function validaAcesso($codigoPermissao){
	    global $MySQLi;
	    $isPerm = $MySQLi->query('SELECT COUNT(uPermissaoId) as total
	                                FROM upermissoes
	                                
	                                WHERE uPermissaoCodigo="'.$codigoPermissao.'"
	                                AND uPermissaoTipoUsuario='.$_SESSION['uUserTipo'])->fetch_object()->total;

	    $isPerm = $isPerm > 0 ? true:false;

	    if(!$isPerm){
	        header('Location: ../../layout/elements/home.php');
	        exit;
	    }
	}
	
	function FileSize($bytes, $precision = 2){

		$kilobyte = 1024;
		$megabyte = $kilobyte * 1024;
		$gigabyte = $megabyte * 1024;

		if(($bytes >= 0) && ($bytes < $kilobyte)) return $bytes . ' B'; else
		if(($bytes >= $kilobyte) && ($bytes < $megabyte)) return round($bytes / $kilobyte, $precision) . ' KB'; else
		if(($bytes >= $megabyte) && ($bytes < $gigabyte)) return round($bytes / $megabyte, $precision) . ' MB'; else

		return $bytes . ' B';

	}

	function alphaID($in, $number = false, $to_num = false, $pad_up = false){
		if($number == true){
			$index = '0123456789';
		} else
		if($number == false){
			$index = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		}
		$base = strlen($index);

		if($to_num){
			// Tradução de texto para número
			$in = strrev($in);
			$out = 0;
			$len = strlen($in) - 1;
			for ($t = 0; $t <= $len; $t++) {
				$bcpow = bcpow($base, $len - $t);
				$out = $out + strpos($index, substr($in, $t, 1)) * $bcpow;
			}

			if(is_numeric($pad_up)) {
				$pad_up--;
				if($pad_up > 0) {
					$out -= pow($base, $pad_up);
				}
			}
		} else {
			// Tradução de número para texto
			if(is_numeric($pad_up)) {
				$pad_up--;
				if($pad_up > 0) {
					$in += pow($base, $pad_up);
				}
			}

			$out = "";
			for ($t = floor(log10($in) / log10($base)); $t >= 0; $t--) {
				$a = floor($in / bcpow($base, $t));
				$out = $out . substr($index, $a, 1);
				$in = $in - ($a * bcpow($base, $t));
			}
			$out = strrev($out);
		}

		return $out;
	}

	/*
	 * Função para criar URL amigáveis.
	 * @since v1.1
	 * @autor: Dian Carlos (dian.cabral@gmail.com)
	 *
	 * criarURL(
	 *      $str = String de entrada.
	 *		$hifen = Se true os espaços da string serão substituidos por um hífen.
	 * )
	 */

	function criarURL($str, $hifen = true){

		$a = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
		$b = 'AAAAAAACEEEEIIIIDNOOOOOOUUUUYobaaaaaaaceeeeiiiionoooooouuuyybyRr';
		$str = utf8_decode($str);
		$str = str_replace('?', '', $str);
		$str = str_replace('"', '', $str);
		$str = str_replace("'", '', $str);
		$str = str_replace('&', 'e', $str);
		$str = strtr($str, utf8_decode($a), $b);

		if($hifen == true){
			$str = str_replace(' ', '-', $str);
			$str = str_replace('--', '', $str);
		}

		$str = preg_replace('/[^a-z0-9-]/', '', strtolower($str));

		return utf8_encode($str);

	}

	function gerarCodigo($number = false){
		$n = microtime() . microtime() . time();
		$n = str_replace('.', '', $n);
		$n = str_replace(' ', '', $n);
		if($number == false){
			$n = $this->alphaID($n);
			$n = substr($n, 0, 6);
		} else
		if($number == true){
			$n = $this->alphaID($n, true);
		}

		return $n;

	}

	/**
	 * Função para cortar as imagens
	 * @version: 1.3
	 * @autor: Dian Carlos (dian.cabral@gmail.com)
	 *
	 * requer WideImage (http://wideimage.sourceforge.net)
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
		if($orientacao == 'auto'){

			$img = $load;
			list($largura, $altura) = getimagesize($img);

			$orientacao = ($altura < $largura) ?  'inside' : 'outside';

		}

		if($crop == false AND $canvas == false){

			if($watermark == true){

				//Chama o arquivo de marca d'agua
				$watermark = WideImage::load($wmroot);

				//Redimensiona e aplica a marca d'agua
				$mini = $image->resize($width, $height, $orientacao)->merge($watermark, 'bottom - 10', 'right - 10');
			} else {

				//Redimensiona
				$mini = $image->resize($width, $height, $orientacao);
			}

		} else {

			if($crop == true AND $canvas == false){

				//Redimensiona e corta
				$mini = $image->resize($width, $height, $orientacao)->crop('center', 'center', $width, $height);
			} else if($crop == true AND $canvas == true){

				//Redimensiona, preenche o espaço em branco e corta
				$white = $image->allocateColor(255, 255, 255);
				$mini = $image->resize($width, $height, $orientacao)->resizeCanvas($width, $height, 'center', 'center', $white)->crop('center', 'center', $width, $height);
			} else if($crop == false AND $canvas == true){

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
	 * Função para cortar as imagens
	 * @version: 2.1
	 * @autor: Dian Carlos (dian.cabral@gmail.com)
	 *
	 * requer WideImage (http://wideimage.sourceforge.net)
	 *
	 * cortaImagem2 (
	 *      $type = 1 para somente redimensionar. 0 para redimensionar e cortar.
	 *
	 *      $load = Caminho absoluto da imagem.
	 *
	 *      $vCenter = Distância Y do corte + ($newwidth / 2).
	 *      $hCenter = Distância X do corte + ($newheight / 2).
	 *
	 *		$width = Largura original da imagem.
	 *		$height = Altura original da imagem.
	 *
	 *		$newwidth = Largura do novo corte.
	 *		$newheight = Altura do novo corte.
	 *
	 *      $nomefinal = Nome da foto, definido antes de chamar a função.
	 *
	 * )
	 */

	function cortaImagem2($type, $load, $vCenter, $hCenter, $width, $height, $newwidth, $newheight, $nomefinal, $orientacao = 'outside'){

		$img = WideImage::load($load);

		//Verifica a orientação da foto se for 'auto'
		if($orientacao == 'auto'){

			$check = $load;
			list($largura, $altura) = getimagesize($check);

			$orientacao = ($altura < $largura) ?  'inside' : 'outside';

		}

		if($type == 0){

			$img = $img->crop($vCenter + ($width / 2) . '-' . $width, $hCenter + ($height / 2) . '-' . $height, $width, $height);

		}

		$img = $img->resize($newwidth, $newheight, $orientacao);
		$img = $img->crop('center', 'center', $newwidth, $newheight);

		//Salva o arquivo na pasta temporária com a qualidade escolhida
		$img->saveToFile($nomefinal, 100);

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
	 * Função para exibir sucesso
	 * @version: 2.0
	 * @autor: Dian Carlos (dian.cabral@gmail.com)
	 *
	 * SA_showSuccess (
	 *      $url = URL para redirecionamento.
	 * )
	 */

	function SA_showSuccess($url){

		echo '
			  <div class="MODBox sucess">

				  <div class="head sd">

					  <div class="icon" style="background-image: url(img/icon/icon-sucess.png)"></div>
					  <div class="title">

						  Sucesso! Carregando novo conteúdo. Aguarde...

					  </div>

				  </div>

			  </div>

			  <script>
				  var parts = location.href.split("#/");

				  if(parts.length > 1){
					  location.href = parts[0] + "' . $url . '";
				  }

			  </script>

		 ';
	}

	/*
	 * Função Exibir Sucesso Delete
	 */

	function SA_showSuccessDel($url) {

		echo '
				<div class="MODBox sucess">

					<div class="head sd">

						<div class="icon" style="background-image: url(img/icon/icon-sucess.png)"></div>
						<div class="title">

							Sucesso! Aguarde. Carregando...

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
		 if(count === 0) {

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

	function SA_empty($redirecionamento = true, $mensagem = NULL , $link = NULL){

		 if($redirecionamento == true){

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

		 } else {

			 echo '

			<div id="uIBox" class="sd">

				<div class="case">
					<div class="uTitle2">Ops. Nenhum registro foi encontrado</div>

					<div class="uItens">

							<div class="uErro">
								' . $mensagem;

								if($link != NULL){
									echo '
										<br />
										<span class="dic">
											<i>' . $link . '</i>
										</span>

									';

								}

							echo '
							</div>

						</div>
				</div>

			</div>

			 ';

		 }

	}

	/*
	 * Função para exibir a mensagem de erro
	 * @version: 2.0
	 * @autor: Dian Carlos (dian.cabral@gmail.com)
	 *
	 * SA_showErrorV2 (
	 *      $erro = Mensagem de erro personalizada retornada pelo sistema.
	 * )
	 */

	function SA_showErrorV2($erro = ''){

		echo '

			<div class="MODBox error">

				<div class="head sd">

					<div class="icon" style="background-image: url(img/icon/icon-error.png)"></div>
					<div class="title sub">

						Ops! Ocorreu um erro.

					</div>

				</div>

				<div class="cont sd">

					<div class="case">

						Infelismente, não foi possivel completar a sua requisição.<br />

						<i><b>Detalhes do erro:</b></i>

						<div class="msg">' . $erro . '</div>

					</div>

				</div>

			</div>

		 ';
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

}