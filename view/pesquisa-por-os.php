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
	<title>Pesquisa por O.S.</title>
	<?php require_once 'includes/bootstrap-css.php'; ?>
</head>
<body class="bg-dark fixed-nav sticky-footer" id="page-top">
	<!-- NAVEGAÇÃO -->
	<?php require_once 'includes/navegacao.php';?>
	
	<div class="content-wrapper" id="background-tela-consulta">
		<div class="container-fluid">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					Home
				</li>
				<li class="breadcrumb-item">
					Pesquisas
				</li>
				<li class="breadcrumb-item">
					<mark class="p-2 rounded">Por O.S</mark>
				</li>
			</ol>

			<div class="row mb-3 justify-content-center">

				<div class="div-botoes-consulta">
					<a href="?pagina=demandas-do-dia" class="botoes-atalho-cons" title="Demandas vencendo hoje"><i class="fa fa-search " aria-hidden="true"></i> Vencendo Hoje </a>
				</div>

				<div class="div-botoes-consulta">
					<a href="?pagina=pesquisa-por-data-receb" class="botoes-atalho-cons" title="Pesq. por data de recebimento"><i class="fa fa-search " aria-hidden="true"></i> O.S(s) por data de recebimento </a>
				</div>

				<div class="div-botoes-consulta">
					<a href="?pagina=pesquisa-por-data-entrega" class="botoes-atalho-cons" title="Pesq. por data de entrega"><i class="fa fa-search " aria-hidden="true"></i> O.S(s) por data de entrega </a>
				</div>

				<div class="div-botoes-consulta">
					<a href="?pagina=valor-de-avaliacao" class="botoes-atalho-cons" title="Valor de avaliação"><i class="fa fa-search " aria-hidden="true"></i> Valor de Avaliação </a>
				</div>


			</div>

			<div class="card mb-1 col">
				<div class="card-header">
					<i class="fa fa-table"></i> Pesquisa por Ordem de Serviço
					<br>
					<br>
					<form method="post" class="background-form-cons">
						<div id="div-ipt-data-form-cons">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<span class="input-group-text bg-secondary text-light" id="lbl-cons">Número da O.S.</span>
								</div>
								<input type="text" name="ipt-numeroOs" required class="form-control  col-md-7 col-lg-7 col" aria-describedby="lbl-cons">
							</div>
						</div>
						<div id="div-btn-form-cons"> 
							<input type="submit" value="Buscar" class="btn btn-lg btn-secondary btn-block text-white font-weight-bold rounded">
							
							<!-- O botão abaixo não está reconhecendo o código no abg.js para estilizar
							     automaticamente... verificar assim que possível o problema...
								<input type="submit" value="Buscar" id="botoesCons">
							-->

						</div>
					</form>
				</div>
			</div>

			<div id="row-tbl-consulta">
				<div class="card-body">
					<?php
					
					if(filter_input(INPUT_POST,'ipt-numeroOs') != ''){
						//RESULTADOS DA PESQUISA
						$dados = new PesquisaPorOs;
						$resultado = $dados->pesqPorOs();

						if($resultado) {

					?>
						<div class='bg-info text-light p-2'><strong>RESULTADO DA PESQUISA</strong></div><br>

						<div class="row">

							<div class="col-12">

							<div class="bg-light pr-2 pl-2 rounded text-dark font-weight-bold col-12">
								<span>
									<a href="/?pagina=historico&cod_os=<?=$resultado[0]['cod_os']?>&form=pesquisa-por-os" class="text-dark text-decoration-none float-right border-rouded" target="_blank"  title="Histórico"><i class="fa fa-history" aria-hidden="true"></i></a>
								</span>
								<span >
									<a href="/?pagina=editar-os&cod_os=<?=$resultado[0]['cod_os']?>&form=pesquisa-por-os" class="text-dark text-decoration-none float-right border-rouded" target="_blank" title="Editar">
									<i class="fa fa-pencil" aria-hidden="true"></i>&nbsp&nbsp&nbsp</a>
								</span>
							</div>

							<div class="bg-light pr-2 pl-2 rounded text-dark font-weight-bold">O.S</div>
								<p class="form-control bg-light text-dark pl-2 pr-2 h-auto">		<?=$resultado[0]['cod_os']?>
								</p>
							</div>

							<div class="col-12">
								<div class="bg-light pr-2 pl-2 rounded text-dark font-weight-bold">TIPO</div>
								<p class="form-control bg-light text-dark pl-2 pr-2 h-auto">		<?=$resultado[0]['tipo']?>
								</p>
							</div>

							<div class="col-12">
								<div class="bg-light pr-2 pl-2 rounded text-dark font-weight-bold">EMPRESA</div>
								<p class="form-control bg-light text-dark pl-2 pr-2 h-auto">		<?=$resultado[0]['empresa']?>
								</p>
							</div>

							<div class="col-12">
								<div class="bg-light pr-2 pl-2 rounded text-dark font-weight-bold">BANCO</div>
								<p class="form-control bg-light text-dark pl-2 pr-2 h-auto">		<?=$resultado[0]['banco']?>
								</p>
							</div>

							<?php 
								if($resultado[0]['banco'] == 'CEF'){
							?>

							<div class="col-12">
								<div class="bg-light pr-2 pl-2 rounded text-dark font-weight-bold">FICHA DE PESQUISA</div>
								<p class="form-control bg-light text-dark pl-2 pr-2 h-auto">		<?=$resultado[0]['ficha_pesquisa']?>
								</p>
							</div>

							<?php 
								}
							?>

							<?php 
								if($resultado[0]['banco'] == 'BANCO INTER'){
							?>

							<div class="col-12">
								<div class="bg-light pr-2 pl-2 rounded text-dark font-weight-bold">NÚMERO DA OPERAÇÃO</div>
								<p class="form-control bg-light text-dark pl-2 pr-2 h-auto">		<?=$resultado[0]['numero_op_inter']?>
								</p>
							</div>

							<?php 
								}
							?>

							<div class="col-12">
								<div class="bg-light pr-2 pl-2 rounded text-dark font-weight-bold">PROPONENTE</div>
								<p class="form-control bg-light text-dark pl-2 pr-2 h-auto">		<?=$resultado[0]['proponente']?>
								</p>
							</div>

							<div class="col-12">
								<div class="bg-light pr-2 pl-2 rounded text-dark font-weight-bold">CONTATO</div>
								<p class="form-control bg-light text-dark pl-2 pr-2 h-auto">		<?=$resultado[0]['CONTATO']?>
								</p>
							</div>

							<div class="col-12">
								<div class="bg-light pr-2 pl-2 rounded text-dark font-weight-bold">TIPOLOGIA</div>
								<p class="form-control bg-light text-dark pl-2 pr-2 h-auto">		<?=$resultado[0]['tipologia']?>
								</p>
							</div>

							<div class="col-12">
								<div class="bg-light pr-2 pl-2 rounded text-dark font-weight-bold">CIDADE/UF</div>
								<p class="form-control bg-light text-dark pl-2 pr-2 h-auto">		<?=$resultado[0]['cidade']?>/<?=$resultado[0]['uf']?>
								</p>
							</div>

							<div class="col-12">
								<div class="bg-light pr-2 pl-2 rounded text-dark font-weight-bold">ENDEREÇO</div>
								<p class="form-control bg-light text-dark pl-2 pr-2 h-auto">		<?=$resultado[0]['observacoes']?>
								</p>
							</div>

							<div class="col-12">
								<div class="bg-light pr-2 pl-2 rounded text-dark font-weight-bold">NOME DO CONDOMÍNIO</div>
								<p class="form-control bg-light text-dark pl-2 pr-2 h-auto">		<?=$resultado[0]['condominio']?>
								</p>
							</div>

							<div class="col-12">
								<div class="bg-light pr-2 pl-2 rounded text-dark font-weight-bold">BAIRRO</div>
								<p class="form-control bg-light text-dark pl-2 pr-2 h-auto">		<?=$resultado[0]['bairro']?>
								</p>
							</div>

							<div class="col-12">
								<div class="bg-light pr-2 pl-2 rounded ttext-dark font-weight-bold">DATA RECEBIMENTO</div>
								<p class="form-control bg-light text-dark pl-2 pr-2 h-auto">		<?=date_format(date_create($resultado[0]['data_receb']), 'd/m/Y')?>
								</p>
							</div>

							<div class="col-12">
								<div class="bg-light pr-2 pl-2 rounded text-dark font-weight-bold">DATA ENTREGA</div>
								<p class="form-control bg-light text-dark pl-2 pr-2 h-auto">		<?=date_format(date_create($resultado[0]['data_entrega']), 'd/m/Y')?>
								</p>
							</div>

							<div class="col-12">
								<div class="bg-light pr-2 pl-2 rounded text-dark font-weight-bold">STATUS</div>
								<p class="form-control bg-light text-dark pl-2 pr-2 h-auto">		<?=$resultado[0]['status']?>
								</p>
							</div>

							<div class="col-12">
								<div class="bg-light pr-2 pl-2 rounded text-dark font-weight-bold">ÁREA CONSTRUÍDA (m²)</div>
								<p class="form-control bg-light text-dark pl-2 pr-2 h-auto">		<?=$resultado[0]['area_construida']?>
								</p>
							</div>

							<div class="col-12">
								<div class="bg-light pr-2 pl-2 rounded text-dark font-weight-bold">ÁREA DO TERRENO (m²)</div>
								<p class="form-control bg-light text-dark pl-2 pr-2 h-auto">		<?=$resultado[0]['area_terreno']?>
								</p>
							</div>

							<div class="col-12">
								<div class="bg-light pr-2 pl-2 rounded text-dark font-weight-bold">PADRÃO DE ACABAMENTO (Escala númerica)</div>
								<p class="form-control bg-light text-dark pl-2 pr-2 h-auto">		<?=$resultado[0]['padrao_acabamento']?>
								</p>
							</div>

							<div class="col-12">
								<div class="bg-light pr-2 pl-2 rounded text-dark font-weight-bold">LAJE (Sim ou Não)</div>
								<p class="form-control bg-light text-dark pl-2 pr-2 h-auto">		<?=$resultado[0]['LAJE']?>
								</p>
							</div>

							<div class="col-12">
								<div class="bg-light pr-2 pl-2 rounded text-dark font-weight-bold">NOVO (Sim ou Não)</div>
								<p class="form-control bg-light text-dark pl-2 pr-2 h-auto">		<?=$resultado[0]['novo']?>
								</p>
							</div>

							<div class="col-12">
								<div class="bg-light pr-2 pl-2 rounded text-dark font-weight-bold">VALOR DE AVALIAÇÃO (R$)</div>
								<p class="form-control bg-light text-dark pl-2 pr-2 h-auto">		<?=number_format($resultado[0]['valor_avaliacao'], 2, ',','.')?>
								</p>
							</div>

							<div class="col-12">
								<div class="bg-light pr-2 pl-2 rounded text-dark font-weight-bold">OBSERVAÇÕES PARA LISTA DE VISTORIA</div>
								<p class="form-control bg-light text-dark pl-2 pr-2 h-auto">		<?=$resultado[0]['obs3']?>
								</p>
							</div>

							<div class="col-12">
								<div class="bg-light pr-2 pl-2 rounded text-dark font-weight-bold">NOTAS I/G</div>
								<p class="form-control bg-light text-dark pl-2 pr-2 h-auto">		<?=$resultado[0]['notas_importantes']?>
								</p>
							</div>


						</div>

						<?php

						} else {
							echo "<div class='bg-danger text-light p-2'><strong>REGISTRO NÃO ENCONTRADO.</strong></div>";
						}
					}

					?>
				</div>
			</div>
		</div>
		<!-- rodapé -->
		<?php require_once 'includes/rodape.php';?>
	</div>

	<?php require_once 'includes/bootstrap-js.php'; ?>
</body>
</html>