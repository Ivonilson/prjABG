<?php
	if ($_SESSION['user'] == NULL) {
		header('Location: index.php');
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Cadastro de eventos</title>
	<!--<link rel="stylesheet" type="text/css" href="../bibliotecas/bootstrap/css/bootstrap.min.css">-->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap2.min.css">
	<link rel="stylesheet" type="text/css" href="../bibliotecas/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/sb-admin.min.css">
</head>
<body class="bg-dark fixed-nav sticky-footer" id="page-top">
	<!-- NAVEGAÇÃO -->
	<?php
		include('navegacao.php');
	?>
	
	<div class="content-wrapper">
		<div class="container-fluid">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="?pagina=demandas-do-dia" class="text-decoration-none">Home</a>
				</li>
				<li class="breadcrumb-item">
					Registros
				</li>
				<li class="breadcrumb-item">
					Cadastrar Evento
				</li>
			</ol>
	
			<div class="row bg-secondary">
				
				<form class="container" method="post">

					<div class="jumbotron jumbotron-fluid bg-dark text-white">
						<div class="container">
							<h4>Cadastrar Evento</h4>
						</div>
					</div>

					<div class="form-row align-items-center">

						<?php
							$evento = new DadosAuxiliares();
							if($codigo = $evento->pesqCodigoEvento()){
								$valor = $codigo->cod_evento;
							} else {
								$valor = 0;
							}
							
							//var_dump($codigo);
						?>

						<div class="col-lg-1 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputOs">N° Evento</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputOs" placeholder="Cód. Evento" name="ipt-codigo-evento" disabled value="<?=++$valor?>">
						</div>

						<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<label class="input-group-text bg-secondary text-white" for="select-tipo">
										TIPO
									</label>
								</div>
								<select class="custom-select" name="sel-tipo-evento" id="select-tipo">
									<option value="-">Selecione</option>
									<option value="REUNIÃO ON-LINE">REUNIÃO ON-LINE</option>
									<option value="RENIÃO PRESENCIAL">REUNIÃO PRESENCIAL</option>
									<option value="LIVE">LIVE</option>
									<option value="VIAGEM">VIAGEM</option>
									<option value="OUTRO">OUTRO</option>
								</select>
							</div>
						</div>

						<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputProponente">DESCRIÇÃO</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputProponente" placeholder="Descrição do evento" name="ipt-descricao" required>
						</div>

						<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputProponente">LOCAL</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputProponente" placeholder="Local do evento" name="ipt-local" required>
						</div>

						<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputContato">CONTATO</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputContato" placeholder="Contato/Telefone/e-mail" name="ipt-contato" required>
						</div>

						<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<label class="input-group-text bg-secondary text-white" for="select-cidade">
										CIDADE
									</label>
								</div>
								<select class="custom-select" name="sel-cidade" id="select-cidade">
									<option value="-">Selecione</option>

									<?php 
										$cidade = new Cidade();
										$cidades = $cidade->carregaCidades();

										foreach ($cidades as $value) {
												
									?>
									<option value="<?=$value['nome_cidade']?>"><?=$value['nome_cidade']?></option>

									<?php 

										}

									?>

								</select>
							</div>
						</div>

						<div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<label class="input-group-text bg-secondary text-white" for="select-uf">
										UF
									</label>
								</div>

								<select class="custom-select" name="sel-uf" id="select-uf">
									<option value="--">Selecione</option>

									<?php 
										$uf = new Cidade();
										$ufs = $uf->carregaUfs();
										foreach ($ufs as $valueUf) {
												
									?>
									<option value="<?=$valueUf['uf']?>"><?=$valueUf['uf']?></option>

									<?php 
										}
									?>
								</select>
							</div>
						</div>

						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text bg-secondary text-white">
										DATA DO EVENTO
									</div>
								</div>
								<input type="date" class="form-control" name="ipt-data-evento">
							</div>
						</div>

						<div class="col-12">
							<label class="sr-only" for="inlineFormInputObservacoesComplementares">OBSERVAÇÕES</label>
							<textarea type="text" class="form-control mb-2" id="inlineFormInputObservacoesComplementares" cols="100" rows="3" placeholder="Observações Complementares" name="ta-observacoes"></textarea>
						</div>

						<input type="submit" name="" class="col-12 btn btn-dark btn-block text-white" value="GRAVAR" name="btnCadastrar">
				</form>
			</div>

			<?php  
				include ('rodape.php');
			?>
			
		</div>
	</div>

	<script src="../bibliotecas/jquery/jquery.min.js"></script>
	<script src="../bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="../bibliotecas/jquery-easing/jquery.easing.min.js"></script>
	<script type="text/javascript" src="../js/sb-admin.min.js"></script>
</body>
</html>