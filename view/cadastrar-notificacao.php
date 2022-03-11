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

						<div class="input-group col-auto mt-1">
							<div class="input-group-prepend">
								<label class="lbl-cadastro" for="lbl-sel-remetente">
									Remetente
								</label>
							</div>
							<select name="sel-remetente" class="custom-select" id="lbl-sel-remetente" >
								<option value="-">Selecione</option>
								<option value="FENIX CONTABILIDADE">FENIX CONTABILIDADE</option>
								<option value="CREA">CREA</option>
								<option value="OUTROS">OUTROS</option>
							</select>
						</div>

						<div class="input-group col-auto mt-1">
							<div class="input-group-prepend">
								<label class="lbl-cadastro" for="lbl-sel-destinatario">
									Destinatário
								</label>
							</div>
							<select name="sel-destinatario" class="custom-select" id="lbl-sel-destinatario" >
								<option value="-">Selecione</option>
								<option value="MAMCK">MAMCK</option>
								<option value="HAVALIA">HAVALIA</option>
								<option value="MILITÃO JR">MILITÃO JR</option>
								<option value="MILITÃO ANDRÉ">MILITÃO ANDRÉ</option>
								<option value="OUTROS">OUTROS</option>
							</select>
						</div>

						<div class="input-group col-auto mt-1">
							<div class="input-group-prepend">
								<label class="lbl-cadastro" for="lbl-sel-descricao">
									Descrição
								</label>
							</div>
							<select name="sel-descricao" class="custom-select" id="lbl-sel-descricao" >
								<option value="-">Selecione</option>
								<option value="REGULARIDADE CERTIDÃO GDF">REGULARIDADE CERTIDÃO GDF</option>
								<option value="REGULARIDADE INSS">REGULARIDADE INSS</option>
								<option value="REGULARIDADE FGTS">REGULARIDADE FGTS</option>
								<option value="DARF IMPOSTO ESTADUAL">DARF IMPOSTO ESTADUAL</option>
								<option value="DARF IMPOSTO FEDERAL">DARF IMPOSTO FEDERAL</option>
								<option value="BOLETO INSS HAVALIA">BOLETO INSS HAVALIA</option>
								<option value="BOLETO INSS MAMCK">BOLETO INSS MAMCK</option>
								<option value="BOLETO FGTS HAVALIA">BOLETO FGTS HAVALIA</option>
								<option value="BOLETO FGTS MAMCK">BOLETO FGTS MAMCK</option>
								<option value="BOLETO CREA">BOLETO CREA</option>
								<option value="OUTROS">OUTROS</option>
							</select>
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
							<div class="input-group-prepend">
								<label class="lbl-cadastro" for="lbl-sel-meio-notificacao">
									Aviso/Cobrança recebido através de:
								</label>
							</div>
							<select name="sel-meio-notificacao" class="custom-select" id="lbl-sel-meio-notificacao" >
								<option value="<?=$_SESSION['user'].' NÃO INFORMOU'?>">Selecione</option>
								<option value="VERBAL/TELEFONE">VERBAL/TELEFONE</option>
								<option value="TEXTO WHATSAPP">TEXTO WHATSAPP</option>
								<option value="ÁUDIO WHATSAPP">ÁUDIO WHATSAPP</option>
								<option value="OUTROS">OUTROS</option>
							</select>
						</div>

						<div class="input-group col-auto mt-1">
							<label class="sr-only" for="lbl-observacoes">OBSERVAÇÕES COMPLEMENTARES</label>
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