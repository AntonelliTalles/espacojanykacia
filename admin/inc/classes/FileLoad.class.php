<?php

/**
 * FileLoad
 * Carrega arquivos dependentes nas páginas
 *
 * @copyright 2015 Arco Informática (http://arcoinformatica.com.br)
 * @version 1.0.0 (29/08/2015 20:10:44)
 * @author Dian Carlos (dian@arcoinformatica.com.br)
 * @author Ruhan Bahiense (oliveira@arcoinformatica.com.br)
 *
 * Arquivos suportados
 * .css
 * .js (async)
 */

class FileLoad {

	/**
	 * @var string $version Define a versão para todos os arquivos, forçando o cache do navegador.
	 */

	public $version;

	/**
	 * Metodo principal para carregar os arquivos
	 *
	 * @var string $path Caminho do arquivo
	 * @var string $opt Opções de carregamento do arquivo (em JSON)
	 * 		{
	 * 			"type"  : "css"|"js", // Tipo do arquivo solicitado
	 * 			"async" : true|false // Se true, carrega o arquivo de forma assíncrona (somente para .js)
	 * 		}
	 *
	 * @return string HTML chamando o arquivo desejado ou um comentário de erro
	 */

	function file($path, $opt){

		$opt = json_decode($opt);

		switch($opt->type){
			case 'css' : $html = '<link rel="stylesheet" href="' . $path . '?' . $this->version . '" type="text/css">'; break;
			case 'js'  :

				$async = (isset($opt->async)) ? (($opt->async) ? 'async ' : '') : '';

				$html = '<script ' . $async . 'src="' . $path . '?' . $this->version . '" type="text/javascript"></script>';

			break;

			default    : $html = '<!-- File not found - ' . $path . ':' . $opt->type . ' -->';
		}

		echo $html . "\n";

	}

}