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
	<title>Valor de Avaliação</title>
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
					Valor de Avaliação
				</li>
			</ol>
			<div class="card mb-1">
				<div class="card-header">
					<i class="fa fa-table "></i> Valor de Avaliação
					<br>
					<br>
					<form method="post">

						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<label class="input-group-text bg-secondary text-white" for="select-cidade">
										CIDADE
									</label>
								</div>

								<select class="custom-select" name="sel-cidade" id="select-cidade">
									<option value="-">Selecione</option>
										<?php 
											$cidade = new ValorAvaliacao();
											$cidades = $cidade->buscaCidades();
											foreach ($cidades as $value) {
										?>
									<option value="<?=$value['cidade']?>"><?=$value['cidade']?></option>
										<?php
											}
										?>
								</select>

							</div>
						</div>

						<br>

						<div class="col-lg-3 col-md-2 col-sm-12 col-xs-12">
							<input type="submit" value="Buscar" class="btn btn-secondary btn-block font-weight-bold">
						</div>

					</form>
				</div>
			</div>
			<div class="row">
				<div class="card-body">
					<table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
						<thead class="thead-dark">
							<tr>
								<th>O.S</th>
								<th>Tipo</th>
								<th>Banco</th>
								<th>Empresa</th>
								<th>Cidade</th>
								<th>Endereço</th>
								<th>Bairro</th>
								<th>UF</th>
								<th>Valor de Avaliação</th>
								<th>Tipologia</th>
								<th>Área constr.</th>
								<th>Área Terreno</th>
								<th>Laje</th>
								<th>Novo</th>
								<th>Data de receb.</th>
								<th>Status</th>
								<th>Notas</th>
								<th>Histórico</th>
							</tr>
						</thead>
						<tfoot class="thead-dark">
							<tr>
								<th>O.S</th>
								<th>Tipo</th>
								<th>Banco</th>
								<th>Empresa</th>
								<th>Cidade</th>
								<th>Endereço</th>
								<th>Bairro</th>
								<th>UF</th>
								<th>Valor de Avaliação</th>
								<th>Tipologia</th>
								<th>Área constr.</th>
								<th>Área Terreno</th>
								<th>Laje</th>
								<th>Novo</th>
								<th>Data de receb.</th>
								<th>Status</th>
								<th>Notas</th>
								<th>Histórico</th>
							</tr>
						</tfoot>
						<tbody>
							<?php 

							if(filter_input(INPUT_POST, 'sel-cidade')){

								$dados = new ValorAvaliacao();
								
								//$data_inicial = filter_input(INPUT_POST, 'data_inicial');
								//$data_final = filter_input(INPUT_POST, 'data_final');
								
								
								$resultado = $dados->avaliacao();

								if($resultado != NULL){
	
								foreach ($resultado as  $value) {
									//echo $value['cidade'];//depuração
									
							?>
							<tr>
								<td><?=$value['cod_os']?></td>
								<td><?=$value['tipo']?></td>
								<td><?=$value['banco']?></td>
								<td><?=$value['empresa']?></td>
								<td><?=$value['cidade']?></td>
								<td><?=$value['observacoes'].' '.$value['condominio']?></td>
								<td><?=$value['bairro']?></td>
								<td><?=$value['uf']?></td>
								<td><strong><?=$value['valor_avaliacao']?></strong></td>
								<td><?=$value['tipologia']?></td>
								<td><?=$value['area_construida']?></td>
								<td><?=$value['area_terreno']?></td>
								<td><?=$value['LAJE']?></td>
								<td><?=$value['novo']?></td>
								<td><?=date_format(date_create($value['data_receb']), "d/m/Y")?></td>
								<td><?=$value['status']?></td>
								<td><?=$value['notas_importantes']?></td>
								<td align="center"><a href="/?pagina=historico&cod_os=<?=$value['cod_os']?>&form=valor-de-avaliacao" title="Histórico" target="_blank"><i class="fa fa-history" aria-hidden="true"></a></td>
							</tr>
							<script>verificaStatus()</script>
							<?php 
								$conn = null;
								}
							} else {
								echo "<div class='text-light bg-danger p-2'>NENHUM DADO RETORNADO</div><br>";
							} 

						}
							?>
						</tbody>
					</table>
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