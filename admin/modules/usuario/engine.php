<!-- <?php
session_start();
require '../../connect.php';
if (isset($_POST['email']) && empty($_POST['senha']) == false) {

	$nome = addslashes($_POST['nome']);
	$email = addslashes($_POST['email']);
	$senha = addslashes(md5($_POST['senha']));
	$codigo = rand(1, 99999);
}

	$sql = $pdo->prepare("INSERT INTO usuarios SET nome = :nome,
												   email = :email,
												   codigo = :codigo
												   AND senha = :senha");
// 	$sql = "INSERT INTO usuarios SET nome = $nome,
// 												   sexo = $sexo,
// 												   endereco = $endereco,
// 												   email = $email,
// 												   cpf = $cpf,
// 												   data_nasc = $data_nasc,
// 												   telefone = $telefone
// 												   AND senha = $senha";
// echo $sql;
// 		exit();
	$sql->bindValue(":nome", $nome);
	$sql->bindValue(":email", $email);
	$sql->bindValue(":senha", $senha);
	$sql->bindValue(":codigo", $codigo);
	$sql->execute();

	if ($sql->rowCount() > 0) {
		$sql = $sql->fetch();
		
		$_SESSION['banco'] = $sql['codigo'];
		header("Location: /tcc/admin/area/dashboard.php");
		exit();
	} else {
		echo "Os dados apresentados estão incorretos!";
	}

?> -->

<?php 

include '../../connect.php';

if($_GET['action'] == 'add'){

	$nome = addslashes($_POST['nome']);
	$sexo = addslashes($_POST['sexo']);
	$endereco = addslashes($_POST['endereco']);
	$email = addslashes($_POST['email']);
	$cpf = addslashes($_POST['cpf']);
	$data_nasc = addslashes($_POST['data_nasc']);
	$telefone= $_POST['telefone'];
	$senha = addslashes($_POST['senha']);

	$grava = $mysqli->query('

		INSERT

		INTO `usuarios`

		(
			
			`nome`,
			`sexo`,
			`endereco`,
			`email`,
			`cpf`,
			`data_nasc`,
			`telefone`,
			`senha`
		
		) VALUES (

			"' . $nome . '",
			"' . $sexo . '",
			"' . $endereco . '",
			"' . $email . '",
			"' . $cpf . '",
			"' . $data_nasc . '",
			"' . $telefone . '",
			"' . $senha . '"

		)

	');

	$id = $mysqli->id_usuario;

	/* */

	// if($_FILES['foto']){

	// 	$caminho_final = '../../../img/produtos/' . $id . '.jpg';

	// 	$salva = move_uploaded_file($_FILES['foto']['tmp_name'], $caminho_final);

	// 	if($salva){

	// 		$atualiza_produto = $mysqli->query('

	// 			UPDATE `usuarios`

	// 			SET

	// 				`foto` = 1

	// 			WHERE

	// 				`id` = ' . $id . '

	// 		');

	// 	}

	// }

	/* */

	if($grava){

		$_SESSION['banco'] = $sql['id_usuario'];
		header("Location: /projeto_trocas/index.php");
		exit();

	} else {

		echo "Os dados apresentados estão incorretos!";

	}

}