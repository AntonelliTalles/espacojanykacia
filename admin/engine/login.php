<?php
session_start();
require '../connect.php';
if (isset($_POST['email']) && empty($_POST['senha']) == false) {
	$email = addslashes($_POST['email']);
	$senha = addslashes($_POST['senha']);
}

	// $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha");
	// $sql->bindValue(":email", $email);
	// $sql->bindValue(":senha", $senha);
	// $sql->execute();

	// if ($sql->rowCount() > 0) {
	// 	$sql = $sql->fetch();

	// 	$_SESSION['banco'] = $sql['id_usuario'];

	// 	header("Location: /projeto_trocas/index.php");
	// 	exit();
	// } else {
	// 	echo "Erro: Usuário ou senha não estão corretos!";
	// 	exit();
	// }

$verifica_usuario = $mysqli->query('

		SELECT

			*

		FROM `usuarios`

		WHERE

			`email` = "' . $email . '" AND
			`senha` = "' . $senha . '"

		LIMIT 0,1

	');

if($verifica_usuario->num_rows > 0){

		// Se o usuário existir (resultado maior que zero)

		/* */

		/**
		 * Retorna a linha atual do conjunto de resultados como um objetoe e atribui a uma variável
		 * @link http://php.net/manual/pt_BR/mysqli-result.fetch-object.php
		 *
		 */
		$dados = $verifica_usuario->fetch_object();

		/**
		 * Cria uma variavel de sessão e atribui um valor
		 * @link http://php.net/manual/en/reserved.variables.session.php
		 *
		 */
		$_SESSION['banco'] = $dados->id;

		/**
		 * Redireciona o usuário para a página inicial do painel
		 * @link http://php.net/manual/pt_BR/function.header.php
		 *
		 */
		header('Location: /tcc/admin/area/dashboard.php');

	} else {

		// Se o usuário não existir (resultado igual a zero)

		/* */

		/**
		 * Redireciona o usuário de volta para a pagina de login, com uma variável GET de erro
		 *
		 */
		echo "Erro: Usuário ou senha não estão corretos!";
	 	exit();

	}

?>
