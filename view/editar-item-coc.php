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
	<title>Editar Item COC</title>
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
					Registros
				</li>
				<li class="breadcrumb-item">
					Editar Item COT
				</li>
				<li class="breadcrumb-item">
					<mark class="p-2 rounded">Editar Item COC</mark>
				</li>
				
			</ol>

					<!--Feedback da Edição -->
					<?php

						if($mensagem_erro == "Item editado com Sucesso!")
						{
					?>

					<div class="alert alert-success font-weight-bold alertaCadOsOk col-12 text-center" role="alert">
 						<img src="../assets/ok.png"><h5><strong><?=$mensagem_erro?></strong></h5>
					</div>


					<?php 
						
						echo "<script>setTimeout(()=> window.location.href = '/?pagina=".$_GET['form']."', 3000)</script>";

						} elseif($mensagem_erro == "Erro. Contate o Suporte.") {
					?>

					<div class="alert alert-warning font-weight-bold text-danger alertaCadOsNoOk col-12 text-center" role="alert">
 						<img src="../assets/error.png"><h5><strong><?=$mensagem_erro?></strong></h5>
					</div>

					<?php 
						} 
					?>
	
			<div id="background-tela-cadastro">
				
				<form class="container background-form-cadastro" method="post">

					<div id="jumbotron_telas_cadastro">
						<div class="container ">
							<h4>Editar Item COC</h4>
						</div>
					</div>

					<div class="form-row align-items-center">

						<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputItem">Nº DO ITEM</label>
							<input type="text" disabled class="form-control mb-2" id="inlineFormInputItem" value="<?=$item[0]['item']?>" required>
							<input type="hidden" class="form-control mb-2" id="inlineFormInputItem" value="<?=$item[0]['item']?>"  name="ipt-item-ed" required>
						</div>

                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputTitulo">Título</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputTitulo" value="<?=$item[0]['versao']?>" name="ipt-versao-ed" required>
						</div>

                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputTitulo">Título</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputTitulo" value="<?=$item[0]['titulo']?>" name="ipt-titulo-ed" required>
						</div>

                        <div class="col-12">
							<label class="sr-only" for="inlineFormInputDescricao">DESCRIÇÃO</label>
							<textarea type="text" class="form-control mb-2" id="inlineFormInputDescricao" cols="100" rows="3" name="ta-descricao-coc-ed"><?=$item[0]['descricao']?></textarea>
						</div>

                        <div class="col-12">
							<label class="sr-only" for="inlineFormInputObservacoes">OBSERVAÇÕES</label>
							<textarea type="text" class="form-control mb-2" id="inlineFormInputObservacoes" cols="100" rows="3" name="ta-observacoes-coc-ed"><?=$item[0]['observacoes']?></textarea>
						</div>

						<input type="submit" id="botoesGravarCad" value="Gravar Alterações"name="btnEditarItemCot" onmouseover="hoverOverBtnGravarCad()" onmouseout="hoverOutBtnGravarCad()">

					</div>

					</div>
				</form>
			</div>

			<?php require_once 'includes/rodape.php';?>
			
		</div>
	</div>

	<?php require_once 'includes/bootstrap-js.php'; ?>
</body>
</html>