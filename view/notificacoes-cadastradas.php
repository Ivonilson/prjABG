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
	<title>Notificações cadastradas</title>
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
					<mark class="p-2 rounded">Notificações</mark>
				</li>
			</ol>

            <!-- 
			<div class="row mb-3 justify-content-center">

				<div class="div-botoes-consulta">
					<a href="?pagina=demandas-do-dia" class="botoes-atalho-cons" title="Demandas vencendo hoje"><i class="fa fa-search " aria-hidden="true"></i> Vencendo Hoje </a>
				</div>

				<div class="div-botoes-consulta">
					<a href="?pagina=pesquisa-por-os" class="botoes-atalho-cons" title="Pesq. O.S. por código"><i class="fa fa-search" aria-hidden="true"></i> O.S. por código </a>
				</div>

				<div class="div-botoes-consulta">
					<a href="?pagina=pesquisa-por-data-entrega" class="botoes-atalho-cons" title="Pesq. por data de entrega"><i class="fa fa-search " aria-hidden="true"></i> O.S(s) por entrega </a>
				</div>

				<div class="div-botoes-consulta">
					<a href="?pagina=valor-de-avaliacao" class="botoes-atalho-cons" title="Valor de avaliação"><i class="fa fa-search " aria-hidden="true"></i> Valor de Avaliação </a>
				</div>

			</div>
            -->

			<div class="card mb-1 background-form-cons">
				<div class="card-header">
					<i class="fa fa-table"></i> Pesquisar notificações
					<br>
					<br>
					
					<!--
					<form method="post" class="background-form-cons">
						<div class="p-2">
							<select name="" id="">
								<option value="PENDENTE"> PENDENTE </option>
								<option value="RESOLVIDO"> RESOLVIDO </option>
								<option value="ADIAR"> ADIAR </option>
							</select>
						</div>
					</form>
					-->
				</div>
			</div>
			<div id="row-tbl-consulta">
				<div class="col pt-3">
				
					<table class="table table-bordered table-sm table-hover border" id="dataTable" width="100%" cellspacing="0">
						<thead class="thead-light">
							<tr>
								<th>Cód. Notif.</th>
								<th>Remetente</th>
								<th>Destinatário</th>
								<th>Descrição</th>
								<th>Status</th>
								<th>Data de emissão</th>
								<th>Data limite</th>
								<th>Data alerta</th>
								<th>Prioridade</th>
								<th>Observações</th>
								<th>Cadastrado por</th>
								<th>Editar</th>
								<!-- <th>Histórico</th> -->
							</tr>
						</thead>
						<tfoot class="thead-light">
							<tr>
								<th>Cód. Notif.</th>
								<th>Remetente</th>
								<th>Destinatário</th>
								<th>Descrição</th>
								<th>Status</th>
								<th>Data de emissão</th>
								<th>Data limite</th>
								<th>Data alerta</th>
								<th>Prioridade</th>
								<th>Observações</th>
								<th>Cadastrado por</th>
								<th>Editar</th>
								<!-- <th>Histórico</th> -->
							</tr>
						</tfoot>
						<tbody>
							<?php 
								
								$data_inicial = filter_input(INPUT_POST, 'data_inicial');
								$data_final = filter_input(INPUT_POST, 'data_final');
								
								/* if($todas_notificacoes) {
									echo "".date_format(date_create($data_inicial), "d/m/Y")." a ".date_format(date_create($data_final), "d/m/Y")."<br><br>";
								}*/

                                //var_dump($todas_notificacoes);

								if($todas_notificacoes != NULL){
	
								foreach ($todas_notificacoes as  $value) {	
							?>
							<tr>
                                <td><?= $value['id_notificacao'] ?></td>
								<td><?= $value['remetente'] ?></td>
								<td><?=$value['destinatario']?></td>
								<td><?=$value['descricao']?></td>
								<td><?=$value['status']?></td>
                                <td><?=date_format(date_create($value['data_emissao']), "d/m/Y")?></td>
                                <td><?=date_format(date_create($value['data_limite']), "d/m/Y")?></td>
                                <td><?=date_format(date_create($value['data_programada_resolver']), "d/m/Y")?></td>
								<td><?=$value['prioridade']?></td>
								<td><?=$value['observacoes']?></td>
								<td><?=$value['usuario']?></td>

								<td align="center"><a href="/?pagina=editar-notif&id_notificacao=<?=$value['id_notificacao']?>&form=editar-notif" title="Editar"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
								<!-- <td align="center"><a href="/?pagina=historico&cod_os=<?=$value['id_notificacao']?>&form=pesquisa-por-data-receb" title="Histórico" target="_blank"><i class="fa fa-history" aria-hidden="true"></a></td>-->
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