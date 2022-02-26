<?php

	class crtCadastrarNotificacao {

		public function cadastrarNotificacao()
		{	
			$usuario = new Conn();
				include "view/cadastrar-notificacao.php";

				if(filter_input(INPUT_POST, 'sel-tipo') != '-' && filter_input(INPUT_POST, 'sel-tipo') != '') {
					$usuario = new CadastrarNotificacao();
					$usuario->cadNotificacao();
					
				} else {
					echo "NENHUM DADO ENVIADO.";
				}
		}

	}
?>