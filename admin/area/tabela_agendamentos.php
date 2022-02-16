<?php 

require '../connect.php';

if(!empty($_GET['data'])){
  $data = $_GET['data'];
} else {
  $data = date('Y-m-d');
}

$table = $mysqli->query("SELECT * FROM agendar_horario WHERE `data` = '$data' ORDER BY horario ASC");
$table2 = $mysqli->query("SELECT * FROM vestidos WHERE `data` = '$data' ORDER BY hora ASC");

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Espaço Jany Kacia</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <link href="../assets/css/demo.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-image="../assets/img/sidebar-5.jpg">
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="#" class="simple-text">
                        Espaço Jany Kacia
                    </a>
                </div>
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="opcao.php">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Agendar Horário</p>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="tabela_agendamentos.php">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Próx. Agendamentos</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#pablo"> </a>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <!-- <ul class="nav navbar-nav mr-auto">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nc-icon nc-zoom-split"></i>
                                    <span class="d-lg-block">&nbsp;Search</span>
                                </a>
                            </li>
                        </ul> -->
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="/tcc/index.html">
                                    <span class="no-icon">Sair</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-md-12">
                                <div class="card strpied-tabled-with-hover">
                                    <div class="card-header ">
                                        <h4 class="card-title">Agendamentos do dia</h4>
                                        <form action="tabela_agendamentos.php" method="get">
                                            <div class="col-md-6" class="form-group">
                                                <label for="data">Seleciona a data:</label>
                                                <input type="date" class="form-control data-menor" name="data" value="<?php echo date("Y-m-d", strtotime($data))?>" oninput="submit()" >
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-body table-full-width table-responsive">
                                        <table class="table table-hover table-striped">
                                            <thead>
                                                <th>Nome</th>
                                                <th>Data</th>
                                                <th>Horário</th>
                                                <th>Serviço</th>
                                                <th>Telefone</th>
                                                <th>Ações</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                
                                                while ($agendamento = $table->fetch_object()) {

                                                    $nome = stripslashes($agendamento->nome);
                                                    $data = stripslashes($agendamento->data);
                                                    $horario = stripslashes($agendamento->horario);
                                                    $tipo = stripslashes($agendamento->tipo);
                                                    $telefone = stripslashes($agendamento->telefone);
                                                    $id = stripslashes($agendamento->id);
                                                
                                                ?>
                                                <tr>
                                                    <td><?php echo $nome?></td>
                                                    <td><?php echo date("d/m/Y", strtotime($data))?></td>
                                                    <td><?php echo $horario?></td>
                                                    <td><?php echo $tipo?></td>
                                                    <td><?php echo $telefone?></td>
                                                    <td><a href="options/engine.php?action=del&id=<?php echo $id ?>" onclick="return confirm('Confirma a exclusão desse agendamento?')" class="btn btn-primary opcao">Excluir</a></td>
                                                </tr>

                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <hr>
                        <div class="col-md-12">
                                <div class="card strpied-tabled-with-hover">
                                    <div class="card-header ">
                                        <h4 class="card-title">Agendamentos de noiva do dia</h4>
                                        <form action="tabela_agendamentos.php" method="get">
                                            <div class="col-md-6" class="form-group">
                                                <label for="data">Seleciona a data:</label>
                                                <input type="date" class="form-control data-menor" name="data" value="<?php echo date("Y-m-d", strtotime($data))?>" oninput="submit()" >
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-body table-full-width table-responsive">
                                        <table class="table table-hover table-striped">
                                            <thead>
                                                <th>Nome</th>
                                                <th>Data</th>
                                                <th>Horário</th>
                                                <th>Serviço</th>
                                                <th>Ações</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                
                                                while ($agendamento2 = $table2->fetch_object()) {

                                                    $nome = stripslashes($agendamento2->nome);
                                                    $data = stripslashes($agendamento2->data);
                                                    $horario = stripslashes($agendamento2->hora);
                                                    $tipo = stripslashes($agendamento2->tipo);
                                                    $id = stripslashes($agendamento2->id);
                                                
                                                ?>
                                                <tr>
                                                    <td><?php echo $nome?></td>
                                                    <td><?php echo date("d/m/Y", strtotime($data))?></td>
                                                    <td><?php echo $horario?></td>
                                                    <td><?php echo $tipo?></td>
                                                    <td><a href="options/engine.php?action=del_noiva&id=<?php echo $id ?>" onclick="return confirm('Confirma a exclusão desse agendamento?')" class="btn btn-primary opcao">Excluir</a></td>
                                                </tr>

                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav>
                        <p class="copyright text-center">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            Gabriela Xavier, Maycow Pavani, Talles Antonelli.
                        </p>
                    </nav>
                </div>
            </footer>
        </div>
    </div>
</body>
<script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/js/plugins/bootstrap-switch.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<script src="../assets/js/plugins/chartist.min.js"></script>
<script src="../assets/js/plugins/bootstrap-notify.js"></script>
<script src="../assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<script src="../assets/js/demo.js"></script>
</html>
