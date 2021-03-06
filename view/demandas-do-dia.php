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
	<meta name="robots" content="noindex, nofollow">
	<title>Demandas do Dia</title>
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
					<mark class="p-2 rounded">Vencendo Hoje</mark>
				</li>

				<div class="col mt-2">
					<a href="/?pagina=cadastrar-cidade" class="btn btn-danger text-light ml-2 float-right font-weight-bold rounded" title="Incluir Nova Cidade."><i class="fa fa-plus"></i> Cidade</a>
					<a href="/?pagina=cadastrar-os" class="btn btn-danger text-light  float-right font-weight-bold rounded" title="Incluir Nova O.S."><i class="fa fa-plus"></i> O.S.</a>
				</div>

			</ol>

			<div class="row mb-3 justify-content-center">

				<div class="div-botoes-consulta">
					<a href="?pagina=pesquisa-por-os" class="botoes-atalho-cons" title="Pesq. O.S. por código"><i class="fa fa-search" aria-hidden="true"></i> O.S. por código </a>
				</div>

				<div class="div-botoes-consulta">
					<a href="?pagina=pesquisa-por-data-receb" class="botoes-atalho-cons" title="Pesq. por data de recebimento"><i class="fa fa-search " aria-hidden="true"></i> O.S(s) por receb. </a>
				</div>

				<div class="div-botoes-consulta">
					<a href="?pagina=pesquisa-por-data-entrega" class="botoes-atalho-cons" title="Pesq. por data de entrega"><i class="fa fa-search " aria-hidden="true"></i> O.S(s) por entrega </a>
				</div>

				<div class="div-botoes-consulta">
					<a href="?pagina=valor-de-avaliacao" class="botoes-atalho-cons" title="Valor de avaliação"><i class="fa fa-search " aria-hidden="true"></i> Valor de Avaliação </a>
				</div>

			</div>

			<div class="card mb-1">
				<div class="card-header">
					<i class="fa fa-table"></i> Demandas do dia - <?php $hoje = date('d/m/Y'); echo $hoje; echo " - (última atualização às ".date('H')." h ".date('i')." m)"; ?>
				<?php //var_dump($_SESSION['user'])?>
				</div>
			</div>
			<div class="row border-light bg-light m-2">
				<div class="col-lg-12">

				<!-- Barra de progresso -->
				<div class="row">
					<div barra-progresso="barraProgresso" class="col progresso pr-3 pl-3 pt-1 pb-1 mr-4 ml-4 mb-3 mt-3  rounded" title="Percentual de serviços finalizados">
						<div></div>
					</div>
				</div>
				
					<table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
						<thead class="thead-light">
							<tr>
								<th>O.S</th>
								<th>Empresa</th>
								<th>Cidade</th>
								<th>UF</th>
								<th>Bairro</th>
								<th>Tipo</th>
								<th>Banco</th>
								<th>Proponente</th>
								<th>Endereço</th>
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
								<th>Empresa</th>
								<th>Cidade</th>
								<th>UF</th>
								<th>Bairro</th>
								<th>Tipo</th>
								<th>Banco</th>
								<th>Proponente</th>
								<th>Endereço</th>
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
								if ($_SESSION['user'] == "IVONILSON" || $_SESSION['user'] == "GUSTAVO"){
								
								$dados = new DemandasDoDia();
								$quant = 0;
								$quantLaudoPronto = 0;

								$resultado = $dados->dadosDoDia();
								foreach ($resultado as  $value) {
								$quant++;
								if($value['status'] != "AGUARDANDO VISTORIA" && $value['status'] != "VISTORIA REALIZADA" && $value['status'] != "EM DIGITAÇÃO (I)" && $value['status'] != "EM DIGITAÇÃO (G)" && $value['status'] != "MILITÃO VAI DIGITAR" && $value['status'] != "AGUARDANDO MILITÃO" && $value['status'] != "REVISÃO DE VALOR" && $value['status'] != "FALTA INCLUIR LAUDO" && $value['status'] != "TRIAGEM" && $value['status'] != "EM ANÁLISE" && $value['status'] != "TRIAGEM" && $value['status'] != "AGUARDANDO CANCELAMENTO" && $value['status'] != "-") {
									$quantLaudoPronto++;
								}
									
							?>
							
							<tr class="itensTabela">
								<td><?=$value['cod_os']?><?php if($value['ficha_pesquisa'] == 'PENDENTE' && $value['banco'] == 'CEF') { echo '<mark> ficha pendente</mark>';}?></td>
								<td><?=$value['empresa']?></td>
								<td><?=$value['cidade']?></td>
								<td><?=$value['uf']?></td>
								<td><?=$value['bairro']?></td>
								<td><?=$value['tipo']?></td>
								<td><?=$value['banco']?></td>
								<td><?=$value['proponente']?></td>
								<td><?=$value['observacoes'].' '.$value['condominio']?></td>
								<td><?=date_format(date_create($value['data_receb']), "d/m/Y")?></td>
								<td><?=date_format(date_create($value['data_entrega']), "d/m/Y")?></td>
								<td class="status"><?=$value['status']?></td>
								<td class="text-justify" id="td_notas_importantes"> <?= $value['notas_importantes']?> </td>
								<td align="center"><a href="/?pagina=editar-os&cod_os=<?=$value['cod_os']?>&form=demandas-do-dia" title="Editar"><i class="fa fa-pencil" aria-hidden="true"></a></td>
								<td align="center"><a href="/?pagina=historico&cod_os=<?=$value['cod_os']?>&form=demandas-do-dia" title="Histórico" target="_blank"><i class="fa fa-history" aria-hidden="true"></a></td>
							</tr>
							<script>verificaStatus()</script>

							<?php 
								$conexao = null;
								}
							} else {
								echo "<span class='text-danger'>USUÁRIO SEM PERMISSÃO PARA VISUALIZAR AS INFORMAÇÕES DESTA PÁGINA.</span><br><br>";
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
		<!-- rodapé -->
		<?php require_once 'includes/rodape.php';?>
	</div>
	<?php require_once 'includes/bootstrap-js.php'; ?>

	<!-- REFRESH AUTOMÁTICO -->
	<!-- BARRA DE PROGRESSO DOS SERVIÇOS EXECUTADOS -->
	<script type="text/javascript">
      Redirect();
      configurarBarra();
	</script>
</body>
</html>