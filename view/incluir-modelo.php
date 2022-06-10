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
	<title>Incluir Novo Modelo</title>
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
					Repositório
				</li>
				<li class="breadcrumb-item">
					<mark class="p-2 rounded">Incluir Novo Modelo</mark>
				</li>

				<div class="col">
					<a href="/?pagina=modelos" class="btn btn-danger text-light  float-right font-weight-bold rounded" title="Pesquisar modelos"><i class="fa fa-search"></i> Modelos</a>
				</div>
			</ol>

			<div class="row bg-secondary">
				
				<form class="container" method="post" enctype="multipart/form-data">

					<div class="jumbotron jumbotron-fluid bg-dark text-white">
						<div class="container">
							<h4>Incluir Novo Modelo</h4>
						</div>
					</div>

					<div class="form-row align-items-center">

						<div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputOs">Nº O.S</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputOs" placeholder="Nº O.S" name="ipt-os" required>
						</div>

						<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<label class="input-group-text bg-secondary text-white" for="select-banco">
										BANCO
									</label>
								</div>
								<select class="custom-select" name="sel-banco" id="select-banco">
									<option value="-">Selecione</option>
									<option value="BANCO DO BRASIL">BANCO DO BRASIL</option>
									<option value="CEF">CEF</option>
									<option value="BRB">BRB</option>
									<option value="POUPEX/FHE">POUPEX/FHE</option>
									<option value="BANCO INTER">BANCO INTER</option>
									<option value="PARTICULAR/OUTRO">PARTICULAR/OUTRO</option>
								</select>
							</div>
						</div>

						<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<label class="input-group-text bg-secondary text-white" for="select-empresa">
										EMPRESA
									</label>
								</div>
								<select class="custom-select" name="sel-empresa" id="select-empresa">
									<option value="-">Selecione</option>
									<option value="MAMCK">MAMCK</option>
									<option value="HAVALIA">HAVALIA</option>
									<!--<option value="MOREIRA">MOREIRA</option>-->
								</select>
							</div>
						</div>

						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<label class="input-group-text bg-secondary text-white" for="select-tipologia">
										TIPOLOGIA
									</label>
								</div>
								<select class="custom-select" name="sel-tipologia" id="select-tipologia">
									<option value="-">Selecione</option>
									<option value="CASA">CASA</option>
									<option value="APARTAMENTO">APARTAMENTO</option>
									<option value="COBERTURA">COBERTURA</option>
									<option value="SALA COMERCIAL">SALA COMERCIAL</option>
									<option value="LOJA">LOJA</option>
									<option value="PRÉDIO INTEIRO">PRÉDIO INTEIRO</option>
									<option value="TERRENO">TERRENO</option>
									<option value="GALPÃO">GALPÃO</option>
									<option value="VAGA DE GARAGEM">VAGA DE GARAGEM</option>
									<option value="ATM">ATM</option>
								</select>
							</div>
						</div>

					</div>

					<div class="form-row align-items-center">

						<div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
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

						<div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputComplemento">COMPLEMENTO</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputComplemento" placeholder="Complemento" name="ipt-complemento" required>
						</div>

						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputArquivo">Arquivo</label>
							<input type="file" accept=".sda" class="form-control mb-2 pb-5 pt-3" id="inlineFormInputArquivo" placeholder="Upload modelo" name="ipt-up-modelo" required>
						</div>

					</div>

					<div class="form-row align-items-center">

						<div class="col-12">
							<label class="sr-only" for="inlineFormInputObservacoesComplementares">OBSERVAÇÕES</label>
							<textarea type="text" class="form-control mb-2" id="inlineFormInputObservacoesComplementares" cols="100" rows="3" placeholder="Observações" name="ta-observacoes"></textarea>
						</div>

						<input type="submit" name="" class="col-12 btn btn-dark btn-block text-white" value="GRAVAR" name="btnIncluirModelo">

					</div>

				</form>
			</div>

			<?php require_once 'includes/rodape.php';?>
			
		</div>
	</div>

	<?php require_once 'includes/bootstrap-js.php'; ?>
</body>
</html>