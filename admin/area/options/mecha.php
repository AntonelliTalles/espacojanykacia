<?php 

require '../../connect.php';

if(!empty($_GET['data'])){
  $data = $_GET['data'];
} else {
  $data = date('Y-m-d');
}

$sql = $mysqli->query("SELECT * FROM `horario` WHERE `data` = '$data'");

$agenda = ['09:00', '09:15', '09:30', '09:45','10:00', '10:15', '10:30', '10:45',
'11:00', '11:15', '11:30', '11:45','12:00', '12:15', '12:30', '12:45',
'13:00', '13:15', '13:30', '13:45','14:00', '14:15', '14:30', '14:45',
'15:00', '15:15', '15:30', '15:45','16:00', '16:15', '16:30', '16:45',
'17:00', '17:15', '17:30', '17:45','18:00', '18:15', '18:30'];

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
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../../assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <link href="../../assets/css/demo.css" rel="stylesheet" />
    <link href="../../assets/css/style.css" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-image="../../assets/img/sidebar-5.jpg">
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="#" class="simple-text">
                        Espaço Jany Kacia
                    </a>
                </div>
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../opcao.php">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Agendar Horário</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="../tabela_agendamentos.php">
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
                      <div class="container">
                        <br><br><h3 class="scissors text-center" style="margin-bottom: 0">Escolha o melhor horário para seu agendamento</h3><br><br>
                            <form action="mecha.php" method="get">

                              <div class="col-md-6" class="form-group">
                                <label for="data">Seleciona a data:</label>
                                <input type="date" class="form-control data-menor" name="data" value="<?php echo date("Y-m-d", strtotime($data))?>" oninput="submit()" >
                              </div>
                            </form>
                        </div>
                      </div>
                    </div>
                    <div class="container"><br><br><br><br></div>

                    <div class="row">
                      <div class="container">
                        <form action="engine.php" method="post">

                          <input type="hidden" name="tipo" value="mecha">

                          <div class="col-md-12" class="form-group">
                              <label for="nome">Nome Completo:</label>
                              <input type="text" class="form-control" name="nome" required>
                          </div>

                          <div class="col-md-6" class="form-group">
                              <label for="telefone">Telefone/Celular:</label>
                              <input type="text" class="form-control" name="telefone"required>
                          </div>

                          <div class="col-md-6" class="form-group">
                              <label for="email">E-mail</label>
                              <input type="text" class="form-control" name="email" placeholder="Campo não obrigatório">
                          </div>

                          <div class="col-md-6" class="form-group">
                            <label for="data">Data</label><br>
                            <label class="data-agendamento" for="data"><?php echo date("d/m/Y", strtotime($data))?></label>
                            <input type="hidden" class="form-control" name="data" value="<?php echo date("Y-m-d", strtotime($data))?>">
                          </div>

                          <!-- ########################################################## -->
                          <br><br>
                          <div style="margin-left: 30px">
                          <h3 style="margin-left: -10px">Escolha o horário:</h3><br>

                          <?php  

                          $i = 0;
                                          
                          $i = 0;
                                          
                          while ($hora = $sql->fetch_object()) {

                            $i = 0;

                            $agenda[$i] = date('H:i:s', strtotime($agenda[$i]));

                            $hr = stripslashes($hora->hora);

                            while($i <= 38) {
                              $agenda[$i] = date('H:i:s', strtotime($agenda[$i]));
                              if($hr == $agenda[$i]) {
                                $agenda[$i] = date('H:i:s', strtotime('00:00:00'));
                              }

                              $i++;
                            }

                          }

                          $i = 0;

                          while($i <= 38) {
                            
                            if($agenda[$i] != date('H:i:s', strtotime('00:00:00')) && date("l", strtotime($data)) != "Monday" && date("l", strtotime($data)) != "Sunday" && date("Y-m-d", strtotime($data)) >= date('Y-m-d')){ ?>

                              <input type="submit" onclick="return confirm('Confirma o agendamento do horário?')" style="color: black" class="btn btn-primary opcao2" name="horario" value="<?php echo date('H:i', strtotime($agenda[$i])) ?>">
                              
                          <?php }  ?>


                          <?php $i++; }

                          if(date("l", strtotime($data)) == "Monday") {
                          echo "<h1><b>Não agendamos horários às Segundas-Feiras!</b></h1>";
                          } elseif(date("l", strtotime($data)) == "Sunday") {
                          echo "<h1><b>Não agendamos horários aos Domingos!</b></h1>"; 
                          }

                          ?>
                          </div>
                        </form>
                      </div>
                    </div>
                    <br><br>
                    <a href="../opcao.php" class="btn btn-danger">Voltar</a>
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
<script src="../../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<script src="../../assets/js/plugins/bootstrap-switch.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<script src="../../assets/js/plugins/chartist.min.js"></script>
<script src="../../assets/js/plugins/bootstrap-notify.js"></script>
<script src="../../assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<script src="../../assets/js/demo.js"></script>
</html>
