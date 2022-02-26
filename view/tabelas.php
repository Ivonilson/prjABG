<!DOCTYPE html>
<htm lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Template Master</title>
	<link rel="stylesheet" type="text/css" href="../bibliotecas/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../bibliotecas/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../bibliotecas/datatables/dataTables.bootstrap4.css">
	<link rel="stylesheet" type="text/css" href="../css/sb-admin.min.css">
</head>
<body class="bg-dark fixed-nav sticky-footer" id="page-top">
	<!-- NAVEGAÇÃO -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav" >
		<a href="index.html" class="navbar-brand">Admin Curso</a>
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCurso" aria-control="navbarCurso" aria-expanded="false" aria-label="Navegação Toggle">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div id="navbarCurso" class="collapse navbar-collapse">
			<ul class="navbar-nav navbar-sidenav" id="linksaccordion">
				<li class="nav-item">
					<a href="#" class="nav-link">
						<i class="fa fa-fw fa-dashboard"></i>
						<span class="nav-link-text">Dashboard</span>
					</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">
						<i class="fa fa-fw fa-table"></i>
						<span class="nav-link-text">Tabelas</span>
					</a>
				</li>
				<li class="nav-item">
					<a href="#linkscomponentes" class="nav-link nav-link-collapse collapse" data-toggle="collapse" data-parent="#linksaccordion">
						<i class="fa fa-fw fa-wrench"></i>
						<span class="nav-link-text">Componentes</span>
					</a>
					<ul class="sidenav-second-level collapse" id="linkscomponentes">
						<li>
							<a href="login.html">Página Login</a>
						</li>
						<li>
							<a href="recuperar.html">Página Recuperar</a>
						</li>
						<li>
							<a href="registro.html">Página Registro</a>
						</li>
						<li>
							<a href="#link3nivel" class="nav-link-collapse collapse" data-toggle="collapse">Links 3 níveis</a>
							<ul class="sidenav-third-level collapse" id="link3nivel">
								<li>
									<a href="#">Link 1</a>
								</li>
								<li>
									<a href="#">Link 2</a>
								</li>
								<li>
									<a href="#">Link 3</a>
								</li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="nav-item">
					<a href="#linkspagina" class="nav-link nav-link-collapse collapse" data-toggle="collapse" data-parent="#linksaccordion">
						<i class="fa fa-fw fa-file"></i>
						<span class="nav-link-text">Páginas</span>
					</a>
					<ul class="sidenav-second-level collapse" id="linkspagina">
						<li>
							<a href="login.html">Página Login</a>
						</li>
						<li>
							<a href="recuperar.html">Página Recuperar</a>
						</li>
						<li>
							<a href="registro.html">Página Registro</a>
						</li>
					</ul>
				</li>
			</ul>

			<ul class="navbar-nav sidenav-toggler">
				<li class="nav-item">
					<a href="#" id="sidenavToggler" class="nav-link text-center">
						<i class="fa fa-fw fa-angle-left"></i>
					</a>
				</li>	
			</ul>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item dropdown">
					<a href="#" class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fa fa-fw fa-envelope"></i>
						<span class="d-lg-none">
							Mensagens
							<span class="badge badge-pill badge-primary">12 novas</span>
						</span>
						<span class="indicator text-primary d-none d-lg-block">
							<i class="fa fa-fw fa-circle"></i>
						</span>
					</a>

					<div class="dropdown-menu" aria-labelledby="messagesDropdown">
						<h6 class="dropdown-header">Novas Mensagens</h6>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<strong>José Francisco</strong>
							<span class="small float-right text-muted">14h30min</span>
							<div class="dropdown-message small">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							</div>
							<div class="dropdown-divider"></div>
						</a>
						<a href="#" class="dropdown-item">
							<strong>Maria Carolina</strong>
							<span class="small float-right text-muted">15h10min</span>
							<div class="dropdown-message small">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							</div>
							<div class="dropdown-divider"></div>
						</a>
						<a href="#" class="dropdown-item">
							<strong>Joice da Silva</strong>
							<span class="small float-right text-muted">15h51min</span>
							<div class="dropdown-message small">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							</div>
							<div class="dropdown-divider"></div>
							<a href="#" class="dropdown-item small">Ver todas as mensagens.</a>
						</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a href="#" class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fa fa-fw fa-bell"></i>
						<span class="d-lg-none">
							Alertas
							<span class="badge badge-pill badge-warning">5 novos</span>
						</span>
						<span class="indicator text-warning d-none d-lg-block">
							<i class="fa fa-fw fa-circle"></i>
						</span>
					</a>
					<div class="dropdown-menu" aria-labelledby="alertsDropdown">
						<h6 class="dropdown-header">Novos Alertas</h6>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<span class="text-success">
								<strong>
									<i class="fa fa-fw fa-long-arrow-up"></i>
									Atualização de Estado
								</strong>
							</span>
							<span class="small float-right text-muted">14:55</span>
							<div class="dropdown-message small">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							</div>
							<div class="dropdown-divider"></div>
						</a>
						<a href="#" class="dropdown-item">
							<span class="text-danger">
								<strong>
									<i class="fa fa-fw fa-long-arrow-down"></i>
									Atualização de Estado
								</strong>
							</span>
							<span class="small float-right text-muted">14:55</span>
							<div class="dropdown-message small">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							</div>
							<div class="dropdown-divider"></div>
							<a href="#" class="dropdown-item small">Ver todos os alertas</a>
						</a>
					</div>
				</li>

				<li class="nav-item">
					<form class="form-inline my-2 my-lg-0 mr-lg-2">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Pesquisar por...">
							<span class="input-group-btn">
								<button class="btn btn-primary" type="button">
									<i class="fa fa-search"></i>
								</button>
							</span>
						</div>
					</form>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">
						<i class="fa fa-sign-out">Logout</i>
					</a>
				</li>
			</ul>

		</div>
	</nav>
	<div class="content-wrapper">
		<div class="container-fluid">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="cards.html">Home</a>
				</li>
				<li class="breadcrumb-item">
					Tabelas
				</li>
			</ol>
			<div class="card mb-3">
				<div class="card-header">
					<i class="fa fa-table"></i> Exemplo de Tabela
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<h1>Tabelas</h1>
				</div>
				<div class="card-body">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>Nome</th>
								<th>Cargo</th>
								<th>Local</th>
								<th>Idade</th>
								<th>Inicio</th>
								<th>Salário</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Nome</th>
								<th>Cargo</th>
								<th>Local</th>
								<th>Idade</th>
								<th>Inicio</th>
								<th>Salário</th>
							</tr>
						</tfoot>
						<tbody>
							<tr>
								<td>Emerson Carvalho</td>
								<td>Programador</td>
								<td>Brasil</td>
								<td>30</td>
								<td>27/11/2010</td>
								<td>R$ 1.000,00</td>
							</tr>
							<tr>
								<td>Emerson Carvalho</td>
								<td>Programador</td>
								<td>Brasil</td>
								<td>20</td>
								<td>27/11/2010</td>
								<td>r$ 1.000,00</td>
							</tr>
							<tr>
								<td>Emerson Carvalho</td>
								<td>Programador</td>
								<td>Brasil</td>
								<td>18</td>
								<td>27/11/2010</td>
								<td>r$ 1.000,00</td>
							</tr>
							<tr>
								<td>Emerson Carvalho</td>
								<td>Programador</td>
								<td>Brasil</td>
								<td>30</td>
								<td>27/11/2010</td>
								<td>r$ 1.000,00</td>
							</tr>
							<tr>
								<td>Emerson Carvalho</td>
								<td>Programador</td>
								<td>Brasil</td>
								<td>30</td>
								<td>27/11/2010</td>
								<td>r$ 1.000,00</td>
							</tr>
							<tr>
								<td>Emerson Carvalho</td>
								<td>Programador</td>
								<td>Brasil</td>
								<td>30</td>
								<td>27/11/2010</td>
								<td>r$ 1.000,00</td>
							</tr>
							<tr>
								<td>Emerson Carvalho</td>
								<td>Programador</td>
								<td>Brasil</td>
								<td>30</td>
								<td>27/11/2010</td>
								<td>r$ 1.000,00</td>
							</tr>
							<tr>
								<td>Emerson Carvalho</td>
								<td>Programador</td>
								<td>Brasil</td>
								<td>30</td>
								<td>27/11/2010</td>
								<td>r$ 1.000,00</td>
							</tr>
							<tr>
								<td>Emerson Carvalho</td>
								<td>Programador</td>
								<td>Brasil</td>
								<td>30</td>
								<td>27/11/2010</td>
								<td>r$ 1.000,00</td>
							</tr>
							<tr>
								<td>Emerson Carvalho</td>
								<td>Programador</td>
								<td>Brasil</td>
								<td>30</td>
								<td>27/11/2010</td>
								<td>r$ 1.000,00</td>
							</tr>
							<tr>
								<td>Emerson Carvalho</td>
								<td>Programador</td>
								<td>Brasil</td>
								<td>30</td>
								<td>27/11/2010</td>
								<td>r$ 1.000,00</td>
							</tr>
							<tr>
								<td>Emerson Carvalho</td>
								<td>Programador</td>
								<td>Brasil</td>
								<td>30</td>
								<td>27/11/2010</td>
								<td>r$ 1.000,00</td>
							</tr>
							<tr>
								<td>Emerson Carvalho</td>
								<td>Programador</td>
								<td>Brasil</td>
								<td>30</td>
								<td>27/11/2010</td>
								<td>r$ 1.000,00</td>
							</tr>
							<tr>
								<td>Emerson Carvalho</td>
								<td>Programador</td>
								<td>Brasil</td>
								<td>30</td>
								<td>27/11/2010</td>
								<td>r$ 1.000,00</td>
							</tr>
							<tr>
								<td>Emerson Carvalho</td>
								<td>Programador</td>
								<td>Brasil</td>
								<td>30</td>
								<td>27/11/2010</td>
								<td>r$ 1.000,00</td>
							</tr>
							<tr>
								<td>Emerson Carvalho</td>
								<td>Programador</td>
								<td>Brasil</td>
								<td>30</td>
								<td>27/11/2010</td>
								<td>r$ 1.000,00</td>
							</tr>
							<tr>
								<td>Emerson Carvalho</td>
								<td>Programador</td>
								<td>Brasil</td>
								<td>30</td>
								<td>27/11/2010</td>
								<td>r$ 1.000,00</td>
							</tr>
							<tr>
								<td>Emerson Carvalho</td>
								<td>Programador</td>
								<td>Brasil</td>
								<td>30</td>
								<td>27/11/2010</td>
								<td>r$ 1.000,00</td>
							</tr>
							<tr>
								<td>Emerson Carvalho</td>
								<td>Programador</td>
								<td>Brasil</td>
								<td>30</td>
								<td>27/11/2010</td>
								<td>r$ 1.000,00</td>
							</tr>
							<tr>
								<td>Emerson Carvalho</td>
								<td>Programador</td>
								<td>Brasil</td>
								<td>30</td>
								<td>27/11/2010</td>
								<td>r$ 1.000,00</td>
							</tr>
							<tr>
								<td>Emerson Carvalho</td>
								<td>Programador</td>
								<td>Brasil</td>
								<td>30</td>
								<td>27/11/2010</td>
								<td>r$ 1.000,00</td>
							</tr>
							<tr>
								<td>Emerson Carvalho</td>
								<td>Programador</td>
								<td>Brasil</td>
								<td>30</td>
								<td>27/11/2010</td>
								<td>r$ 1.000,00</td>
							</tr>
							<tr>
								<td>Emerson Carvalho</td>
								<td>Programador</td>
								<td>Brasil</td>
								<td>30</td>
								<td>27/11/2010</td>
								<td>r$ 1.000,00</td>
							</tr>
							<tr>
								<td>Emerson Carvalho</td>
								<td>Programador</td>
								<td>Brasil</td>
								<td>30</td>
								<td>27/11/2010</td>
								<td>r$ 1.000,00</td>
							</tr>
							<tr>
								<td>Emerson Carvalho</td>
								<td>Programador</td>
								<td>Brasil</td>
								<td>30</td>
								<td>27/11/2010</td>
								<td>r$ 1.000,00</td>
							</tr>
							<tr>
								<td>Emerson Carvalho</td>
								<td>Programador</td>
								<td>Brasil</td>
								<td>30</td>
								<td>27/11/2010</td>
								<td>r$ 1.000,00</td>
							</tr>
							<tr>
								<td>Emerson Carvalho</td>
								<td>Programador</td>
								<td>Brasil</td>
								<td>30</td>
								<td>27/11/2010</td>
								<td>r$ 1.000,00</td>
							</tr>
							<tr>
								<td>Emerson Carvalho</td>
								<td>Programador</td>
								<td>Brasil</td>
								<td>30</td>
								<td>27/11/2010</td>
								<td>r$ 1.000,00</td>
							</tr>
							<tr>
								<td>Emerson Carvalho</td>
								<td>Programador</td>
								<td>Brasil</td>
								<td>30</td>
								<td>27/11/2010</td>
								<td>r$ 1.000,00</td>
							</tr>
							<tr>
								<td>Emerson Carvalho</td>
								<td>Programador</td>
								<td>Brasil</td>
								<td>30</td>
								<td>27/11/2010</td>
								<td>r$ 1.000,00</td>
							</tr>
							<tr>
								<td>Emerson Carvalho</td>
								<td>Programador</td>
								<td>Brasil</td>
								<td>30</td>
								<td>27/11/2010</td>
								<td>r$ 1.000,00</td>
							</tr>
							<tr>
								<td>Emerson Carvalho</td>
								<td>Programador</td>
								<td>Brasil</td>
								<td>30</td>
								<td>27/11/2010</td>
								<td>r$ 1.000,00</td>
							</tr>
							<tr>
								<td>Emerson Carvalho</td>
								<td>Programador</td>
								<td>Brasil</td>
								<td>30</td>
								<td>27/11/2010</td>
								<td>r$ 1.000,00</td>
							</tr>
							<tr>
								<td>Emerson Carvalho</td>
								<td>Programador</td>
								<td>Brasil</td>
								<td>30</td>
								<td>27/11/2010</td>
								<td>r$ 1.000,00</td>
							</tr>
							<tr>
								<td>Emerson Carvalho</td>
								<td>Programador</td>
								<td>Brasil</td>
								<td>30</td>
								<td>27/11/2010</td>
								<td>r$ 1.000,00</td>
							</tr>
							<tr>
								<td>Emerson Carvalho</td>
								<td>Programador</td>
								<td>Brasil</td>
								<td>30</td>
								<td>27/11/2010</td>
								<td>r$ 1.000,00</td>
							</tr>
							<tr>
								<td>Emerson Carvalho</td>
								<td>Programador</td>
								<td>Brasil</td>
								<td>30</td>
								<td>27/11/2010</td>
								<td>r$ 1.000,00</td>
							</tr>
							<tr>
								<td>Emerson Carvalho</td>
								<td>Programador</td>
								<td>Brasil</td>
								<td>30</td>
								<td>27/11/2010</td>
								<td>r$ 1.000,00</td>
							</tr>
							<tr>
								<td>Emerson Carvalho</td>
								<td>Programador</td>
								<td>Brasil</td>
								<td>30</td>
								<td>27/11/2010</td>
								<td>r$ 1.000,00</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<footer  class="sticky-footer">
			<div class="container">
				<div class="text-center">
					<small>Copyright ABG 2020</small>
				</div>
			</div>
		</footer>
	</div>

	<script src="../bibliotecas/jquery/jquery.min.js"></script>
	<script src="../bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="../bibliotecas/jquery-easing/jquery.easing.min.js"></script>
	<script src="../bibliotecas/datatables/jquery.dataTables.js"></script>
	<script src="../bibliotecas/datatables/dataTables.bootstrap4.js"></script>
	<script type="../text/javascript" src="js/sb-admin.min.js"></script>
	<script type="../text/javascript" src="js/sb-admin-dataTables.min.js"></script>
</body>
</html>