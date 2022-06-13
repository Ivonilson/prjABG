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
	<title>Lista Mamck</title>
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
					Listas
				</li>
				<li class="breadcrumb-item">
					<mark class="p-2 rounded">Mamck</mark>
				</li>
			</ol>
			<div id="imprimir">
			<div class="card mb-1">
				<?php  

					if ($_SESSION['user'] == "IVONILSON" || $_SESSION['user'] == "GUSTAVO"){
								
						$dados = new ListaMamck();
						$quant = new ListaMamck();

						$contador = $quant->quantListaMamck();

						$resultado = $dados->dadosListaMamck();

				?>
				<div class="card-header" style="font-size: 22px; font-family: Arial, Helvetica, sans-serif;">
					<i class="fa fa-table"></i> Vistorias pendentes <strong>MAMCK</strong> - <?php $hoje = date('d/m/Y');echo $hoje; echo " (última atualização às ".date('H')." h ".date('i')." m)"; echo "<br>TOTAL: <strong>".$contador[0]['total']."</strong>";?>

					<!-- DISPARADOR DO MODAL DO WHATSAPP-->
					<button type="button" class="btn btn-success float-right p-2 border-rouded" data-toggle="modal" data-target="#modalListaMamck">
						Envio Whatsapp
					</button>

				</div>
			</div>
			<div class="row">
				<div class="col">
					<table class="table table-bordered table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
						<thead class="thead-dark">
							<tr style="font-size: 22px; font-family: Arial, Helvetica, sans-serif;">
								<th>O.S</th>
								<th>BANCO</th>
								<th>PROPONENTE</th>
								<th>CIDADE/UF</th>
								<th>ENDEREÇO</th>
								<th>CONTATO</th>
								<th>DATA RECEB</th>
								<th>DATA ENTREGA</th>
								<!--<th class="sr-only">STATUS</th>-->
								<th>OBS.</th>
								<th id="esconder"></th>
							</tr>
						</thead>
						<!--<tfoot class="thead-dark">
							<tr>
								<th>O.S</th>
								<th>BANCO</th>
								<th>PROPONENTE</th>
								<th>CIDADE/UF</th>
								<th>ENDEREÇO</th>
								<th>CONTATO</th>
								<th>DATA RECEB</th>
								<th>DATA ENTREGA</th>
								<th>STATUS</th>
								<th>OBS.</th>
								<th id="esconder">EDITAR</th>
							</tr>
						</tfoot>-->
						<tbody>

							<?php 

								foreach ($resultado as  $value) {
									
							?>
							
							<tr style="font-size: 22px; font-family: Arial, Helvetica, sans-serif;">
								<td><?=$value['cod_os']?></td>
								<td><?=$value['banco']?></td>
								<td><?=$value['proponente']?></td>
								<td><?=$value['cidade']."/".$value['uf']?></td>
								<td><?=$value['observacoes']." - ".$value['bairro']." ".$value['condominio']?></td>
								<td><?=$value['CONTATO']?></td>
								<td><?=date_format(date_create($value['data_receb']), "d/m/Y")?></td>
								<td><?=date_format(date_create($value['data_entrega']), "d/m/Y")?></td>
								<!--<td class="sr-only"><strong class="statusLista"><?=$value['obs3']?></strong></td>-->
								<td><?=$value['obs2']?></td>
								<td align="center" id="esconder"><a href="/?pagina=editar-os&cod_os=<?=$value['cod_os']?>&form=lista-mamck" title="Editar"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
							</tr>
							<script>verificaStatusLista()</script>
							<?php 
								$conexao = null;
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

			<!--- MODAL DE DADOS PARA WHATSAPP -->
			<div class="modal fade" id="modalListaMamck" tabindex="-1" role="dialog" aria-labelledby="ModalLista" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title text-primary">LISTA DE VISTORIAS - MAMCK</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">

							<?php 

								foreach ($resultado as  $value) {
									
							?>

							<span>📄 _*MAMCK*_ - *O.S <?=$value['cod_os']?>* - *<?=$value['banco']?>* - <?=$value['proponente']?> - *<?=$value['cidade']?>/<?=$value['uf']?>* - <?=$value['observacoes']." ".$value['condominio']?> - *<?=$value['bairro']?>* - 📞<?=$value['CONTATO']?> - <?=$value['obs3']?> - *<?=$value['obs2']?>* - DOCUMENTAÇÃO👇</span>
							<br>
							<hr>


							<?php  
								$conexao = null;
								}
							?>


						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
						</div>
					</div>
				</div>
			</div>
		</div>

	<!-- rodapé -->
	<?php require_once 'includes/rodape.php';?>
	<?php require_once 'includes/bootstrap-js.php'; ?>
</body>
</html>