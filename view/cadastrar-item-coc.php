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
	<title>Novo Item COC</title>
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
					Registros
				</li>
				<li class="breadcrumb-item">
					<mark class="p-2 rounded">Cadastrar Item COC</mark>
				</li>
				
			</ol>

					<!--Feedback do Cadastro -->
					<?php

						if($mensagem_erro == "Item cadastrado com Sucesso!")
						{
					?>

					<div class="alert alert-success font-weight-bold alertaCadOsOk col-12 text-center" role="alert">
 						<img src="../assets/ok.png"><h5><strong><?=$mensagem_erro?></strong></h5>
					</div>

					<?php 
						} elseif($mensagem_erro == "ERRO. Verifique se o item do COC que está tentando cadastrar já exista no sistema ou contate o Suporte.") {
					?>

					<div class="alert alert-warning font-weight-bold text-danger alertaCadOsNoOk col-12 text-center" role="alert">
 						<img src="../assets/error.png"><h5><strong><?=$mensagem_erro?></strong></h5>
					</div>

					<?php 
						} 
					?>
	
			<div id="background-tela-cadastro">
				
				<form class="container background-form-cadastro" method="post">

					<div id="jumbotron_telas_cadastro">
						<div class="container ">
							<h4>Cadastrar Item COC</h4>
						</div>
					</div>

					<div class="form-row align-items-center">

						<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputItem">Nº DO ITEM</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputItem" placeholder="Digite o n° do item" name="ipt-item" required>
						</div>

                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputVersao">Versão</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputVersao" placeholder="Versão" name="ipt-versao" required>
						</div>

                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputTitulo">Título</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputTitulo" placeholder="Título" name="ipt-titulo" required>
						</div>

                        <div class="col-12">
							<label class="sr-only" for="inlineFormInputDescricao">DESCRIÇÃO</label>
							<textarea type="text" class="form-control mb-2" id="inlineFormInputDescricao" cols="100" rows="3" placeholder="Descrição conforme COC (copia e cola)" name="ta-descricao-cot"></textarea>
						</div>

                        <div class="col-12">
							<label class="sr-only" for="inlineFormInputObservacoes">OBSERVAÇÕES</label>
							<textarea type="text" class="form-control mb-2" id="inlineFormInputObservacoes" cols="100" rows="3" placeholder="Observações" name="ta-observacoes-cot"></textarea>
						</div>

						<input type="submit" name="" id="botoesGravarCad" value="Gravar Item COC" name="btnCadastrar" onmouseover="hoverOverBtnGravarCad()" onmouseout="hoverOutBtnGravarCad()">

					</div>

					</div>
				</form>
			</div>

			<?php require_once 'includes/rodape.php';?>
			
		</div>
	</div>

	<?php require_once 'includes/bootstrap-js.php'; ?>
</body>
</html>