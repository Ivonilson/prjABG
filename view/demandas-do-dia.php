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
	<title>Controle de Demandas</title>
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

				<div class="col-12 mt-2">
					<a href="/?pagina=notificacoes-cadastradas" class="btn btn-info text-light ml-2 mt-2 float-right font-weight-bold rounded" title="Notificações cadastradas"><i class="fa fa-bell fa-blink"></i> Notificações</a>
					<a href="#" class="btn btn-info text-light ml-2 mt-2 float-right font-weight-bold rounded"  data-toggle="modal" data-target="#mdToDoList" title="Lista de Tarefas"><i class="fa fa-book"></i> Lista de Tarefas</a>
					<a href="#" class="btn btn-info text-light ml-2 mt-2 float-right font-weight-bold rounded"  data-toggle="modal" data-target="#mdCARD" title="CARD/E-mail CIHARGO"><i class="fa fa-book"></i> CARD/E-mail CIHARGO</a>
					<a href="#" class="btn btn-info text-light ml-2 mt-2 float-right font-weight-bold rounded"  data-toggle="modal" data-target="#mdCOC" title="Caderno de Orientações Complementares"><i class="fa fa-book"></i> COC</a>
					<a href="#" class="btn btn-info text-light ml-2 mt-2 float-right font-weight-bold rounded"  data-toggle="modal" data-target="#mdCOT" title="Caderno de Orientações Técnicas"><i class="fa fa-book"></i> COT</a>
					<a href="/?pagina=cadastrar-item-card" class="btn btn-danger text-light ml-2 mt-2 float-right font-weight-bold rounded" title="Incluir Novo Item CARD/E-mail."><i class="fa fa-plus"></i> Item CARD/E-mail</a>
					<a href="/?pagina=cadastrar-item-coc" class="btn btn-danger text-light ml-2 mt-2 float-right font-weight-bold rounded" title="Incluir Novo Item COC."><i class="fa fa-plus"></i> Item COC</a>
					<a href="/?pagina=cadastrar-item-cot" class="btn btn-danger text-light ml-2 mt-2 float-right font-weight-bold rounded" title="Incluir Novo Item COT."><i class="fa fa-plus"></i> Item COT</a>
					<a href="/?pagina=cadastrar-cidade" class="btn btn-danger text-light ml-2 mt-2 float-right font-weight-bold rounded" title="Incluir Nova Cidade."><i class="fa fa-plus"></i> Cidade</a>
					<a href="/?pagina=cadastrar-os" class="btn btn-danger text-light  ml-2 mt-2 float-right font-weight-bold rounded" title="Incluir Nova O.S."><i class="fa fa-plus"></i> O.S.</a>
					
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
								<td class="text-justify" id="td_notas_importantes">Contato da O.S:  <?= $value['CONTATO']?><br><hr><?= $value['notas_importantes']?> </td>
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

			<!-- MODAL COT --->

			<!-- Large modal -->
			<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="mdCOT">
				<div class="modal-dialog modal-lg body">
						<div class="col-12">
         					<button type="button" class="btn btn-secondary float-right" data-bs-dismiss="modal">Fechar</button>
      					</div>
						<div class="modal-content">	
							<div class="modal-header">
								<h5 class="col text-center">COT - Caderno de Orientações Técnicas</h5>
							</div>
							<div class="modal-body">

								<div class="row border-light bg-light m-2">
									<div class="col-lg-12">
										<table class="table table-bordered table-hover table-responsive" id="dataTable2" width="100%" cellspacing="0">
											<thead class="thead-light">
												<tr>
													<th  class="text-center">Item</th>
													<th  class="text-center">Título</th>
													<th  class="text-center">Versão</th>
													<th  class="text-center col-12">Descrição</th>
													<th  class="text-center">Editar</th>
													<th  class="text-center">Histórico</th>
												</tr>
											</thead>
											<tfoot class="thead-light">
												<tr>
													<th  class="text-center">Item</th>
													<th  class="text-center">Título</th>
													<th  class="text-center">Versão</th>
													<th  class="text-center col-12">Descrição</th>
													<th  class="text-center">Editar</th>
													<th  class="text-center">Histórico</th>
												</tr>
											</tfoot>
											<tbody>

												

												<?php 
													if ($_SESSION['user'] == "IVONILSON" || $_SESSION['user'] == "GUSTAVO"){

													//var_dump($resultadoCot);
												
													foreach ($resultadoCot as $value) {
														
												?>
												
												<tr class="itensTabela">
													<td  class="text-center"><?=$value['item']?></td>
													<td  class="text-center"><?=$value['titulo']?></td>
													<td  class="text-center"><?=$value['versao']?></td>
													<td class="text-justify"><?=$value['descricao'].'<hr>'.$value['observacoes']?> </td>
													<td align="center"><a href="/?pagina=editar-item-cot&item=<?=$value['item']?>&form=demandas-do-dia" title="Editar"><i class="fa fa-pencil" aria-hidden="true"></a></td>
													<td align="center"><a href="/?pagina=historico-item-cot&item-historico=<?=$value['item']?>" title="Histórico" target="_blank"><i class="fa fa-history" aria-hidden="true"></a></td>
												</tr>
												
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
						</div>				
					</div>
				</div>
			</div>
			<!-- fim do modal COT -->

			<!-- MODAL COC --->
			<!-- Large modal -->
			<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="mdCOC">
				<div class="modal-dialog modal-lg body">
						<div class="col-12">
         					<button type="button" class="btn btn-secondary float-right" data-bs-dismiss="modal">Fechar</button>
      					</div>
						<div class="modal-content">	
							<div class="modal-header">
								<h5 class="col text-center">COC - Caderno de Orientações Complementares</h5>
							</div>
							<div class="modal-body">

								<div class="row border-light bg-light m-2">
									<div class="col-lg-12">
										<table class="table table-bordered table-hover table-responsive" id="dataTable3" width="100%" cellspacing="0">
											<thead class="thead-light">
												<tr>
													<th  class="text-center">Item</th>
													<th  class="text-center">Título</th>
													<th  class="text-center">Versão</th>
													<th  class="text-center col-12">Descrição</th>
													<th  class="text-center">Editar</th>
													<th  class="text-center">Histórico</th>
												</tr>
											</thead>
											<tfoot class="thead-light">
												<tr>
													<th  class="text-center">Item</th>
													<th  class="text-center">Título</th>
													<th  class="text-center">Versão</th>
													<th  class="text-center col-12">Descrição</th>
													<th  class="text-center">Editar</th>
													<th  class="text-center">Histórico</th>
												</tr>
											</tfoot>
											<tbody>

												

												<?php 
													if ($_SESSION['user'] == "IVONILSON" || $_SESSION['user'] == "GUSTAVO"){

													//var_dump($resultadoCoc);
												
													foreach ($resultadoCoc as $value) {
														
												?>
												
												<tr class="itensTabela">
													<td  class="text-center"><?=$value['item']?></td>
													<td  class="text-center"><?=$value['titulo']?></td>
													<td  class="text-center"><?=$value['versao']?></td>
													<td class="text-justify"><?=$value['descricao'].'<hr>'.$value['observacoes']?> </td>
													<td align="center"><a href="/?pagina=editar-item-coc&item=<?=$value['item']?>&form=demandas-do-dia" title="Editar"><i class="fa fa-pencil" aria-hidden="true"></a></td>
													<td align="center"><a href="/?pagina=historico-item-coc&item-historico=<?=$value['item']?>" title="Histórico" target="_blank"><i class="fa fa-history" aria-hidden="true"></a></td>
												</tr>
												
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
						</div>				
					</div>
				</div>
			</div>
			<!-- fim do modal COC -->

			<!-- MODAL CARD --->
			<!-- Large modal -->
			<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="mdCARD">
				<div class="modal-dialog modal-lg body">
						<div class="col-12">
         					<button type="button" class="btn btn-secondary float-right" data-bs-dismiss="modal">Fechar</button>
      					</div>
						<div class="modal-content">	
							<div class="modal-header">
								<h5 class="col text-center">CARD/E-MAIL Com Orientações CIHARGO</h5>
							</div>
							<div class="modal-body">

								<div class="row border-light bg-light m-2">
									<div class="col-lg-12">
										<table class="table table-bordered table-hover table-responsive" id="dataTable4" width="100%" cellspacing="0">
											<thead class="thead-light">
												<tr>
													<th  class="text-center">Item</th>
													<th  class="text-center">Título</th>
													<th  class="text-center col-12">Descrição</th>
													<th  class="text-center">Editar</th>
													<th  class="text-center">Histórico</th>
												</tr>
											</thead>
											<tfoot class="thead-light">
												<tr>
													<th  class="text-center">Item</th>
													<th  class="text-center">Título</th>
													<th  class="text-center col-12">Descrição</th>
													<th  class="text-center">Editar</th>
													<th  class="text-center">Histórico</th>
												</tr>
											</tfoot>
											<tbody>

												

												<?php 
													if ($_SESSION['user'] == "IVONILSON" || $_SESSION['user'] == "GUSTAVO"){

													//var_dump($resultadoCard);
												
													foreach ($resultadoCard as $value) {
														
												?>
												
												<tr class="itensTabela">
													<td  class="text-center"><?=$value['item']?></td>
													<td  class="text-center"><?=$value['titulo']?></td>
													<td class="text-justify"><?=$value['descricao'].'<hr>'.$value['observacoes']?> </td>
													<td align="center"><a href="/?pagina=editar-item-card&item=<?=$value['item']?>&form=demandas-do-dia" title="Editar"><i class="fa fa-pencil" aria-hidden="true"></a></td>
													<td align="center"><a href="/?pagina=historico-item-card&item-historico=<?=$value['item']?>" title="Histórico" target="_blank"><i class="fa fa-history" aria-hidden="true"></a></td>
												</tr>
												
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
						</div>				
					</div>
				</div>
			</div>
			<!-- fim do modal CARD -->

			<!-- MODAL TO DO LIST --->
			<!-- Large modal -->
			<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="mdToDoList">
				<div class="modal-dialog modal-lg body">
						<div class="col-12">
         					<button type="button" class="btn btn-secondary float-right" data-bs-dismiss="modal">Fechar</button>
      					</div>
						<div class="modal-content">	
							<div class="modal-header">
								<!-- <h5 class="col text-center">Lista de Tarefas</h5>-->
							</div>
							<div class="modal-body">

								 <main id="app">
            						<section class="todo-list">
                						<h3>Lista de Tarefas</h3>
                						<div class="all-todos">
						                   	 <div 
						                        class="single-todo" v-for="todo in todos"
						                        :class="{done: todo.done}"
						                        @click="todo.done = !todo.done"
						                    >
						                        <p>{{ todo.text }}</p>
                    						</div>

                						</div>

                						<button class="clear" @click="todos=[]" v-if="todos.length">Limpar tudo</button>

               							<input type="text" placeholder="Escreva uma nova tarefa..." v-model="newTodo.text">
                						<button class="add" @click="addTodo()">Adicionar</button>

						                <div class="instructions">
						                    Instruções:
						                    <ul>
						                        <li>Clique no texto da tarefa para alternar entre feita / não feita</li>
						                        <li>Use o botão limpar tudo para remover todas as tarefas</li>
						                        <li>Use o input para adicionar novas tarefas</li>
						                    </ul>
						                </div>
           							 </section>

       							</main>

      						 </div>
						</div>				
					</div>
				</div>
			</div>
			<!-- fim do modal TO DO LIST -->
										
		</div>
		<!-- rodapé -->
		<?php require_once 'includes/rodape.php';?>
	</div>
	<?php require_once 'includes/bootstrap-js.php'; ?>
	<script src="https://unpkg.com/vue@next"></script>
	<script src="js/to-do-list.js"></script>

	<!-- REFRESH AUTOMÁTICO -->
	<!-- BARRA DE PROGRESSO DOS SERVIÇOS EXECUTADOS -->
	<script type="text/javascript">
      Redirect();
      configurarBarra();
	</script>
</body>
</html>