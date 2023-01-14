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
	<title>Editar Notificação</title>
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
					<mark class="p-2 rounded">Editar Notificação</mark>
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
							<h4>Editando notificação n° <?=$_GET['id_notificacao']?></h4>
							<?php var_dump($notificacao)  ?>
						</div>
					</div>

					<div class="form-row align-items-center">

						<div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
							<label class="lbl-cadastro" for="inlineFormInputId">N° Notificação</label>
							<input type="text" disabled class="form-control mb-2" id="inlineFormInputId" value="<?= $notificacao->id_notificacao ?>" required>
							<input type="hidden" class="form-control mb-2" id="inlineFormInputItem" value="<?= $notificacao->id_notificacao ?>"  name="ipt-id-notificacao" required>
						</div>

						<div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
							<label class="lbl-cadastro" for="inlineFormInputRemetente">Remetente</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputRemetente" value="<?=$notificacao->remetente?>" name="ipt-remetente" required>
						</div>

                        <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
							<label class="lbl-cadastro" for="inlineFormInputDestinario">Destinatário</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputDestinatario" value="<?=$notificacao->destinatario?>" name="ipt-destinario" required>
						</div>

                        <div class="col-12">
							<label class="lbl-cadastro" for="inlineFormInputDescricao">Descricao</label>
							<input type="text" class="form-control mb-2" id="inlineFormInputDescricao" name="input-descricao" value="<?=$notificacao->descricao?>">
						</div>

						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        	<div class="input-group mb-2">
								<div class="input-group-prepend">
									<label class="lbl-cadastro" for="select-status">
										Status
									</label>
								</div>
								<select class="custom-select" name="sel-status" id="select-status">
									<option value=<?=$notificacao->status?>"><?=$notificacao->status?></option>
									<option value="PENDENTE">PENDENTE</option>
									<option value="RESOLVIDO">RESOLVIDO</option>
									<option value="ADIAR">ADIAR</option>
								</select>
							</div>
						</div>

						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="lbl-cadastro">
										Data alerta
									</div>
								</div>
								<input type="date" class="form-control" name="ipt-dataAlerta" value="<?=0?>">
							</div>
						</div>

						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="lbl-cadastro">
										Data limite
									</div>
								</div>
								<input type="date" class="form-control" name="ipt-dataLimite" value="<?=$notificacao->data_limite?>">
							</div>
						</div>

						<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<label class="lbl-cadastro" for="select-prioridade">
										Prioridade
									</label>
								</div>
								<select class="custom-select" name="sel-prioridade" id="select-prioridade">
									<option value="<?=0?>"><?=0?></option>
									<option value="NORMAL">NORMAL</option>
									<option value="ALTA">ALTA</option>
									<option value="BAIXA">BAIXA</option>
								</select>
							</div>
						</div>

						<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<label class="lbl-cadastro" for="inlineFormInputMeio">
										Meio
									</label>
								</div>
								<input type="text" class="form-control" id="inlineFormInputMeio" value="<?=0?>" name="ipt-meio" required>
							</div>	
						</div>

						<div class="col-12">
							<label class="lbl-cadastro" for="inlineFormInputObservacoes">Observações</label>
							<textarea type="text" class="form-control mb-2" id="inlineFormInputObservacoes" cols="100" rows="3" placeholder="Observações" name="ta-observacoes"><?=0?></textarea>
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