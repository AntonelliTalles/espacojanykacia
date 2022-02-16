<?php
require_once 'inc/classes/FileLoad.class.php';
/**
 * Área Administrativa
 *
 * @author Dian Carlos <dian.cabral@gmail.com>
 * @copyright 2016 Softmark. Todos os direitos reservados.
 *
 * Esse é um arquivo padrão para conexão com banco de dados MySQL.
 * Ele deve ser incluido em todos os outros arquivos que possuirem algum tipo de interação com o banco.
 *
 * @link http://php.net/manual/pt_BR/function.include.php
 *
 */

/**
 * Abre uma nova conexão para o servidor MySQL
 * @link http://php.net/manual/pt_BR/mysqli.construct.php
 * 
 * mysqli = new mysqli('localhost', <usuário>, <senha>, <tabela>);
 * 
 * Usuário "root" sem senha é padrão do XAMPP.
 *
 */
//$mysqli = new mysqli('localhost', 'newuser', 'wampp', 'humbertoandriolli');
$mysqli = new mysqli('localhost', 'root', '', 'agendamento');

/**
 * Define o conjunto de caracteres padrão do cliente
 * @link http://php.net/manual/pt_BR/mysqli.set-charset.php
 *
 */
$mysqli->set_charset('utf8');

/**
 * Retorna o código de erro da ultima chamada a função connect
 * @link http://php.net/manual/pt_BR/mysqli.connect-errno.php
 *
 * Retorna uma string descrevendo o ultimo erro da função connect
 * @link http://php.net/manual/pt_BR/mysqli.connect-error.php
 *
 * @link http://php.net/manual/pt_BR/control-structures.if.php
 */
if(mysqli_connect_errno()){

	echo 'Ocorreu um erro na conexão com o Banco de Dados: ' . mysqli_connect_error();
	exit;

}

$load = new FileLoad;

$load->version = '1.32';
  

$mysqli->set_charset('utf8');



require_once 'inc/info.php';

require_once 'inc/functions.php';

require_once 'inc/SiteAdmin.class.php';

require_once 'inc/SiteAdminURL.class.php';

$SiteAdmin = new SiteAdmin();