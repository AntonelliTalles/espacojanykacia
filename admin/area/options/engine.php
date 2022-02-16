<?php 

require '../../connect.php';

if($_GET['action'] = 'del') {

    $id = $_GET['id'];
    
    $sql2 = $mysqli->query('DELETE FROM agendar_horario WHERE id = '.$id.'');

    // echo 'DELETE * FROM agendar_horario WHERE id = '.$id.'';
    // exit;

    if($sql2) {
        header("Location: ../sucesso-exclusao.php");
    } else {
        header("Location: ../falha-exclusao.php");
    }
}

if($_GET['action'] = 'del_noiva') {

    $id = $_GET['id'];
    
    $sql2 = $mysqli->query('DELETE FROM vestidos WHERE id = '.$id.'');

    // echo 'DELETE * FROM agendar_horario WHERE id = '.$id.'';
    // exit;

    if($sql2) {
        header("Location: ../sucesso-exclusao.php");
    } else {
        header("Location: ../falha-exclusao.php");
    }
}

$nome = addslashes($_POST['nome']);
$telefone = addslashes($_POST['telefone']);
$email = addslashes($_POST['email']);
$horario = date('H:i:s', strtotime($_POST['horario']));
$data = addslashes($_POST['data']);
$reserva = addslashes($_POST['reserva']);
$tipo = addslashes($_POST['tipo']);

// #################### RESERVA DOS HORÁRIOS DESTINADOS A CADA AGENDAMENTO ##################################

if($tipo == 'noivas') {
    $in = $horario;
    $fin = date("H:i:s", strtotime($horario . "  + '.$reserva.' hour"));

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

if($tipo == 'vestidos') {
    $in = $horario;
    $fin = date("H:i:s", strtotime($horario . "  + '.$reserva.' hour"));

    while($in < $fin) {
        $sql1 = $mysqli->query('
            INSERT INTO vestidos (

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

        echo '
        INSERT INTO vestidos (

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
    
    '; 
    } exit;

    if($sql1) {
        header("Location: ../sucesso.php?horario=$horario&data=$data");
    } else {
        header("Location: ../falha.php");
    }
    exit();
}

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