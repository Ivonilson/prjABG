<?php
	if ($_SESSION['user'] == null || !isset($_SESSION['user'])) {
		//header('Location: index.php');
		echo "<script>window.location.href ='/'</script>";
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Hist. Modelo</title>
	<?php require_once 'includes/bootstrap-css.php'; ?>
</head>
<body class="bg-dark fixed-nav sticky-footer" id="page-top">
	<!-- NAVEGAÇÃO -->
	<?php require_once 'includes/navegacao.php';?>
	
	<div class="content-wrapper">
		<div class="container-fluid">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="?pagina=modelos" class="text-decoration-none">Início</a>
				</li>
				<li class="breadcrumb-item">
					<mark class="p-2 rounded">Histórico do Modelo</mark>
				</li>
			</ol>
			<div class="col bg-secondary">
				
				<div class="container">

					<div class="jumbotron jumbotron-fluid bg-dark text-white">
						<div class="container">
							<h4>Histórico do Modelo</h4>
							<!--<a href="/?pagina=<?=filter_input(INPUT_GET, 'form')?>"><button class="btn btn-info float-right text-light p-2 border-rounded font-weight-bold">VOLTAR</button></a>-->
						</div>
					</div>

					<div class="align-items-center">

					<?php 

						if ($_SESSION['user']){

						$usuarioAlteracao = new HistoricoModelo();
						$registroAlteracao = $usuarioAlteracao->registroAlteracoes();

						//var_dump($registroAlteracao);	

						}
							
					?>

					<div class="col bg-light p-3">

					<h5 class="col text-primary text-center">HISTÓRICO DO MODELO</h5> <br> <span class="text-info font-weight-bold">

							<?php
								if($registroAlteracao['usuario']!= NULL) {
							?>
								
							<?php
								} else {
							?>
								<label class="text-dark">Modelo cadastrado por: <label class="text-danger font-weight-bold">Não registrado.</label></label><br>
							<?php 
								}
							?>

							<?php 
								if($registroAlteracao['data_criacao'] != NULL && $registroAlteracao['data_criacao'] != '0000-00-00 00:00:00') {
							?>	
								<label class="text-dark">Data e hora da inclusão: <label class="text-danger"><?=date_format(date_create($registroAlteracao['data_criacao']), "d/m/Y"." à\s "."H:i:s")?></label></label><br>
							<?php
								} else {
							?>
								<label class="text-dark">Data e hora da inclusão: <label class="text-danger">Não registrado.</label></label><br>
							<?php
								}
							?>
							<br>
							<hr>
							<h6 class="text-danger text-center font-weight-bold">REGISTRO DAS ALTERAÇÕES</h6>
							<hr>
							<br>
							<?="<div class='bg-light p-2'><span class='text-dark'>".$registroAlteracao['alteracoes']."</span></div>"?>
							<!--<a href="/?pagina=<?=filter_input(INPUT_GET, 'form')?>"><button class="btn btn-info float-right text-light p-2 border-rounded font-weight-bold">VOLTAR</button></a>-->
						</span>
					</div>

				</div>
			</div>
		</div>

		<!-- rodapé -->
		<?php require_once 'includes/rodape.php';?>
			
	</div>
	</div>

	<?php require_once 'includes/bootstrap-js.php'; ?>
</body>
</html>