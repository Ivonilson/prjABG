<?php

	class crtCadastrarNotificacao {

		public function cadastrarNotificacao(){	
			$usuario = new Conn();

				if(filter_input(INPUT_POST, 'ipt-remetente') != '-' && filter_input(INPUT_POST, 'ipt-remetente') != '') {
					$usuario = new CadastrarNotificacao();
					if($usuario->cadNotificacao()){
						return "Notificação cadastrada com Sucesso!";
					} else {
						return "ERRO. Verifique as informações de entrada e tente novamente ou contate o Suporte.";
				}
			}

		}

	}

	$crtl = new crtCadastrarNotificacao;
	$mensagem_erro = $crtl->cadastrarNotificacao();
?>