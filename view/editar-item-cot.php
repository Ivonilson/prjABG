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
	<title>Editar Item COT</title>
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
					Cadastrar Item COT
				</li>
				<li class="breadcrumb-item">
					<mark class="p-2 rounded">Editar Item COT</mark>
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
							<h4>Cadastrar Item COT</h4>
						</div>
					</div>

					<div class="form-row align-items-center">

						<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputItem">Nº DO ITEM</label>
							<input type="text" disabled class="form-control mb-2" id="inlineFormInputItem" value="<?=$item[0]['item']?>" required>
							<input type="hidden" class="form-control mb-2" id="inlineFormInputItem" value="<?=$item[0]['item']?>"  name="ipt-item-ed" required>
						</div>

						<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<label class="lbl-cadastro" for="select-versao">
										VERSÃO
									</label>
								</div>
								<select class="custom-select" name="sel-versao-ed" id="select-versao">
									<option value="<?=$item[0]['versao']?>"><?=$item[0]['versao']?></option>
									<option value="v47">v47</option>
									<option value="v48">v48</option>
									<option value="v49">v49</option>
									<option value="v50">v50</option>
									<option value="v51">v51</option>
									<option value="v52">v52</option
									<option value="v53">v53</option>
                                    <option value="v54">v54</option>
                                    <option value="v55">v55</option>
                                    <option value="v56">v56</option>
                                    <option value="v57">v57</option>
								</select>
							</div>
						</div>

                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
							<label class="sr-only" for="inlineFormInputTitulo">Título</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputTitulo" value="<?=$item[0]['titulo']?>" name="ipt-titulo-ed" required>
						</div>

                        <div class="col-12">
							<label class="sr-only" for="inlineFormInputDescricao">DESCRIÇÃO</label>
							<textarea type="text" class="form-control mb-2" id="inlineFormInputDescricao" cols="100" rows="3" name="ta-descricao-cot-ed"><?=$item[0]['descricao']?></textarea>
						</div>

                        <div class="col-12">
							<label class="sr-only" for="inlineFormInputObservacoes">OBSERVAÇÕES</label>
							<textarea type="text" class="form-control mb-2" id="inlineFormInputObservacoes" cols="100" rows="3" name="ta-observacoes-cot-ed"><?=$item[0]['observacoes']?></textarea>
						</div>

						<input type="submit" id="botoesGravarCad" value="Gravar Alterações"name="btnEditarItemCod" onmouseover="hoverOverBtnGravarCad()" onmouseout="hoverOutBtnGravarCad()">

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