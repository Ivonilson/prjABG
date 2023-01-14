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
	<title>Cadastro de Notificacões</title>
	<?php require_once 'includes/bootstrap-css.php'; ?>
</head>
<body class="bg-dark fixed-nav sticky-footer" id="page-top">
	<!-- NAVEGAÇÃO -->
	<?php require_once 'includes/navegacao.php';?>
	
	<div class="content-wrapper">
		<div class="container-fluid">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="?pagina=demandas-do-dia" class="text-decoration-none">Início</a>
				</li>
				<li class="breadcrumb-item">
					Registros
				</li>
				<li class="breadcrumb-item">
					<mark class="p-2 rounded">Cadastrar Notificação</mark>
				</li>
			</ol>

					<!--Feedback do Cadastro -->
					<?php

						if($mensagem_erro == "Notificação cadastrada com Sucesso!")
						{
					?>

					<div class="alert alert-success font-weight-bold alertaCadOsOk col-12 text-center" role="alert">
 						<img src="../assets/ok.png"><h5><strong><?=$mensagem_erro?></strong></h5>
					</div>

					<?php 
						} elseif($mensagem_erro == "ERRO. Verifique as informações de entrada e tente novamente ou contate o Suporte.") {
					?>

					<div class="alert alert-danger font-weight-bold text-dark alertaCadOsNoOk col-12 text-center" role="alert">
 						<img src="../assets/error.png"><h5><strong><?=$mensagem_erro?></strong></h5>
					</div>

					<?php 
						} 
					?>
	
			<div id="background-tela-cadastro">
				
				<form class="container background-form-cadastro" method="post">

					<div id="jumbotron_telas_cadastro">
						<div class="container">
							<h4>Cadastrar Notificação</h4>
						</div>
					</div>

					<div class="form-row align-items-center">

					<!--
						<div class="input-group col-auto">
							<div class="input-group-prepend">
								<label class="lbl-cadastro" for="lbl-sel-tipo">
									Tipo
								</label>
							</div>
							<select name="sel-tipo" class="custom-select" id="lbl-sel-tipo" >
								<option value="-">Selecione</option>
								<option value="PESSOA FÍSICA">PESSOA FÍSICA</option>
								<option value="PESSOA JURÍDICA">PESSOA JURÍDICA</option>
								<option value="OUTROS">OUTROS</option>
							</select>
						</div>
					-->

						<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputRemetente">Remetente</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputRemetente" placeholder="Remetente" name="ipt-remetente" required>
						</div>

						<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputDestinatario">Destinatário</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputDestinatario" placeholder="Destinatario" name="ipt-destinatario" required>
						</div>

						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputDescricao">Descrição</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputDescricao" placeholder="Descrição" name="ipt-descricao" required>
						</div>
			
						<div class="input-group col-lg-4 col-md-4 col-xs-12 col-sm-12 mt-1">
							<div class="input-group-prepend">
								<div class="lbl-cadastro">
									Data Limite
								</div>
							</div>
							<input type="date" class="form-control" name="ipt-data-limite">
						</div>

						<div class="input-group col-lg-4 col-md-4 col-xs-12 col-sm-12 mt-1">
							<div class="input-group-prepend">
								<div class="lbl-cadastro">
									Alertar em: 								</div>
							</div>
							<input type="date" class="form-control" name="ipt-data-programada" title="Data programada para pagamento/saneamento">
						</div>

						<div class="input-group col-4 mt-1">
							<div class="input-group-prepend">
								<label class="lbl-cadastro" for="lbl-sel-prioridade">
									Prioridade
								</label>
							</div>
							<select name="sel-prioridade" class="custom-select" id="lbl-sel-prioridade" >
								<option value="NORMAL">Selecione</option>
								<option value="NORMAL">NORMAL</option>
								<option value="ALTA">ALTA</option>
								<option value="BAIXA">BAIXA</option>
							</select>
						</div>

						<div class="input-group col-auto mt-1">
							<label class="sr-only" for="lbl-observacoes">Observações</label>
							<textarea type="text" class="form-control mb-2" id="lbl-observacoes" cols="100" rows="3" placeholder="Observações Complementares" name="ta-observacoes"></textarea>
						</div>

					</div>

					<input type="submit" name="" id="botoesGravarCad" value="Gravar Notificação" name="btnCadastrar" onmouseover="hoverOverBtnGravarCad()" onmouseout="hoverOutBtnGravarCad()">
				</form>
			</div>

			<?php require_once 'includes/rodape.php';?>
			
		</div>
	</div>

	<?php require_once 'includes/bootstrap-js.php'; ?>
</body>
</html>