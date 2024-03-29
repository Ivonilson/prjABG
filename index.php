<?php
session_start();
require "model/Conn.php";
include "controller/crtValidarUsuario.php";
include "controller/crtLogout.php";
require "model/CadastrarNotificacao.php";
require "model/EditarNotificacao.php";

$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : "login";

	switch ($pagina) {

		case 'demandas-do-dia':
			require "controller/crtDemandasDoDia.php";
			break;

		case 'testes':
			include "view/testes.php";
			break;

		case 'cadastrar-os':
			require "controller/crtCadastrarOs.php";
			include_once "view/cadastrar-os.php";
			break;
		
		case 'cadastrar-item-cot':
			require "controller/crtCot.php";
			include_once "view/cadastrar-item-cot.php";
			break;

		case 'cadastrar-item-coc':
				require "controller/crtCoc.php";
				include_once "view/cadastrar-item-coc.php";
				break;

		case 'cadastrar-item-card':
				require "controller/crtCard.php";
				include_once "view/cadastrar-item-card.php";
				break;

		case 'historico-item-cot':
			require "controller/crtCot.php";
			include_once "view/historico-item-cot.php";
			break;

		case 'historico-item-coc':
			require "controller/crtCoc.php";
			include_once "view/historico-item-coc.php";
			break;

		case 'historico-item-card':
			require "controller/crtCard.php";
			include_once "view/historico-item-card.php";
			break;

		case 'editar-item-cot':
			require "controller/crtCot.php";
			include_once "view/editar-item-cot.php";
			break;

		case 'editar-item-coc':
			require "controller/crtCoc.php";
			include_once "view/editar-item-coc.php";
			break;

		case 'editar-item-card':
			require "controller/crtCard.php";
			include_once "view/editar-item-card.php";
			break;

		case 'cadastrar-cidade':
			require "controller/crtCadastrarCidade.php";
			include_once "view/cadastrar-cidade.php";
			break;

		case 'cadastrar-notificacao':
			require "controller/crtCadastrarNotificacao.php";
			include_once "view/cadastrar-notificacao.php";
			break;

		case 'notificacoes-cadastradas':
			require "model/NotificacoesCadastradas.php";
			require "controller/crtNotificacoesCadastradas.php";
			include_once "view/notificacoes-cadastradas.php";
			break;

		case 'cadastrar-evento':
			require "controller/crtCadastrarEvento.php";
			$crtl = new crtCadastrarEvento();
			$crtl->cadastrarEvento();
			break;

		case 'editar-notificacao':
			require "controller/crtEditarNotificacao.php";
			break;

		case 'editar-notif':
			require "controller/crtEditarNotif.php";
			include_once "view/editar-notif.php";
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

		case 'editar-modelo':
			require "controller/crtEditarModelo.php";
			$crtl = new crtEditarModelo();
			$crtl->editarModelo();
			break;

		case 'historico-modelo':
			require "controller/crtHistoricoModelo.php";
			$crtl = new crtHistoricoModelo();
			$crtl->historicoModelo();
			break;

		case 'modelos':
			require "controller/crtModelos.php";
			$crtl = new crtModelos();
			$crtl->Modelos();
			break;

		case 'incluir-modelo':
			require "controller/crtModelo.php";
			$crtl = new crtModelo();
			$crtl->incluirModelo();
			break;

		case 'cadastrar-gastos-viagem':
			require "controller/crtCadastrarGastosViagem.php";
			include_once "view/cadastrar-gastos-viagem.php";
			break;

		case 'gastos-viagem':
			require "controller/crtGastosViagem.php";
			include_once "view/gastos-viagem.php";
			break;

			case 'editar-gastos-viagem':
				require "controller/crtEditarGastosViagem.php";
				include_once "view/editar-gastos-viagem.php";
				break;

		case 'login':
			include "view/login.php";
			break;

		case 'logout':
			$logout = new crtLogout();
			$logout->logout();
			break;

	}

?>