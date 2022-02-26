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
					Cadastrar Notificação
				</li>
			</ol>
	
			<div class="row bg-light">
				
				<form class="container" method="post">

					<div class="jumbotron jumbotron-fluid bg-info text-white">
						<div class="container">
							<h4>Cadastrar Notificação</h4>
						</div>
					</div>

					<div class="form-row align-items-center">

						<div class="input-group col-auto">
							<div class="input-group-prepend">
								<label class="input-group-text bg-info text-white" for="lbl-sel-tipo">
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
								<label class="input-group-text bg-info text-white" for="lbl-sel-remetente">
									Remetente
								</label>
							</div>
							<select name="sel-remetente" class="custom-select" id="lbl-sel-remetente" >
								<option value="-">Selecione</option>
								<option value="FENIX CONTABILIDADE">FENIX CONTABILIDADE</option>
								<option value="JUNIOR EMISSOR NFE">JUNIOR EMISSOR NFE</option>
								<option value="CASSI">CASSI</option>
								<option value="CREA">CREA</option>
								<option value="SANTANDER">SANTANDER</option>
								<option value="SKY">SKY</option>
								<option value="OUTROS">OUTROS</option>
							</select>
						</div>

						<div class="input-group col-auto mt-1">
							<div class="input-group-prepend">
								<label class="input-group-text bg-info text-white" for="lbl-sel-destinatario">
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
								<label class="input-group-text bg-info text-white" for="lbl-sel-descricao">
									Descrição
								</label>
							</div>
							<select name="sel-descricao" class="custom-select" id="lbl-sel-descricao" >
								<option value="-">Selecione</option>
								<option value="REGULARIDADE CERTIDÃO GDF">REGULARIDADE CERTIDÃO GDF</option>
								<option value="REGULARIDADE INSS">REGULARIDADE INSS</option>
								<option value="REGULARIDADE FGTS">REGULARIDADE FGTS</option>
								<option value="ENVIO MATERIAL CREDENCIAMENTO">ENVIO MATERIAL CREDENCIAMENTO</option>
								<option value="DARF IMPOSTO ESTADUAL">DARF IMPOSTO ESTADUAL</option>
								<option value="DARF IMPOSTO FEDERAL">DARF IMPOSTO FEDERAL</option>
								<option value="BOLETO INSS HAVALIA">BOLETO INSS HAVALIA</option>
								<option value="BOLETO INSS MAMCK">BOLETO INSS MAMCK</option>
								<option value="BOLETO INSS MAMCK">BOLETO INSS MAMCK</option>
								<option value="BOLETO FGTS HAVALIA">BOLETO FGTS HAVALIA</option>
								<option value="BOLETO FGTS MAMCK">BOLETO FGTS MAMCK</option>
								<option value="BOLETO CARTÃO DE CRÉDITO">BOLETO CARTÃO DE CRÉDITO</option>
								<option value="BOLETO CASSI">BOLETO CASSI</option>
								<option value="BOLETO CREA">BOLETO CREA</option>
								<option value="BOLETO JUNIOR NFE">BOLETO JUNIOR NFE</option>
								<option value="OUTROS">OUTROS</option>
							</select>
						</div>

						<!--<div class="input-group col-auto mt-1">
							<div class="input-group-prepend">
								<label class="input-group-text bg-info text-white" for="lbl-sel-status">
									Status
								</label>
							</div>
							<select name="sel-status" class="custom-select" id="lbl-sel-status" >
								<option value="-">Selecione</option>
								<option value="PENDENTE">PENDENTE</option>
								<option value="RESOLVIDO">RESOLVIDO</option>
								<option value="PAGO">PAGO</option>
								<option value="CANCELADO">CANCELADO</option>
								<option value="OUTROS">OUTROS</option>
							</select>
						</div>-->
			
						<div class="input-group col-lg-4 col-md-4 col-xs-12 col-sm-12 mt-1">
							<div class="input-group-prepend">
								<div class="input-group-text bg-info text-white">
									Data Emissão
								</div>
							</div>
							<input type="date" class="form-control" name="ipt-data-emissao">
						</div>

						<div class="input-group col-lg-4 col-md-4 col-xs-12 col-sm-12 mt-1">
							<div class="input-group-prepend">
								<div class="input-group-text bg-info text-white">
									Data Limite
								</div>
							</div>
							<input type="date" class="form-control" name="ipt-data-limite">
						</div>

						<div class="input-group col-lg-4 col-md-4 col-xs-12 col-sm-12 mt-1">
							<div class="input-group-prepend">
								<div class="input-group-text bg-info text-white">
									Alertar em: 								</div>
							</div>
							<input type="date" class="form-control" name="ipt-data-programada" title="Data programada para pagamento/saneamento">
						</div>

						<div class="input-group col-auto mt-1">
							<div class="input-group-prepend">
								<label class="input-group-text bg-info text-white" for="lbl-sel-prioridade">
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

						<!--<div class="input-group col-auto mt-1 col-lg-6 col-md-6 col-xs-12 col-sm-12">
							<div class="input-group-prepend">
								<label class="input-group-text bg-info text-white" for="lbl-sel-arquivo-cobranca">
									Arquivo Cobrança
								</label>
							</div>
							<input type="file" class="form-control" name="ipt-arquivo-cobranca">
						</div>-->

						<!--<div class="input-group col-auto mt-1 col-lg-6 col-md-6 col-xs-12 col-sm-12">
							<div class="input-group-prepend">
								<label class="input-group-text bg-info text-white" for="lbl-sel-comprovante-pagamento">
									Comprovante Pagto
								</label>
							</div>
							<input type="file" class="form-control" name="ipt-arquivo-comprovante-pagamento">
						</div>-->

						<div class="input-group col-auto mt-1">
							<div class="input-group-prepend">
								<label class="input-group-text bg-info text-white" for="lbl-sel-meio-notificacao">
									Aviso/Cobrança recebido através de:
								</label>
							</div>
							<select name="sel-meio-notificacao" class="custom-select" id="lbl-sel-meio-notificacao" >
								<option value="<?=$_SESSION['user'].' NÃO INFORMOU'?>">Selecione</option>
								<option value="E-MAIL">E-MAIL</option>
								<option value="VERBAL/TELEFONE">VERBAL/TELEFONE</option>
								<option value="TEXTO WHATSAPP">TEXTO WHATSAPP</option>
								<option value="ÁUDIO WHATSAPP">ÁUDIO WHATSAPP</option>
								<option value="BOLETO/DOCUMENTO IMPRESSO">BOLETO/DOCUMENTO IMPRESSO</option>
								<option value="OUTROS">OUTROS</option>
							</select>
						</div>

						<!--<div class="input-group col-auto mt-1">
							<div class="input-group-prepend">
								<label class="input-group-text bg-info text-white" for="lbl-sel-meio-pagamento">
									Meio de pagamento:
								</label>
							</div>
							<select name="sel-meio-pagamento" class="custom-select" id="lbl-sel-meio-pagamento" >
								<option value="<?=$_SESSION[user].' NÃO INFORMOU'?>">Selecione</option>
								<option value="APP/INTERNET BANKING">APP/INTERNET BANKING</option>
								<option value="LOTÉRICA/AGÊNCIA BANCÁRIA">LOTÉRICA/AGÊNCIA BANCÁRIA</option>
								<option value="OUTROS/TERCEIROS">OUTROS/TERCEIROS</option>
							</select>
						</div>-->

						<!--<div class="input-group col-auto mt-1">
							<div class="input-group-prepend">
								<label class="input-group-text bg-info text-white" for="lbl-sel-pago-por">
									Pago por:
								</label>
							</div>
							<select name="sel-pago-por" class="custom-select" id="lbl-sel-pago-por" >
								<option value="<?=$_SESSION['user'].' NÃO INFORMOU'?>">Selecione</option>
								<option value="MILITÃO JR">MILITÃO JR.</option>
								<option value="MILITÃO ANDRÉ">MILITÃO ANDRÉ</option>
								<option value="OUTROS/TERCEIROS">OUTROS/TERCEIROS</option>
							</select>
						</div>-->

						<div class="input-group col-auto mt-1">
							<label class="sr-only" for="lbl-observacoes">OBSERVAÇÕES COMPLEMENTARES</label>
							<textarea type="text" class="form-control mb-2" id="lbl-observacoes" cols="100" rows="3" placeholder="Observações Complementares" name="ta-observacoes"></textarea>
						</div>

					</div>

					<input type="submit" name="" class="col-12 btn btn-info btn-block text-white mt-2" value="GRAVAR" name="btnCadastrar">
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