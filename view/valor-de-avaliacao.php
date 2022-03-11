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
	<?php require_once 'includes/bootstrap-css.php'; ?>
</head>
<body class="bg-dark fixed-nav sticky-footer" id="page-top">
	<!-- NAVEGAÇÃO -->
	<?php require_once 'includes/navegacao.php';?>
	
	<div class="content-wrapper" id="background-tela-consulta">
		<div class="container-fluid">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="?pagina=demandas-do-dia" class="text-decoration-none">Home</a>
				</li>
				<li class="breadcrumb-item">
					Pesquisas
				</li>
				<li class="breadcrumb-item">
					<mark class="p-2 rounded">Valor de Avaliação</mark>
				</li>
			</ol>

			<div class="row mb-3 justify-content-center">

				<div class="div-botoes-consulta">
					<a href="?pagina=demandas-do-dia" class="botoes-atalho-cons" title="Demandas vencendo hoje"><i class="fa fa-search " aria-hidden="true"></i> Vencendo Hoje </a>
				</div>

				<div class="div-botoes-consulta">
					<a href="?pagina=pesquisa-por-os" class="botoes-atalho-cons" title="Pesq. O.S. por código"><i class="fa fa-search" aria-hidden="true"></i> Pesq. O.S. por código </a>
				</div>

				<div class="div-botoes-consulta">
					<a href="?pagina=pesquisa-por-data-receb" class="botoes-atalho-cons" title="Pesq. por data de recebimento"><i class="fa fa-search " aria-hidden="true"></i> O.S(s) por data de recebimento </a>
				</div>

				<div class="div-botoes-consulta">
					<a href="?pagina=pesquisa-por-data-entrega" class="botoes-atalho-cons" title="Pesq. por data de entrega"><i class="fa fa-search " aria-hidden="true"></i> O.S(s) por data de entrega </a>
				</div>

			</div>			

			<div class="card mb-1">
				<div class="card-header">
					<i class="fa fa-table "></i> Valor de Avaliação
					<br>
					<br>
					<form method="post" class="background-form-cons">

						<div id="div-ipt-data-form-cons">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<label class="input-group-text bg-secondary text-light" for="select-cidade">
										CIDADE
									</label>
								</div>

								<select class="custom-select col-lg-8 col-md-5 col" name="sel-cidade" id="select-cidade">
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

						<div id="div-btn-form-cons">
							<input type="submit" value="Buscar" id="botoesCons">
						</div>

					</form>
				</div>
			</div>
			<div id="row-tbl-consulta">
				<div class="card-body">
					<table class="tbl-consulta" id="dataTable" width="100%" cellspacing="0">
						<thead class="thead-light">
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
						<tfoot class="thead-light">
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
		<?php require_once 'includes/rodape.php';?>
	</div>
	<?php require_once 'includes/bootstrap-js.php'; ?>
</body>
</html>