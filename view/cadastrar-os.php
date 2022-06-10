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
	<title>Nova O.S.</title>
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
					<mark class="p-2 rounded">Cadastrar O.S.</mark>
				</li>
				<div class="col mt-2">
					<a href="/?pagina=cadastrar-cidade" class="btn btn-danger text-light float-right font-weight-bold rounded" title="Incluir Nova Cidade."><i class="fa fa-plus"></i> Cidade</a>
				</div>
			</ol>

					<!--Feedback do Cadastro -->
					<?php

						if($mensagem_erro == "Ordem de Serviço cadastrada com Sucesso!")
						{
					?>

					<div class="alert alert-success font-weight-bold alertaCadOsOk col-12 text-center" role="alert">
 						<img src="../assets/ok.png"><h5><strong><?=$mensagem_erro?></strong></h5>
					</div>

					<?php 
						} elseif($mensagem_erro == "ERRO. Verifique se a Ordem de Serviço que está tentando cadastrar já exista no sistema ou contate o Suporte.") {
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
							<h4>Cadastrar O.S.</h4>
						</div>
					</div>

					<div class="form-row align-items-center">

						<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputOs">Nº O.S</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputOs" placeholder="Nº O.S" name="ipt-os" required>
						</div>

						<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<label class="lbl-cadastro" for="select-tipo">
										TIPO
									</label>
								</div>
								<select class="custom-select" name="sel-tipo" id="select-tipo">
									<option value="-">Selecione</option>
									<option value="A-1">A-1</option>
									<option value="A-2">A-2</option>
									<option value="A-3">A-3</option>
                                    <option value="SUDES">SUDES</option>
									<option value="A-402">A-402</option>
									<option value="A-413">A-413</option>
									<option value="A-414"> A-414</option>
									<option value="A-417"> A-417</option>
									<option value="E-401">E-401</option>
									<option value="E-404">E-404</option>
									<option value="B-405">B-405</option>
									<option value="B-437">B-437</option>
									<option value="B-438">B-438</option>
									<option value="G-416">G-416</option>
									<option value="SIMPLIFICADO/PARTICULAR">SIMPLIFICADO/PARTICULAR</option>
									<option value="COMPLETO/PARTICULAR">COMPLETO/PARTICULAR</option>
								</select>
							</div>
						</div>

						<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<label class="lbl-cadastro" for="select-banco">
										BANCO
									</label>
								</div>
								<select class="custom-select" name="sel-banco" id="select-banco">
									<option value="-">Selecione</option>
									<option value="BANCO DO BRASIL">BANCO DO BRASIL</option>
									<option value="CEF">CEF</option>
									<option value="BRB">BRB</option>
									<option value="POUPEX">POUPEX</option>
									<option value="FHE">FHE</option>
									<option value="BANCO INTER">BANCO INTER</option>
									<option value="PARTICULAR/OUTRO">PARTICULAR/OUTRO</option>
								</select>
							</div>
						</div>

						<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<label class="lbl-cadastro" for="select-empresa">
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

					</div>

					<div class="form-row align-items-center">

						<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputProponente">PROPONENTE</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputProponente" placeholder="Proponente" name="ipt-proponente" required>
						</div>

						<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputContato">CONTATO</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputContato" placeholder="Contato/Telefone" name="ipt-contato" required>
						</div>

						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<label class="lbl-cadastro" for="select-cidade">
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
									<label class="lbl-cadastro" for="select-uf">
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

					</div>

					<div class="form-row align-items-center">

						<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<label class="lbl-cadastro" for="select-tipologia">
										TIPOLOGIA
									</label>
								</div>
								<select class="custom-select" name="sel-tipologia" id="select-tipologia">
									<option value="-">Selecione</option>
									<option value="CASA TÉRREA">CASA TÉRREA</option>
									<option value="SOBRADO">SOBRADO</option>
									<option value="APARTAMENTO">APARTAMENTO</option>
									<option value="APARTAMENTO DUPLEX">APARTAMENTO DUPLEX</option>
									<option value="APARTAMENTO TRIPLEX">APARTAMENTO TRIPLEX </option>
									<option value="COBERTURA">COBERTURA</option>
									<option value="COBERTURA DUPLEX">COBERTURA DUPLEX</option>
									<option value="COBERTURA TRIPLEX">COBERTURA TRIPLEX</option>
									<option value="KITNET">KITNET</option>
									<option value="SALA COMERCIAL">SALA COMERCIAL</option>
									<option value="LOJA">LOJA</option>
									<option value="ANDAR CORRIDO">ANDAR CORRIDO</option>
									<option value="PRÉDIO INTEIRO">PRÉDIO INTEIRO</option>
									<option value="EMPREENDIMENTO">EMPREENDIMENTO</option>
									<option value="TERRENO">TERRENO</option>
									<option value="GLEBA">GLEBA</option>
									<option value="OUTROS">OUTROS</option>
								</select>
							</div>
						</div>

						<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputEndereco">ENDEREÇO</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputEndereco" placeholder="Digite o endereço" name="ipt-endereco" required>
						</div>

						<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputCondominio">NOME DO CONDOMÍNIO</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputCondominio" placeholder="Nome do condomínio" name="ipt-condominio">
						</div>

						<div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputEndereco">BAIRRO</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputEndereco" placeholder="Digite o bairro" name="ipt-bairro" required>
						</div>

						<div class="col-lg-1 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputCep">CEP</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputCep" placeholder="CEP" name="ipt-cep" required disabled>
						</div>

					</div>

					<div class="form-row align-items-center">

						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="lbl-cadastro">
										DATA RECEB.
									</div>
								</div>
								<input type="date" class="form-control" name="ipt-dataReceb">
							</div>
						</div>

						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="lbl-cadastro">
										DATA ENTREGA
									</div>
								</div>
								<input type="date" class="form-control" name="ipt-dataEntrega">
							</div>
						</div>

						<div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputValorServico">VALOR SERVIÇO</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputValorServico" placeholder="Valor do Serviço" name="ipt-valorServ" requerid>
						</div>

						<div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputValorDeslocamento">VALOR DESLOCAMENTO</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputValorDeslocamento" placeholder="Valor Deslocamento" name="ipt-valorDesloc" requerid>
						</div>

					</div>

					<div class="form-row align-items-center">

						<div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputAreaEdificada">ÁREA EDIFICADA</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputAreaEdificada" placeholder="Área Edificada" name="ipt-areaEdif" required>
						</div>

						<div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputAreaTerreno">ÁREA DO TERRENO</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputAreaTerreno" placeholder="Área do Terreno" name="ipt-areaTerreno" required>
						</div>

						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<label class="lbl-cadastro" for="select-padrao">
										PADRÃO ACAB.
									</label>
								</div>
								<select class="custom-select" name="sel-padraoAcab" id="select-padrao">
									<option value="-">Selecione</option>
									<option value="1">MÍNIMO (1)</option>
									<option value="1">BAIXO (1)</option>
									<option value="2">NORMAL/BAIXO (2)</option>
									<option value="2">NORMAL (2)</option>
									<option value="2">NORMAL/ALTO (2)</option>
									<option value="3">ALTO (3)</option>
								</select>
							</div>
						</div>

						<div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<label class="lbl-cadastro" for="select-novo">
										NOVO
									</label>
								</div>
								<select class="custom-select" name="sel-novo" id="select-novo">
									<option value="-">Selecione</option>
									<option value="S">SIM</option>
									<option value="N">NÃO</option>
								</select>
							</div>
						</div>

						<div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<label class="lbl-cadastro" for="select-laje">
										LAJE
									</label>
								</div>
								<select class="custom-select" name="sel-laje" id="select-laje">
									<option value="-">Selecione</option>
									<option value="S">SIM</option>
									<option value="N">NÃO</option>
								</select>
							</div>
						</div>

					</div>

					<div class="form-row align-items-center">

						<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<label class="lbl-cadastro" for="select-situacao">
										SITUAÇÃO
									</label>
								</div>
								<select class="custom-select" name="sel-situacao" id="select-situacao">
									<option value="-">Selecione</option>
									<option value="-">-</option>
									<option value="PEPT">PEPT</option>
								</select>
							</div>
						</div>

						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<label class="lbl-cadastro" for="select-status">
										STATUS
									</label>
								</div>
								<select class="custom-select" name="sel-status" id="select-status">
									<option value="-">Selecione</option>
									<option value="AGUARDANDO VISTORIA">AGUARDANDO VISTORIA</option>
									<option value="VISTORIA REALIZADA">VISTORIA REALIZADA</option>
									<option value="LAUDO PRONTO">LAUDO PRONTO</option>
									<option value="CANCELADA">CANCELADA</option>
									<option value="SUSPENSA">SUSPENSA</option>
									<option value="REVISÃO DE VALOR">REVISÃO DE VALOR</option>
									<option value="TRIAGEM">TRIAGEM</option>
									<option value="EM DIGITAÇÃO (I)">EM DIGITAÇÃO (I)</option>
									<option value="EM DIGITAÇÃO (G)">EM DIGITAÇÃO (G)</option>
								</select>
							</div>
						</div>

						<div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<label class="lbl-cadastro" for="select-status-lista">
										STATUS OBS. DA LISTA
									</label>
								</div>
								<select class="custom-select" name="sel-statusLista" id="select-status-lista">
									<option value="-">Selecione</option>
									<option value="AGUARDANDO VISTORIA">AGUARDANDO VISTORIA</option>
									<option value="IMPOSSIBILIDADE DE CONTATAR O CLIENTE">IMPOSSIBILIDADE DE CONTATAR O CLIENTE</option>
									<option value="PEPT PENDÊNCIA DOCUMENTAL">PEPT PENDÊNCIA DOCUMENTAL</option>
									<option value="SUSPENSA AGUARDANDO CANCELAMENTO">SUSPENSA AGUARDANDO CANCELAMENTO</option>
								</select>
							</div>
						</div>

						<!--<div class="col-lg-1 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputValorAvaliacao">VALOR DE AVALIAÇÃO</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputValorAvaliacao" placeholder="Valor de Avaliação" name="ipt-valorAvaliacao" readonly>
						</div>-->

					</div>

					<div class="form-row align-items-center">

						<div class="col-12">
							<label class="sr-only" for="inlineFormInputObservacoesComplementares">OBSERVAÇÕES COMPLEMENTARES</label>
							<textarea type="text" class="form-control mb-2" id="inlineFormInputObservacoesComplementares" cols="100" rows="3" placeholder="Observações Complementares para a Lista de Vistorias" name="ta-observacoes"></textarea>
						</div>

						<div class="col-12">
							<label class="sr-only" for="inlineFormInputObservacoesIG">OBSERVAÇÕES I/G</label>
							<textarea type="text" class="form-control mb-2" id="inlineFormInputObservacoesIG" cols="100" rows="3" placeholder="Observações I/G" name="ta-observacoesig"></textarea>
						</div>

						<input type="submit" name="" id="botoesGravarCad" value="Gravar O.S." name="btnCadastrar" onmouseover="hoverOverBtnGravarCad()" onmouseout="hoverOutBtnGravarCad()">

					</div>
				</form>
			</div>

			<?php require_once 'includes/rodape.php';?>
			
		</div>
	</div>

	<?php require_once 'includes/bootstrap-js.php'; ?>
</body>
</html>