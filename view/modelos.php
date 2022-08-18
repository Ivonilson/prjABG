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
	<title>Modelos</title>
	<?php require_once 'includes/bootstrap-css.php'; ?>
</head>
<body class="bg-dark fixed-nav sticky-footer" id="page-top">
	<!-- NAVEGAÇÃO -->
	<?php require_once 'includes/navegacao.php';?>
	
	<div class="content-wrapper">
		<div class="container-fluid">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="?pagina=modelos" class="text-decoration-none">Início</a>
				</li>
				<li class="breadcrumb-item">
					Repositório
				</li>
				<li class="breadcrumb-item">
					<mark class="p-2 rounded">Visualizar Modelos</mark>
				</li>

				<div class="col">
					<a href="/?pagina=incluir-modelo" class="btn btn-danger text-light  float-right font-weight-bold rounded" title="Incluir Novo Modelo"><i class="fa fa-plus"></i> Modelo</a>
				</div>
			</ol>

			<div class="card mb-1 col">
				<div class="card-header">
					<i class="fa fa-table"></i> Modelos
					<br>
					<br>
					<form method="post">
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 input-group mb-2">
							<div class="input-group-prepend">
								<label class="input-group-text bg-secondary text-white" for="select-cidade">
									CIDADE
								</label>
							</div>
							<select class="custom-select" name="sel-cidade" id="select-cidade">
								<option value="">Selecione</option>
								<option value="TODAS">TODAS</option>

								<?php 
								
									foreach ($cidades as $value) {
												
								?>
								<option value="<?=$value['cidade']?>"><?=$value['cidade']?></option>

								<?php 

									}

								?>

							</select>
						</div>

						<div class="col-lg-4 col-md-3 col-sm-12 col-xs-12"> 
							<input type="submit" value="Buscar" class="btn btn-secondary btn-block font-weight-bold">
						</div>
					</form>
				</div>
			</div>

			<div class="row">
				<div class="col">
					<table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
						<thead class="thead-dark">
							<tr>
								<th class="col-1">Cidade</th>
								<th class="col-1">UF</th>
								<th>Tipologia</th>
								<th>ID</th>
								<th>Última O.S</th>
								<th>Empresa</th>
								<th>Banco</th>
								<th>Complemento</th>
								<th>Observações</th>
								<th>Última atualização</th>
								<th>Usuário</th>
								<th class="text-center">Download</th>
								<th>Atualizar</th>
								<th>Histórico</th>
							</tr>
						</thead>
						<tfoot class="thead-dark">
							<tr>
								<th class="col-1">Cidade</th>
								<th class="col-1">UF</th>
								<th>Tipologia</th>
								<th>ID</th>
								<th>Última O.S</th>
								<th>Empresa</th>
								<th>Banco</th>
								<th>Complemento</th>
								<th>Observações</th>
								<th>Última atualização</th>
								<th>Usuário</th>
								<th class="text-center">Download</th>
								<th>Atualizar</th>
								<th>Histórico</th>
							</tr>
						</tfoot>
						<tbody>

							<?php 

							if ($_SESSION['user'] == "IVONILSON" || $_SESSION['user'] == "GUSTAVO"){

							if(filter_input(INPUT_POST, 'sel-cidade') != null && $resultado != null){

								foreach ($resultado as  $value) {

							?>
							
							<tr class="itensTabela">
								<td><?=$value['cidade']?><br><small class='d-lg-none d-sm-nome d-md-none'><?=$value['tipologia']?></small></td>
								<td><?=$value['uf']?></td>
								<td><?=$value['tipologia']?></td>
								<td><?=$value['id']?></td>
								<td><?=$value['cod_os']?></td>
								<td><?=$value['empresa']?></td>
								<td><?=$value['banco']?></td>
								<td><?=$value['complemento']?></td>
								<td class="text-justify"><?=$value['observacoes']?></td>
								<td><?=date_format(date_create($value['data_atualizacao']), "d/m/Y H:i:s")?></td>
								<td><?=$value['usuario']?></td>
								<td align="center"><a href="../upload/modelos/<?=$value['modelo_inferencial']?>" download><?=$value['modelo_inferencial']?> <i class="fa fa-download" aria-hidden="true"></i></a></td>
								<td align="center"><a href="/?pagina=editar-modelo&id=<?=$value['id']?>&form=editar-modelo" title="Atualizar" target="_blank"><i class="fa fa-pencil" aria-hidden="true"></a></td>
								<td align="center"><a href="/?pagina=historico-modelo&cod_os=<?=$value['cod_os']?>&form=modelos" title="Histórico do Modelo" target="_blank"><i class="fa fa-history" aria-hidden="true"></a></td>
							</tr>

							<?php 
								$conexao = null;
								}
							}
							} else {
								echo "<span class='text-danger'>USUÁRIO SEM PERMISSÃO PARA VISUALIZAR AS INFORMAÇÕES DESTA PÁGINA.</span><br><br>";
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