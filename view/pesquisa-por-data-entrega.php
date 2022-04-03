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
	<title>Pesquisa por data de entrega</title>
	<?php require_once 'includes/bootstrap-css.php'; ?>
</head>
<body class="bg-dark fixed-nav sticky-footer" id="page-top">
	<!-- NAVEGAÇÃO -->
	<?php require_once 'includes/navegacao.php';?>
	
	<div class="content-wrapper" id="background-tela-consulta">
		<div class="container-fluid">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					Início
				</li>
				<li class="breadcrumb-item">
					Pesquisas
				</li>
				<li class="breadcrumb-item">
					<mark class="p-2 rounded">Ordens de serviço por data de entrega</mark>
				</li>
			</ol>

			<div class="row mb-3 justify-content-center">

				<div class="div-botoes-consulta">
					<a href="?pagina=demandas-do-dia" class="botoes-atalho-cons" title="Demandas vencendo hoje"><i class="fa fa-search " aria-hidden="true"></i> Vencendo Hoje </a>
				</div>

				<div class="div-botoes-consulta">
					<a href="?pagina=pesquisa-por-os" class="botoes-atalho-cons" title="Pesq. O.S. por código"><i class="fa fa-search" aria-hidden="true"></i> O.S. por código </a>
				</div>

				<div class="div-botoes-consulta">
					<a href="?pagina=pesquisa-por-data-receb" class="botoes-atalho-cons" title="Pesq. por data de recebimento"><i class="fa fa-search " aria-hidden="true"></i> O.S(s) por receb. </a>
				</div>

				<div class="div-botoes-consulta">
					<a href="?pagina=valor-de-avaliacao" class="botoes-atalho-cons" title="Valor de avaliação"><i class="fa fa-search " aria-hidden="true"></i> Valor de Avaliação </a>
				</div>

			</div>
			
			<div class="card mb-1">
				<div class="card-header">
					<i class="fa fa-table"></i> Pesquisa por Data de Entrega
					<br>
					<br>
					<form method="post" class="background-form-cons">
						<div id="div-ipt-data-form-cons">
							<span>Data Inicial:&nbsp&nbsp</span><input type="date" name="data_inicial">&nbsp&nbsp&nbsp<span>Data final:&nbsp&nbsp</span><input type="date" name="data_final">
							<br><br>
						</div>
						<div id="div-btn-form-cons">
							<input type="submit" value="Buscar" id="botoesCons">
						</div>
					</form>
				</div>
			</div>
			
			<div id="row-tbl-consulta">
				<div class="col">

				<!-- BARRA DE PROGRESSO -->
				<div class="row">
					<div barra-progresso="barraProgresso" class="progresso pr-3 pl-3 pt-1 pb-1 mr-4 ml-4 mb-3 mt-3 col rounded" title="Percentual de serviços finalizados">
						<div></div>
					</div>
				</div>
				

					<table class="table table-bordered table-sm table-hover border" id="dataTable" width="100%" cellspacing="0">
						<thead class="thead-light">
							<tr>
								<th>O.S</th>
								<th>Tipo</th>
								<th>Banco</th>
								<th>Empresa</th>
								<th>Proponente</th>
								<th>Endereço</th>
								<th>Bairro</th>
								<th>Cidade</th>
								<th>UF</th>
								<th>Data Receb.</th>
								<th>Data Limite</th>
								<th>Status</th>
								<th>Observações</th>
								<th>Editar</th>
								<th>Histórico</th>
							</tr>
						</thead>
						<tfoot class="thead-light">
							<tr>
								<th>O.S</th>
								<th>Tipo</th>
								<th>Banco</th>
								<th>Empresa</th>
								<th>Proponente</th>
								<th>Endereço</th>
								<th>Bairro</th>
								<th>Cidade</th>
								<th>UF</th>
								<th>Data Receb.</th>
								<th>Data Limite</th>
								<th>Status</th>
								<th>Observações</th>
								<th>Editar</th>
								<th>Histórico</th>
							</tr>
						</tfoot>
						<tbody>
							<?php 

								$dados = new PesquisaPorDataEntrega();
								$quant = 0;
								$quantLaudoPronto = 0;
								
								$data_inicial = filter_input(INPUT_POST, 'data_inicial');
								$data_final = filter_input(INPUT_POST, 'data_final');
								
								
								$resultado = $dados->pesquisaDataEntrega();

								if($resultado) {
									echo "".date_format(date_create($data_inicial), "d/m/Y")." a ".date_format(date_create($data_final), "d/m/Y")."<br><br>";
								}

								if($resultado != NULL){
	
								foreach ($resultado as  $value) {
								$quant++;
								if($value['status'] != "AGUARDANDO VISTORIA" && $value['status'] != "VISTORIA REALIZADA" && $value['status'] != "EM DIGITAÇÃO (I)" && $value['status'] != "EM DIGITAÇÃO (G)" && $value['status'] != "MILITÃO VAI DIGITAR" && $value['status'] != "AGUARDANDO MILITÃO" && $value['status'] != "REVISÃO DE VALOR" && $value['status'] != "FALTA INCLUIR LAUDO" && $value['status'] != "TRIAGEM" && $value['status'] != "EM ANÁLISE" && $value['status'] != "TRIAGEM" && $value['status'] != "AGUARDANDO CANCELAMENTO" && $value['status'] != "-") {
									$quantLaudoPronto++;
								}
									
							?>
							<tr>
								<td><?=$value['cod_os']?><?php if($value['ficha_pesquisa'] == 'PENDENTE' && $value['banco'] == 'CEF') { echo '<mark> ficha pendente</mark>';}?></td>
								<td><?=$value['tipo']?></td>
								<td><?=$value['banco']?></td>
								<td><?=$value['empresa']?></td>
								<td><?=$value['proponente']?></td>
								<td><?=$value['observacoes'].' '.$value['condominio']?></td>
								<td><?=$value['cidade']?></td>
								<td><?=$value['bairro']?></td>
								<td><?=$value['uf']?></td>
								<td><?=date_format(date_create($value['data_receb']), "d/m/Y")?></td>
								<td><?=date_format(date_create($value['data_entrega']), "d/m/Y")?></td>
								<td class="status"><?=$value['status']?></td>
								<td><?=$value['notas_importantes']?></td>

								<td align="center"><a href="/?pagina=editar-os&cod_os=<?=$value['cod_os']?>&form=pesquisa-por-data-entrega" title="Editar" target="_blank"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
								<td align="center"><a href="/?pagina=historico&cod_os=<?=$value['cod_os']?>&form=pesquisa-por-data-entrega" title="Histórico" target="_blank"><i class="fa fa-history" aria-hidden="true"></a></td>
							</tr>
							<script>verificaStatus()</script>
							<?php 
								$conexao = null;
								}
							} else {
								//echo "<span class='text-danger'>NENHUM DADO RETORNADO.</span><br><br>";
							} 
							?>
						</tbody>
					</table>
					<br>
					<span id="qtdDemandas" class="status sr-only"><?=$quant?></span>
					<span id="qtdlaudoPronto" class="status sr-only"><?=$quantLaudoPronto?></span>
				</div>
			</div>
		</div>
		
		<?php require_once 'includes/rodape.php';?>
	</div>

	<?php require_once 'includes/bootstrap-js.php'; ?>

	<!-- BARRA DE PROGRESSO DOS SERVIÇOS EXECUTADOS -->
	<script type="text/javascript">
      Redirect();
      configurarBarra();
	</script>
</body>
</html>