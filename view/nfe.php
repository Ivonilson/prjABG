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
	<title>Lista Havalia</title>
	<!--<link rel="stylesheet" type="text/css" href="../bibliotecas/bootstrap/css/bootstrap.min.css">-->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap2.min.css">
	<link rel="stylesheet" type="text/css" href="../bibliotecas/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../bibliotecas/datatables/dataTables.bootstrap4.css">
	<link rel="stylesheet" type="text/css" href="../css/sb-admin.min.css">
	<link rel="stylesheet" type="text/css" href="../css/abg.css">
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
					Ferramentas
				</li>
				<li class="breadcrumb-item">
					NFe
				</li>
			</ol>
			<div id="imprimir">
			<div class="card mb-1">
				<div class="card-header">
					<i class="fa fa-table"></i> NFe
				</div>
			</div>

			<div class="form-row align-items-center">
			<div class="card-body">
					
			<?php 
				$valor = @$_POST['valorNota'];
				$banco = @$_POST['Selecao'];
				$empresa = @$_POST['Empresa'];

				switch ($banco) {
					case '1':
						$banco = 'BANCO DO BRASIL PF';
						break;

					case '2':
						$banco = 'BANCO DO BRASIL PJ';
						break;

					case '3':
						$banco = 'BRB';
						break;
				
					case '4':
						$banco = 'CAIXA ECONÔMICA';
						break;

					case '5':
						$banco = 'POUPEX';
						break;

					case '6':
						$banco = 'FHE';
						break;

					case '7':
						$banco = 'BANCO INTER';
						break;

					default:
						$banco = 'INDEFINIDO';
						break;
				}

				$calcular = new Nfe();
				$conteudo1 = $calcular->calculaImpostos();
			//var_dump($conteudo1);
			?>

	<div class="row bg-secondary">
				
		<form class="container" method="post">

				<div class="jumbotron jumbotron-fluid bg-dark text-white">
					<div class="container">
						<h4>NFE</h4>
					</div>
				</div>

		<div class="form-row">

			<div class="col-12">
				<div class="input-group mb-2">
					<div class="input-group-prepend">
						<label class="input-group-text bg-secondary text-white" for="select-banco">
							BANCO
						</label>
					</div>
					<select class="custom-select" name="Selecao" id="select-banco">
						<option value="INDEFINIDO">Selecione</option>
						<option value="1">BANCO DO BRASIL PF</option>
						<option value="2">BANCO DO BRASIL PJ</option>
						<option value="3">BRB</option>
						<option value="4">CEF</option>
						<option value="5">POUPEX</option>
						<option value="6">FHE</option>
						<option value="7">BANCO INTER</option>
					</select>
				</div>
			</div>

			<div class="col-12">
				<div class="input-group mb-2">
					<div class="input-group-prepend">
						<label class="input-group-text bg-secondary text-white" for="select-empresa">
							EMPRESA
						</label>
					</div>
					<select name="Empresa" class="custom-select" id="select-empresa">
						<option value="INDEFINIDO">Selecione</option>
						<option value="Mamck">MAMCK</option>
						<option value="Havalia">HAVALIA</option>
						<!--<option value="Moreira">MOREIRA</option>-->
					</select>
				</div>
			</div>

			<div class="col-12">
				<label class="sr-only" for="inlineFormInputValorAvaliacao">VALOR(R$)</label>
				<input type="text" class="form-control mb-2" id="inlineFormInputValorAvaliacao" placeholder="Valor (R$)" name="valorNota">
			</div>

			<input type="submit" name="" class="col-12 btn btn-dark btn-block text-white" value="CALCULAR" name="btnCadastrar">
		</div>

		</form>
	</div>
	<br>
	<?php if(@$_POST['Selecao'] != "INDEFINIDO" AND @$_POST['Empresa'] != 'INDEFINIDO' AND @$_POST['Empresa'] != NULL) {?>
	<span class="bg-danger text-light pr-2 pl-2 pt-2 pb-2">Empresa: <?=$empresa?> - Banco: <?=$banco?> - Valor (R$): <?=@number_format($valor, '2',',','.')?></span>
	<?php } else {
		echo "Nenhum dado retornado.";
	} ?>

	<br>
	<br>
	<h4><?=$conteudo1?></4>
	<!--<p><?=$conteudo2?></p>
	<p><?=$conteudo3?></p>-->
	</div>

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
	<script src="../js/sb-admin-dataTables.min.js"></script>
</body>
</html>