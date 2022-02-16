<?php 

require '../admin/connect.php';

$nome = addslashes($_POST['nome']);
$telefone = addslashes($_POST['telefone']);
$email = addslashes($_POST['email']);
$mensagem = addslashes($_POST['mensagem']);


$sql = $mysqli->query('

    INSERT INTO noivas (

        `nome`,
        `telefone`,
        `email`,
        `mensagem`

    ) VALUES (

        "'.$nome.'",
        "'.$telefone.'",
        "'.$email.'",
        "'.$mensagem.'"
    )
');

if($sql) {
    header("Location: ../sucesso-contato.php");
} else {
    header("Location: ../falha-contato.php");
}

?>