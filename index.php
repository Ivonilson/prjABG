<?php
session_start();
include "controller/crtValidarUsuario.php";
require "model/CadastrarNotificacao.php";
require "model/EditarNotificacao.php";

$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : "login";

	switch ($pagina) {

		case 'demandas-do-dia':
			require "controller/crtDemandasDoDia.php";
			$crtl = new crtDemandasdoDia();
			$crtl->demandasDoDia();
			break;

		case 'cadastrar-os':
			require "controller/crtCadastrarOs.php";
			include_once "view/cadastrar-os.php";
			break;

		case 'cadastrar-notificacao':
			require "controller/crtCadastrarNotificacao.php";
			$crtl = new crtCadastrarNotificacao();
			$crtl->cadastrarNotificacao();
			break;

		case 'cadastrar-evento':
			require "controller/crtCadastrarEvento.php";
			$crtl = new crtCadastrarEvento();
			$crtl->cadastrarEvento();
			break;

		case 'editar-notificacao':
			require "controller/crtEditarNotificacao.php";
			$crtl = new crtEditarNotificacao();
			$crtl->editarNotificacao();
			break;

		case 'editar-os':
			require "controller/crtEditarOs.php";
			include "view/editar-os.php";
			break;

		case 'pesquisa-por-data-receb':
			require "controller/crtPesquisaPorDataReceb.php";
			$crtl = new crtPesquisaPorDataReceb();
			$crtl->pesquisaPorDataReceb();
			break;

		case 'pesquisa-por-data-entrega':
			require "controller/crtPesquisaPorDataEntrega.php";
			$crtl = new crtPesquisaPorDataEntrega();
			$crtl->pesquisaPorDataEntrega();
			break;

		case 'pesquisa-por-os':
			require "controller/crtPesquisaPorOs.php";
			$crtl = new crtPesquisaPorOs();
			$crtl->pesquisaPorOs();
			break;

		case 'valor-de-avaliacao':
			require "controller/crtValorAvaliacao.php";
			$crtl = new crtValorAvaliacao();
			$crtl->valorAvaliacao();
			break;

		case 'lista-mamck':
			require "controller/crtListaMamck.php";
			$crtl = new crtListaMamck();
			$crtl->listaMamck();
			break;

		case 'lista-havalia':
			require "controller/crtListaHavalia.php";
			$crtl = new crtListaHavalia();
			$crtl->listaHavalia();
			break;

		case 'historico':
			require "controller/crtHistorico.php";
			$crtl = new crtHistorico();
			$crtl->historico();
			break;

		case 'nfe':
			require "controller/crtNFe.php";
			$crtl = new crtNFe();
			$crtl->Nfe();
			break;

		case 'logout':
			require "controller/crtLogout.php";
			$crtl = new crtLogout();
			$crtl->Logout();
			break;

		case 'login':
			require "view/login.php";
			break;
	}

?>