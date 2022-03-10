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
	<title>Editar O.S</title>
	<?php require_once 'includes/bootstrap-css.php'; ?>
</head>
<body class="bg-dark fixed-nav sticky-footer" id="page-top">
	<!-- NAVEGAÇÃO -->
	<?php require_once 'includes/navegacao.php';?>
	
	<div class="content-wrapper" id="background-tela-edicao">
		<div class="container-fluid">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					Home
				</li>
				<li class="breadcrumb-item">
					Registros O.S
				</li>
				<li class="breadcrumb-item">
					<mark class="p-2 rounded">Editar</mark>
				</li>
			</ol>

					<!--Feedback da Edição -->
					<?php

						if($mensagem_erro == "Ordem de Serviço atualizada com Sucesso!")
						{
					?>

					<div class="alert alert-success font-weight-bold alertaCadOsOk col-12 text-center" role="alert">
 						<img src="../assets/ok.png"><h5><strong><?=$mensagem_erro?></strong></h5>
					</div>

					<?php 

						echo "<script>setTimeout(()=> window.location.href = '/?pagina=".$_GET['form']."', 5000)</script>";

						} elseif($mensagem_erro == "ERRO. Verifique as informações e tente novamente ou contate o Suporte.") {
					?>

					<div class="alert alert-warning font-weight-bold text-danger alertaCadOsNoOk col-12 text-center" role="alert">
 						<img src="../assets/error.png"><h5><strong><?=$mensagem_erro?></strong></h5>
					</div>

					<?php 
						} 
					?>
	
			<div id="row-form-edicao">
				
				<form class="container background-form-edicao" method="post">

					<div id="jumbotron_telas_edicao">
						<div class="container">
							<h4>O.S em edição</h4>
							<?php $cod_os = filter_input(INPUT_GET, 'cod_os');?>
							<span>
								<a href="/?pagina=historico&cod_os=<?=$cod_os?>&form=demandas-do-dia" class="text-light text-decoration-none float-right p-2 border-rouded" target="_blank" title="Histórico"><i class="fa fa-history"></i></a>
							</span>
						</div>
					</div>

					<?php 

						if ($_SESSION['user']){
						$os = filter_input(INPUT_GET, 'cod_os');
						if($os != '' && $os != NULL) {

						$usuario = new EditarOs();
						$registro = $usuario->registroEdicao($os);					
					?>


					<div class="form-row align-items-center">

						<?php 
							
							if($registro->banco == 'CEF') {
								
						?>

						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<label id="lbl-edicao-os" for="select-ficha-pesquisa">
										FICHA DE PESQUISA
									</label>
								</div>
								<select class="custom-select" name="sel-ficha-pesquisa" id="select-ficha-pesquisa">
									<option value="<?=$registro->ficha_pesquisa?>"><?=$registro->ficha_pesquisa?></option>
									<option value="PENDENTE">PENDENTE</option>
									<option value="LANÇADA">LANÇADA</option>
									<option value="NÃO SE APLICA">NÃO SE APLICA</option>
								</select>
							</div>
						</div>

						<?php 
							}
						?>

						<?php 
							
							if($registro->banco == 'BANCO INTER') {
								
						?>

						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<label for="inlineFormInputContato" class="text-light bg-danger p-2">NÚMERO DA OPERAÇÃO INTER</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputContato" placeholder="Digite o n° da operação para esta demanda INTER - É preferível copiar e colar o número direto do e-mail." name="ipt-numero-op-inter" title="NÚMERO OPERAÇÃO INTER" value="<?=$registro->numero_op_inter?>" required>
						</div>

						<?php 
							}
						?>
						
						<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputOs">Nº O.S</label>

							<input type="hidden"name="ipt-os" value ="<?=$registro->cod_os?>">

							<input type="text" class="form-control mb-2" readonly id="inlineFormInputOs" placeholder="Nº O.S" value ="<?=$registro->cod_os?>">
						</div>

						<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<label id="lbl-edicao-os" for="select-tipo">
										TIPO
									</label>
								</div>
								<select class="custom-select" name="sel-tipo" id="select-tipo">
									<option value="<?=$registro->tipo?>"><?=$registro->tipo?></option>
									<option value="-">-</option>
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
									<label id="lbl-edicao-os" for="select-banco">
										BANCO
									</label>
								</div>
								<select class="custom-select" name="sel-banco" id="select-banco">
									<option value="<?=$registro->banco?>"><?=$registro->banco?></option>
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
									<label id="lbl-edicao-os" for="select-empresa">
										EMPRESA
									</label>
								</div>
								<select class="custom-select" name="sel-empresa" id="select-empresa">
									<option value="<?=$registro->empresa?>"><?=$registro->empresa?></option>
									<option value="MAMCK">MAMCK</option>
									<option value="HAVALIA">HAVALIA</option>
									<option value="MOREIRA">MOREIRA</option>
								</select>
							</div>
						</div>

					</div>

					<div class="form-row align-items-center">

						<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputProponente">PROPONENTE</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputProponente" placeholder="Proponente" name="ipt-proponente" value="<?=$registro->proponente?>" title="PROPONENTE" required>
						</div>

						<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputContato">CONTATO</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputContato" placeholder="Contato/Telefone" name="ipt-contato" value="<?=$registro->CONTATO?>" title="CONTATO" required>
						</div>

						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<label id="lbl-edicao-os" for="select-cidade">
										CIDADE
									</label>
								</div>
								<select class="custom-select" name="sel-cidade" id="select-cidade">
									<option value="<?=$registro->cidade?>"><?=$registro->cidade?></option>
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
									<label id="lbl-edicao-os" for="select-uf">
										UF
									</label>
								</div>
								<select class="custom-select" name="sel-uf" id="select-uf">
									<option value="<?=$registro->uf?>"><?=$registro->uf?></option>

									<?php
										$uf = new Cidade();
										$ufs = $uf->carregaUfs();

										foreach ($ufs as  $valueUfs) {
											
									?>
									<option value="<?=$valueUfs['uf']?>"><?=$valueUfs['uf']?></option>
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
									<label id="lbl-edicao-os" for="select-tipologia">
										TIPOLOGIA
									</label>
								</div>
								<select class="custom-select" name="sel-tipologia" id="select-tipologia">
									<option value="<?=$registro->tipologia?>"><?=$registro->tipologia?></option>
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
							<input type="text" class="form-control mb-2" id="inlineFormInputEndereco" placeholder="Digite o endereço" name="ipt-endereco" value="<?=$registro->observacoes?>" title="ENDEREÇO" required>
						</div>

						<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputEndereco">NOME DO CONDOMÍNIO</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputEndereco" placeholder="Digite o nome do condomínio" name="ipt-condominio" value="<?=$registro->condominio?>" title="NOME DO CONDOMÍNIO" required>
						</div>

						<div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputEndereco">BAIRRO</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputEndereco" placeholder="Digite o bairro" name="ipt-bairro" value="<?=$registro->bairro?>" title="BAIRRO" required>
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
									<div id="lbl-edicao-os">
										DATA RECEB.
									</div>
								</div>
								<input type="date" class="form-control" name="ipt-dataReceb" value="<?=$registro->data_receb?>">
							</div>
						</div>

						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div id="lbl-edicao-os">
										DATA ENTREGA
									</div>
								</div>
								<input type="date" class="form-control" name="ipt-dataEntrega" value="<?=$registro->data_entrega?>">
							</div>
						</div>

						<div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputValorServico">VALOR SERVIÇO</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputValorServico" placeholder="Valor do Serviço" name="ipt-valorServ" value="<?=$registro->valor_servico?>" title="VALOR DO SERVIÇO" requerid>
						</div>

						<div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputValorDeslocamento">VALOR DESLOCAMENTO</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputValorDeslocamento" placeholder="Valor Deslocamento" name="ipt-valorDesloc" value="<?=$registro->valor_deslocamento?>" title="VALOR DESLOCAMENTO" requerid>
						</div>

					</div>

					<div class="form-row align-items-center">

						<div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputAreaEdificada">ÁREA EDIFICADA</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputAreaEdificada" placeholder="Área Edificada" name="ipt-areaEdif" value="<?=$registro->area_construida?>" title="ÁREA CONSTRUÍDA" required>
						</div>

						<div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputAreaTerreno">ÁREA DO TERRENO</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputAreaTerreno" placeholder="Área do Terreno" name="ipt-areaTerreno" value="<?=$registro->area_terreno?>" title="ÁREA DO TERRENO" required>
						</div>

						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<label id="lbl-edicao-os" for="select-padrao">
										PADRÃO ACAB.
									</label>
								</div>
								<select class="custom-select" name="sel-padraoAcab" id="select-padrao">
									<option value="<?=$registro->padrao_acabamento?>"><?=$registro->padrao_acabamento?></option>
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
									<label id="lbl-edicao-os" for="select-novo">
										NOVO
									</label>
								</div>
								<select class="custom-select" name="sel-novo" id="select-novo">
									<option value="<?=$registro->novo?>"><?=$registro->novo?></option>
									<option value="S">SIM</option>
									<option value="N">NÃO</option>
								</select>
							</div>
						</div>

						<div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<label id="lbl-edicao-os" for="select-laje">
										LAJE
									</label>
								</div>
								<select class="custom-select" name="sel-laje" id="select-laje">
									<option value="<?=$registro->LAJE?>"><?=$registro->LAJE?></option>
									<option value="S">SIM</option>
									<option value="N">NÃO</option>
								</select>
							</div>
						</div>

					</div>

					<div class="form-row align-items-center">

						<div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<label id="lbl-edicao-os" for="select-situacao">
										SITUAÇÃO
									</label>
								</div>
								<select class="custom-select" name="sel-situacao" id="select-situacao">
									<option value="<?=$registro->situacao?>"><?=$registro->situacao?></option>
									<option value="-">-</option>
									<option value="PEPT">PEPT</option>
								</select>
							</div>
						</div>

						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<label id="lbl-edicao-os" for="select-status">
										STATUS
									</label>
								</div>
								<select class="custom-select" name="sel-status" id="select-status">
									<option value="<?=$registro->status?>"><?=$registro->status?></option>
									<option value="-">-</option>
									<option value="AGUARDANDO VISTORIA">AGUARDANDO VISTORIA</option>
									<option value="VISTORIA REALIZADA">VISTORIA REALIZADA</option>
									<option value="LAUDO PRONTO">LAUDO PRONTO</option>
									<option value="AGUARDANDO CANCELAMENTO">AGUARDANDO CANCELAMENTO</option>
									<option value="CANCELADA">CANCELADA</option>
									<option value="SUSPENSA">SUSPENSA</option>
									<option value="REVISÃO DE VALOR">REVISÃO DE VALOR</option>
									<option value="TRIAGEM">TRIAGEM</option>
									<option value="EM ANÁLISE">EM ANÁLISE</option>
									<option value="AGUARDANDO MILITÃO">AGUARDANDO MILITÃO</option>
									<option value="EM DIGITAÇÃO (I)">EM DIGITAÇÃO (I)</option>
									<option value="EM DIGITAÇÃO (G)">EM DIGITAÇÃO (G)</option>
									<option value="MILITÃO VAI DIGITAR">MILITÃO VAI DIGITAR</option>
									<option value="FALTA INCLUIR LAUDO">FALTA INCLUIR LAUDO</option>
								</select>
							</div>
						</div>

						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<label id="lbl-edicao-os" for="select-status-lista">
										STATUS OBS. DA LISTA
									</label>
								</div>
								<select class="custom-select" name="sel-statusLista" id="select-status-lista">
									<option value="<?=$registro->obs3?>"><?=$registro->obs3?></option>
									<option value="-">-</option>
									<option value="AGUARDANDO VISTORIA">AGUARDANDO VISTORIA</option>
									<option value="IMPOSSIBILIDADE DE CONTATAR O CLIENTE">IMPOSSIBILIDADE DE CONTATAR O CLIENTE</option>
									<option value="PEPT PENDÊNCIA DOCUMENTAL">PEPT PENDÊNCIA DOCUMENTAL</option>
									<option value="SUSPENSA AGUARDANDO CANCELAMENTO">SUSPENSA AGUARDANDO CANCELAMENTO</option>
								</select>
							</div>
						</div>

						<div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputValorAvaliacao">VALOR DE AVALIAÇÃO</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputValorAvaliacao" placeholder="Valor de Avaliação" name="ipt-valorAvaliacao" value="<?=$registro->valor_avaliacao?>" title="VALOR DE AVALIAÇÃO">
						</div>

					</div>

					<div class="form-row align-items-center">

						<div class="col-12">
							<label class="sr-only" for="inlineFormInputObservacoesComplementares">OBSERVAÇÕES COMPLEMENTARES</label>
							<textarea type="text" class="form-control mb-2" id="inlineFormInputObservacoesComplementares" cols="100" rows="3" placeholder="Observações Complementares para a Lista de Vistorias" name="ta-observacoes"><?=$registro->obs2?></textarea>
						</div>

						<div class="col-12">
							<label class="sr-only" for="inlineFormInputObservacoesIG">OBSERVAÇÕES I/G</label>
							<textarea type="text" class="form-control mb-2" id="inlineFormInputObservacoesIG" cols="100" rows="3" placeholder="Observações I/G" name="ta-observacoesig"><?=$registro->notas_importantes?></textarea>
						</div>

					</div>

						<input type="submit" name="" id="btnGravarEdicao" value="GRAVAR ALTERAÇÕES">
				</form>
			</div>

			<?php  

			} else {
				echo "<h4 style='color:white'>NENHUM DADO RETORNADO!!!</h>";
			}

			} else {

				echo "<h4 style='color:white'>USUÁRIO NÃO AUTORIZADO!!!</h>";
				var_dump($_SESSION['user']);
				//var_dump($_SESSION['pass']);
				//echo $_SESSION['user'];
				//echo $_SESSION['pass'];
				
				}

			?>

			<?php require_once 'includes/rodape.php';?>
			
		</div>
	</div>

	<?php require_once 'includes/bootstrap-js.php'; ?>
</body>
</html>