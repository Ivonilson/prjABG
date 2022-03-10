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
	<?php require_once 'includes/bootstrap-css.php'; ?>
</head>
<body class="bg-dark fixed-nav sticky-footer" id="page-top">
	<!-- NAVEGAÇÃO -->
	<?php require_once 'includes/navegacao.php';?>
	
	<div class="content-wrapper">
		<div class="container-fluid">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					Home
				</li>
				<li class="breadcrumb-item">
					Ferramentas
				</li>
				<li class="breadcrumb-item">
					<mark class="p-2 rounded">NFe</mark>
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

	<div id="background-tela-cadastro">
				
		<form class="container background-form-cadastro" method="post">

				<div id="jumbotron_telas_cadastro">
					<div class="container">
						<h4>NFE</h4>
					</div>
				</div>

		<div class="form-row">

			<div class="col-12">
				<div class="input-group mb-2">
					<div class="input-group-prepend">
						<label class="lbl-cadastro" for="select-banco">
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
						<label class="lbl-cadastro" for="select-empresa">
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

			<input type="submit" name="" id="botoesGravarCad" value="CALCULAR" name="btnCadastrar">
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
	<?php require_once 'includes/rodape.php';?>
</div>
	<?php require_once 'includes/bootstrap-js.php'; ?>
</body>
</html>