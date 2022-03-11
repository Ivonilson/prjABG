<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
	<link href="css/signin.css" rel="stylesheet">
	<link rel="icon" href="assets/abgoficial.ico">
	<title>Login</title>
</head>
<body class="text-center">

	<form class="form-signin bg-light border rounded" method="post" action="../index.php/?pagina=demandas-do-dia">
      <img class="mb-4" src="assets/abgoficial.png" alt="Abg Soluções" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal text">Área Restrita</h1>

     <div class="form-group">
        <label for="exampleInputEmail1" class="sr-only">Usuário</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="usuario" aria-describedby="Usuário" placeholder="Usuário">
      </div>

      <div class="form-group">
        <label for="exampleInputPassword1" class="sr-only">Senha</label>
        <input type="password" class="form-control" id="exampleInputPassword1"  name="senha" placeholder="Senha">
      </div>

      <button class="btn btn-lg btn-primary btn-block" type="submit">Acessar</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
  </form>
</body>
</html>