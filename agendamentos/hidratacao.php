<?php 

require '../admin/connect.php';

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

<!doctype html>
<html lang="en">

  <head>
    <title>Jany Kacia</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=DM+Sans:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../fonts/icomoon/style.css">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="../css/aos.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="../css/style.css">

  </head>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    
    <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>



      <header class="site-navbar site-navbar-target" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">

            <div class="col-3 ">
              <!-- <div class="site-logo">
                <a href="../index.html"><img src="../images/jk.png" style="max-width: 100px"></a>
              </div> -->
            </div>

            <div class="col-9  text-right">
              

              <span class="d-inline-block d-lg-none"><a href="#" class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span class="icon-menu h3 text-white"></span></a></span>

              

              <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto ">
                  <li><a href="../index.html" class="nav-link">Home</a></li>
                  <li><a href="../servicos.html" class="nav-link">Serviços</a></li>
                  <li><a href="../opcao.html" class="nav-link">Agende seu horário</a></li>
                  <!-- <li><a href="../sobre.html" class="nav-link">Sobre Nós</a></li> -->
                  <li><a href="../contato.html" class="nav-link">Contato</a></li>
                </ul>
              </nav>
            </div>

            
          </div>
        </div>

      </header>

    <div class="site-section bg-light" id="contact-section">
        <div class="row">
          <div class="container">
          <br><br><h3 class="scissors text-center" style="margin-bottom: 0">Escolha o melhor horário para seu agendamento</h3><br><br>
              <form action="hidratacao.php" method="get">

                <div class="col-md-6" class="form-group">
                  <label for="data">Selecione a data:</label>
                  <input type="date" class="form-control data-menor" name="data" value="<?php echo date("Y-m-d", strtotime($data))?>" oninput="submit()" >
                </div>

                <!-- <div class="col-md-6" class="form-group">
                  <input type="submit" class="btn btn-primary estilo" value="Verificar Horários Disponíveis">
                </div> -->

              </form>
          </div>
        </div>
      </div>
    </div>
    <!-- <hr> -->

    <div class="site-section bg-light" id="contact-section">
        <div class="row">
          <div class="container">
              <form action="../engine/agendar.php" method="post">

                <input type="hidden" name="tipo" value="hidratação">

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

                    <input type="submit" onclick="return confirm('Confirma o agendamento do horário?')" style="color: white" class="btn btn-primary opcao2" name="horario" value="<?php echo date('H:i', strtotime($agenda[$i])) ?>">
                    
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
      </div>
    </div>

    <footer class="site-footer">
      <div class="container">
              <p>
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
            </p>
      </div>
    </footer>

    </div>

    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/jquery-migrate-3.0.0.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/jquery.sticky.js"></script>
    <script src="../js/jquery.waypoints.min.js"></script>
    <script src="../js/jquery.animateNumber.min.js"></script>
    <script src="../js/jquery.fancybox.min.js"></script>
    <script src="../js/jquery.stellar.min.js"></script>
    <script src="../js/jquery.easing.1.3.js"></script>
    <script src="../js/bootstrap-datepicker.min.js"></script>
    <script src="../js/aos.js"></script>

    <script src="../js/main.js"></script>

  </body>

</html>

