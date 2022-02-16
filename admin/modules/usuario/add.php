<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  <title>Jany Kacia</title>

  <!-- Bootstrap core CSS -->
  <!-- <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->

  <!-- Custom styles for this template -->
  <!-- <link href="css/shop-item.css" rel="stylesheet"> -->

</head>
<h1 style="text-align: center">Efetuar Cadastro</h1>
<body>
	<title>Efetuar Cadastro</title>

	<form method="POST" action="/tcc/admin/modules/usuario/engine.php?action=add">  
		<div class="col-md-12">
			<div class="col-md-8">
				<div class="form-group">
					<label for="nome">Nome</label>
				    <input type="text" class="form-control" name="nome" id="nome" aria-describedby="emailHelp" placeholder="Seu Nome">
				</div>
			</div>
		</div>
		<!-- <input type="hidden" name="id_usuario" value="<?php echo $id_usuario ?>"> -->
		<div class="col-md-12">
			<div class="col-md-8">
				<div class="form-group">
					<label for="email">E-mail</label>
				    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Seu email">
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="col-md-8">
				<div class="form-group">
				    <label for="senha">Senha</label>
				    <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha">
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="col-md-2">
				  <button type="submit" class="btn btn-primary">Enviar</button>
			</div>
		</div>
	</form>
		<hr>
</body>
</html>