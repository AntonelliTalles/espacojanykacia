<?php 

require '../admin/connect.php';

$nome = addslashes($_POST['nome']);
$telefone = addslashes($_POST['telefone']);
$email = addslashes($_POST['email']);
$horario = date('H:i:s', strtotime($_POST['horario']));
$data = addslashes($_POST['data']);
$tipo = addslashes($_POST['tipo']);

// #################### RESERVA DOS HORÁRIOS DESTINADOS A CADA AGENDAMENTO ##################################

if($tipo == 'coloração') {
    $in = $horario;
    $fin = date("H:i:s", strtotime($horario . "  + 2 hour"));

    while($in < $fin) {
        $sql1 = $mysqli->query('
            INSERT INTO horario (

                `hora`,
                `nome`,
                `data`,
                `tipo`

            ) VALUES (

                "'.$in.'",
                "'.$nome.'",
                "'.$data.'",
                "'.$tipo.'"
            )
        
        ');

        $in = date("H:i:s", strtotime($in . "  + 15 minute"));
    }
}

if($tipo == 'corte') {
    $in = $horario;
    $fin = date("H:i:s", strtotime($horario . "  + 1 hour"));

    while($in < $fin) {
        $sql1 = $mysqli->query('
            INSERT INTO horario (

                `hora`,
                `nome`,
                `data`,
                `tipo`

            ) VALUES (

                "'.$in.'",
                "'.$nome.'",
                "'.$data.'",
                "'.$tipo.'"
            )
        
        ');

        $in = date("H:i:s", strtotime($in . "  + 15 minute"));
    }
}

if($tipo == 'escova') {
    $in = $horario;
    $fin = date("H:i:s", strtotime($horario . "  + 1 hour"));

    while($in < $fin) {
        $sql1 = $mysqli->query('
            INSERT INTO horario (

                `hora`,
                `nome`,
                `data`,
                `tipo`

            ) VALUES (

                "'.$in.'",
                "'.$nome.'",
                "'.$data.'",
                "'.$tipo.'"
            )
        
        ');

        $in = date("H:i:s", strtotime($in . "  + 15 minute"));
    }
}

if($tipo == 'hidratação') {
    $in = $horario;
    $fin = date("H:i:s", strtotime($horario . "  + 1 hour"));

    while($in < $fin) {
        $sql1 = $mysqli->query('
            INSERT INTO horario (

                `hora`,
                `nome`,
                `data`,
                `tipo`

            ) VALUES (

                "'.$in.'",
                "'.$nome.'",
                "'.$data.'",
                "'.$tipo.'"
            )
        
        ');

        $in = date("H:i:s", strtotime($in . "  + 15 minute"));
    }
}

if($tipo == 'madrinhas') {
    $in = $horario;
    $fin = date("H:i:s", strtotime($horario . "  + 1 hour 30 minute"));

    while($in < $fin) {
        $sql1 = $mysqli->query('
            INSERT INTO horario (

                `hora`,
                `nome`,
                `data`,
                `tipo`

            ) VALUES (

                "'.$in.'",
                "'.$nome.'",
                "'.$data.'",
                "'.$tipo.'"
            )
        
        ');

        $in = date("H:i:s", strtotime($in . "  + 15 minute"));
    }
}

if($tipo == 'maquiagem') {
    $in = $horario;
    $fin = date("H:i:s", strtotime($horario . "  + 45 minute"));

    while($in < $fin) {
        $sql1 = $mysqli->query('
            INSERT INTO horario (

                `hora`,
                `nome`,
                `data`,
                `tipo`

            ) VALUES (

                "'.$in.'",
                "'.$nome.'",
                "'.$data.'",
                "'.$tipo.'"
            )
        
        ');

        $in = date("H:i:s", strtotime($in . "  + 15 minute"));
    }
}

if($tipo == 'mecha') {
    $in = $horario;
    $fin = date("H:i:s", strtotime($horario . "  + 3 hour"));

    while($in < $fin) {
        $sql1 = $mysqli->query('
            INSERT INTO horario (

                `hora`,
                `nome`,
                `data`,
                `tipo`

            ) VALUES (

                "'.$in.'",
                "'.$nome.'",
                "'.$data.'",
                "'.$tipo.'"
            )
        
        ');

        $in = date("H:i:s", strtotime($in . "  + 15 minute"));
    }
}

if($tipo == 'penteado') {
    $in = $horario;
    $fin = date("H:i:s", strtotime($horario . "  + 40 minute"));

    while($in < $fin) {
        $sql1 = $mysqli->query('
            INSERT INTO horario (

                `hora`,
                `nome`,
                `data`,
                `tipo`

            ) VALUES (

                "'.$in.'",
                "'.$nome.'",
                "'.$data.'",
                "'.$tipo.'"
            )
        
        ');

        $in = date("H:i:s", strtotime($in . "  + 15 minute"));
    }
}

if($tipo == 'selagem') {
    $in = $horario;
    $fin = date("H:i:s", strtotime($horario . "  + 2 hour"));

    while($in < $fin) {
        $sql1 = $mysqli->query('
            INSERT INTO horario (

                `hora`,
                `nome`,
                `data`,
                `tipo`

            ) VALUES (

                "'.$in.'",
                "'.$nome.'",
                "'.$data.'",
                "'.$tipo.'"
            )
        
        ');

        $in = date("H:i:s", strtotime($in . "  + 15 minute"));
    }
}

if($tipo == 'sobrancelha') {
    $in = $horario;
    $fin = date("H:i:s", strtotime($horario . "  + 1 hour"));

    while($in < $fin) {
        $sql1 = $mysqli->query('
            INSERT INTO horario (

                `hora`,
                `nome`,
                `data`,
                `tipo`

            ) VALUES (

                "'.$in.'",
                "'.$nome.'",
                "'.$data.'",
                "'.$tipo.'"
            )
        
        ');

        $in = date("H:i:s", strtotime($in . "  + 15 minute"));
    }
}

// #########################################################################################################

// ####################### CADASTRO DE AGENDAMENTO #########################################################


$sql = $mysqli->query('

    INSERT INTO agendar_horario (

        `nome`,
        `telefone`,
        `email`,
        `horario`,
        `data`,
        `tipo`

    ) VALUES (

        "'.$nome.'",
        "'.$telefone.'",
        "'.$email.'",
        "'.$horario.'",
        "'.$data.'",
        "'.$tipo.'"

    )
');

// echo '

// INSERT INTO agendar_horario (

//     `nome`,
//     `telefone`,
//     `email`,
//     `horario`,
//     `data`,
//     `tipo`

// ) VALUES (

//     "'.$nome.'",
//     "'.$telefone.'",
//     "'.$email.'",
//     "'.$horario.'",
//     "'.$data.'",
//     "'.$tipo.'"

// )
// '; exit;

if($sql) {
    header("Location: ../sucesso.php?horario=$horario&data=$data");
} else {
    header("Location: ../falha.php");
}

?>