<?php 

require '../admin/connect.php';

if(!empty($_GET['data'])){
  $data = $_GET['data'];
} else {
  $data = date('Y-m-d');
}

$sql = $mysqli->query("SELECT * FROM `horario` WHERE tipo = 'coloração' AND `data` = '$data'");

$agenda = ['09:00', '09:15', '09:30', '09:45','10:00', '10:15', '10:30', '10:45',
'11:00', '11:15', '11:30', '11:45','12:00', '12:15', '12:30', '12:45',
'13:00', '13:15', '13:30', '13:45','14:00', '14:15', '14:30', '14:45',
'15:00', '15:15', '15:30', '15:45','16:00', '16:15', '16:30', '16:45',
'17:00', '17:15', '17:30', '17:45','18:00', '18:15', '18:30'];

// echo date("d/m/Y");
// exit;

// $i = 0;
                                
// while ($hora = $sql->fetch_object()) {

//   $i = 0;

//   $agenda[$i] = date('H:i:s', strtotime($agenda[$i]));

//   $hr = stripslashes($hora->hora);

//   while($i <= 38) {
//     $agenda[$i] = date('H:i:s', strtotime($agenda[$i]));
//     if($hr == $agenda[$i]) {
//       echo $hr.' - '.$agenda[$i];
//       $agenda[$i] = date('H:i:s', strtotime('00:00:00'));
//     }
//     // if($agenda[$i] == '00:00:00') {
//     //   unset($agenda[$i]);
//     // }
//     $i++;
//   }

// }

// var_dump($agenda);
// exit;

?>

<!doctype html>
<html lang="en">

  <head>
    <title>Salão TCC</title>
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

   <!--  <div class="ftco-blocks-cover-1">
      <div class="site-section-cover overlay" style="background-image: url('images/hero_1.jpg')">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-7">
              <h1 class="mb-3">Mais que apenas um corte</h1>
              <p>Os melhores cuidados para a sua beleza.</p>
              <p><a href="#" class="btn btn-primary">Saiba Mais</a></p>
            </div>
          </div>
        </div>
      </div>
    </div> -->

    <div class="site-section bg-light" id="contact-section">
        <div class="row">
          <div class="container">
              <form action="coloracao.php" method="get">

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

    <div class="site-section bg-light" id="contact-section">
        <div class="container">
          <h3 class="scissors text-center" style="margin-bottom: 0">Escolha o melhor horário para seu agendamento</h3>
        </div>
        <div class="row">
          <div class="container">
              <form action="../engine/agendar.php" method="post">

                <input type="hidden" name="tipo" value="coloração">

                <div class="col-md-12" class="form-group">
                    <label for="nome">Nome Completo:</label>
                    <input type="text" class="form-control" name="nome">
                </div>

                <div class="col-md-6" class="form-group">
                    <label for="telefone">Telefone/Celular:</label>
                    <input type="text" class="form-control" name="telefone">
                </div>

                <div class="col-md-6" class="form-group">
                    <label for="email">E-mail</label>
                    <input type="text" class="form-control" name="email">
                </div>

                <div class="col-md-6" class="form-group">
                  <label for="data">Data</label>
                  <input type="date" class="form-control" name="data" value="<?php echo date("Y-m-d", strtotime($data))?>">
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
                    // if($agenda[$i] == '00:00:00') {
                    //   unset($agenda[$i]);
                    // }
                    $i++;
                  }
                
                }

                $i = 0;

                while($i <= 38) {
                  
                  if($agenda[$i] != date('H:i:s', strtotime('00:00:00')) && date("l", strtotime($data)) != "Monday" && date("l", strtotime($data)) != "Sunday" && date("Y-m-d", strtotime($data)) >= date('Y-m-d')){ ?>

                    <input type="submit" class="btn btn-primary opcao2" name="horario" value="<?php echo date('H:i', strtotime($agenda[$i])) ?>">
                    
                 <?php }  ?>


               <?php $i++; }

               if(date("l", strtotime($data)) == "Monday") {
                echo "<h1><b>Não agendamos horários às Segundas-Feiras!</b></h1>";
               } elseif(date("l", strtotime($data)) == "Sunday") {
                echo "<h1><b>Não agendamos horários aos Domingos!</b></h1>"; 
               }

                ?>

                <!-- <input type="submit" class="form-group cadastrar" name="horario" value="09:00">
                <input type="submit" class="form-group cadastrar" name="horario" value="09:15">
                <input type="submit" class="form-group cadastrar" name="horario" value="09:30">
                <input type="submit" class="form-group cadastrar" name="horario" value="09:45">
                <input type="submit" class="form-group cadastrar" name="horario" value="10:00">
                <input type="submit" class="form-group cadastrar" name="horario" value="10:15">
                <input type="submit" class="form-group cadastrar" name="horario" value="10:30">
                <input type="submit" class="form-group cadastrar" name="horario" value="10:45">
                <input type="submit" class="form-group cadastrar" name="horario" value="11:00">
                <input type="submit" class="form-group cadastrar" name="horario" value="11:15">
                <input type="submit" class="form-group cadastrar" name="horario" value="11:30">
                <input type="submit" class="form-group cadastrar" name="horario" value="11:45">
                <input type="submit" class="form-group cadastrar" name="horario" value="12:00">
                <input type="submit" class="form-group cadastrar" name="horario" value="12:15">
                <input type="submit" class="form-group cadastrar" name="horario" value="12:30">
                <input type="submit" class="form-group cadastrar" name="horario" value="12:45">
                <input type="submit" class="form-group cadastrar" name="horario" value="13:00">
                <input type="submit" class="form-group cadastrar" name="horario" value="13:15">
                <input type="submit" class="form-group cadastrar" name="horario" value="13:30">
                <input type="submit" class="form-group cadastrar" name="horario" value="13:45">
                <input type="submit" class="form-group cadastrar" name="horario" value="14:00">
                <input type="submit" class="form-group cadastrar" name="horario" value="14:15">
                <input type="submit" class="form-group cadastrar" name="horario" value="14:30">
                <input type="submit" class="form-group cadastrar" name="horario" value="14:45">
                <input type="submit" class="form-group cadastrar" name="horario" value="15:00">
                <input type="submit" class="form-group cadastrar" name="horario" value="15:15">
                <input type="submit" class="form-group cadastrar" name="horario" value="15:30">
                <input type="submit" class="form-group cadastrar" name="horario" value="15:45">
                <input type="submit" class="form-group cadastrar" name="horario" value="16:00">
                <input type="submit" class="form-group cadastrar" name="horario" value="16:15">
                <input type="submit" class="form-group cadastrar" name="horario" value="16:30"> -->
              </div>
              </form>
          </div>
        </div>
      </div>
    </div>

    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <img src="../images/make1.jpg" alt="Image" class="img-fluid mb-5">
            <h2 class="footer-heading mb-3">About Us</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
          </div>
          <div class="col-lg-8 ml-auto">
            <div class="row">
              <div class="col-lg-6 ml-auto">
                <h2 class="footer-heading mb-4">Quick Links</h2>
                <ul class="list-unstyled">
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Testimonials</a></li>
                  <li><a href="#">Terms of Service</a></li>
                  <li><a href="#">Privacy</a></li>
                  <li><a href="#">Contact Us</a></li>
                </ul>
              </div>
              <div class="col-lg-6">
                <h2 class="footer-heading mb-4">Newsletter</h2>
                <form action="#" class="d-flex" class="subscribe">
                  <input type="text" class="form-control mr-3" placeholder="Email">
                  <input type="submit" value="Send" class="btn btn-primary">
                </form>
              </div>
              
            </div>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
              <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
            </div>
          </div>

        </div>
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

