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
	<!--<link rel="stylesheet" type="text/css" href="../bibliotecas/bootstrap/css/bootstrap.min.css">-->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap2.min.css">
	<link rel="stylesheet" type="text/css" href="../bibliotecas/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../bibliotecas/datatables/dataTables.bootstrap4.css">
	<link rel="stylesheet" type="text/css" href="../css/sb-admin.min.css">
	<link rel="shortcut icon" href="../assets/abgoficial.ico" />
	<script src="../js/abg.js"></script>
</head>
<body class="bg-dark fixed-nav sticky-footer" id="page-top">
	<!-- NAVEGAÇÃO -->
	<?php require 'navegacao.php';?>
	
	<div class="content-wrapper">
		<div class="container-fluid">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="?pagina=demandas-do-dia" class="text-decoration-none">Home</a>
				</li>
				<li class="breadcrumb-item">
					Pesquisas
				</li>
				<li class="breadcrumb-item">
					Por O.S
				</li>
			</ol>
			<div class="card mb-1 col">
				<div class="card-header">
					<i class="fa fa-table"></i> Pesquisa por Ordem de Serviço
					<br>
					<br>
					<form method="post">
						<div class="input-group">
							<div class="input-group-prepend col-lg-3 col-md-3 col-sm-12 col-xs-12">
								<div class="input-group-text">Número da O.S.</div>
								<input type="text" name="ipt-numeroOs" required class="form-control"><span>
							</div>
						</div>

						<br>

						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"> 
							<input type="submit" value="Buscar" class="btn btn-secondary btn-block font-weight-bold">
						</div>

					</form>
				</div>
			</div>

			<div class="row">
				<div class="card-body">
					<?php
					
					if(filter_input(INPUT_POST,'ipt-numeroOs') != ''){
						//RESULTADOS DA PESQUISA
						$dados = new PesquisaPorOs;
						$resultado = $dados->pesqPorOs();

						if($resultado) {

					?>
						<div class='bg-success text-light p-2'><strong>RESULTADO DA PESQUISA</strong></div><br>

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
		<?php require 'rodape.php';?>
	</div>
	<script src="../bibliotecas/jquery/jquery.min.js"></script>
	<script src="../bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="../bibliotecas/jquery-easing/jquery.easing.min.js"></script>
	<script src="../bibliotecas/datatables/jquery.dataTables.js"></script>
	<script src="../bibliotecas/datatables/dataTables.bootstrap4.js"></script>
	<script src="../js/sb-admin.min.js"></script>
	<script src="../js/sb-admin-datatables.min.js"></script>
</body>
</html>