<?php
	if ($_SESSION['user'] == null || !isset($_SESSION['user']) || $_SESSION['user'] != 'IVONILSON') {
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
	<title>Atualizando gastos</title>
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
					<mark class="p-2 rounded">Atualizando gastos</mark>
				</li>
				<div class="col  mt-2">
					<a href="/?pagina=gastos-viagem" class="btn btn-info text-light  float-right font-weight-bold rounded" title="Ver gastos"><i class="fa fa-dollar"></i> Ver gastos</a>
				</div>
			</ol>

					<!--Feedback do Cadastro -->
					<?php

						if($mensagem == "Gasto atualizado com sucesso!")
						{
					?>

					<div class="alert alert-success font-weight-bold alertaCadOsOk col-12 text-center" role="alert">
 						<img src="../assets/ok.png"><h5><strong><?=$mensagem?></strong></h5>
					</div>

					<?php 

                        echo "<script>setTimeout(()=> window.location.href = '/?pagina=".$_GET['form']."', 3000)</script>";

						} elseif($mensagem == "ERRO. Contate o Suporte.") {
					?>

					<div class="alert alert-warning font-weight-bold text-danger alertaCadOsNoOk col-12 text-center" role="alert">
 						<img src="../assets/error.png"><h5><strong><?=$mensagem?></strong></h5>
					</div>

					<?php 
						} 
					?>
	
			<div id="background-tela-cadastro">
				
				<form class="container background-form-cadastro" method="post">

					<div id="jumbotron_telas_cadastro">
						<div class="container ">
							<h4>Atualizar registro n° <?=$registro->id?></h4>
						</div>
					</div>

					<div class="form-row align-items-center">

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputId">Id</label>
							<input type="hidden" class="form-control mb-2" id="inlineFormInputId"  name="ipt-id" value="<?=$registro->id?>">
                            <input type="text" disabled class="form-control mb-2" id="inlineFormInputId" name="ipt-id" value="<?=$registro->id?>">
						</div>

						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputOs">Descrição</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputOs"  name="ipt-descricao" value="<?=$registro->descricao?>">
						</div>

                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputOs">Valor</label>
							<input type="number"  min="1" max="999999" step="0.01"  class="form-control mb-2" id="inlineFormInputOs" name="ipt-valor" value="<?= number_format($registro->valor, 2, '.' , '')?>">
						</div>

                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<label class="lbl-cadastro" for="select-forma">
										Forma de Pagamento
									</label>
								</div>
								<select class="custom-select" name="sel-forma-pagamento" id="select-forma">
									<option value="<?=$registro->forma_pagamento?>"><?=$registro->forma_pagamento?></option>
                                    <option value="DINHEIRO">DINHEIRO</option>
									<option value="CARTÃO DE CRÉDITO">CARTÃO DE CRÉDITO</option>
									<option value="CARTÃO DE DÉBITO">CARTÃO DE DÉBITO</option>
									<option value="PIX">PIX</option>
                                    <option value="OUTRO">OUTRO</option>
								</select>
							</div>
						</div>

                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2 border">
								<div class="input-group-prepend">
									<label class="input-group-text bg-secondary text-white" for="inlineRadioPagador">IVONILSON</label>
								</div>
								<input type="radio" <?php if($registro->pagador == 'IVONILSON') {echo "checked";} ?> class="form-control mt-1 mb-1 reset" id="inlineRadioPagador" name="radio-btn-pagador" value="IVONILSON">
							</div>
						</div>

                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2 border">
								<div class="input-group-prepend">
									<label class="input-group-text bg-secondary text-white" for="inlineRadioPagador">REGINA</label>
								</div>
								<input type="radio" <?php if($registro->pagador == 'REGINA') {echo "checked";} ?> class="form-control mt-1 mb-1 reset" id="inlineRadioPagador" name="radio-btn-pagador" value="REGINA">
							</div>
						</div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputEstabelecimento">Estabelecimento</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputEstabelecimento" placeholder="Nome do estabelecimento" name="ipt-estabelecimento" value="<?=$registro->estabelecimento?>">
						</div>

                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputCidadeUf">Cidade/UF</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputCidadeUf" placeholder="Cidade/UF" name="ipt-cidadeUf" value="<?=$registro->cidade_uf?>">
						</div>

                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputDataDespesa">Data despesa</label>
							<input type="date" class="form-control mb-2" id="inlineFormInputDataDespesa" placeholder="Data da despesa" name="ipt-dataDespesa" value="<?=$registro->data_despesa?>">
						</div>

                        <div class="input-group col-auto mt-1">
							<label class="sr-only" for="lbl-observacoes">Observações</label>
							<textarea type="text" class="form-control mb-2" id="lbl-observacoes" cols="100" rows="3"name="ta-observacoes"><?=$registro->observacoes?></textarea>
						</div>

						<input type="submit" name="" id="botoesGravarCad" value="Gravar" name="btnCadastrar" onmouseover="hoverOverBtnGravarCad()" onmouseout="hoverOutBtnGravarCad()">

					</div>
				</form>
			</div>

			<?php require_once 'includes/rodape.php';?>
			
		</div>
	</div>

	<?php require_once 'includes/bootstrap-js.php'; ?>
</body>
</html>