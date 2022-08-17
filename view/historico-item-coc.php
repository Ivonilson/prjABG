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
	<meta name="robots" content="noindex, nofollow">
	<title>Histórico Item COC  <?=$historicoItem['item']?></title>
	<?php require_once 'includes/bootstrap-css.php'; ?>
</head>
<body class="bg-dark fixed-nav sticky-footer" id="page-top">
	<!-- NAVEGAÇÃO -->
	<?php require_once 'includes/navegacao.php';?>
	
	<div class="content-wrapper">
		<div class="container-fluid">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					Início
				</li>
				<li class="breadcrumb-item">
					<mark class="p-2 rounded">Histórico Item COC</mark>
				</li>
			</ol>
			<div class="col bg-secondary">
				
				<div class="container">

					<div class="jumbotron jumbotron-fluid text-white text-center" style="background-color: #2F4F4F !important">
						<div class="container">
							<h4>Histórico Item COC n° <?=$_GET['item-historico']?></h4>
						</div>
					</div>

					<div class="align-items-center">

					<div class="col bg-light p-3">
					<hr>
					<h4 class="col text-info text-center">Informações de Cadastro</h4> 
					<hr>
					<br> <span class="text-dark font-weight-bold">Item n°: <?=$historicoItem['item']?> - <?=$historicoItem['versao']?>
					<br><br>

							<?php
								if($historicoItem['usuario'] != NULL) {
							?>
								<label class="text-dark">Item cadastrado por: <label class="text-danger font-weight-bold"><?=$historicoItem['usuario']?></label></label><br>
							<?php
								} else {
							?>
								<label class="text-dark">Item cadastrado por: <label class="text-danger font-weight-bold">Não registrado.</label></label><br>
							<?php 
								}
							?>

							<?php 
								if($historicoItem['data_cadastro'] != NULL && $historicoItem['data_cadastro'] != '0000-00-00 00:00:00') {
							?>	
								<label class="text-dark">Data e hora da inclusão: <label class="text-danger"><?=date_format(date_create($historicoItem['data_cadastro']), "d/m/Y"." à\s "."H:i:s")?></label></label><br>
							<?php
								} else {
							?>
								<label class="text-dark">Data e hora da inclusão: <label class="text-danger">Não registrado.</label></label><br>
							<?php
								}
							?>
							<br>
							<hr>
							<h4 class="col text-danger text-center">Registro das Alterações</h4>
							<hr>
							<br>
							<?="<div class='bg-light p-2'><span class='text-dark'>".$historicoItem['alteracoes']."</span></div>"?>
							<!--<a href="/?pagina=<?=filter_input(INPUT_GET, 'form')?>"><button class="btn btn-info float-right text-light p-2 border-rounded font-weight-bold">VOLTAR</button></a>-->
						</span>
					</div>

				</div>
			</div>
		</div>

		<?php require_once 'includes/rodape.php';?>
			
	</div>
	</div>

	<?php require_once 'includes/bootstrap-js.php'; ?>
</body>
</html>