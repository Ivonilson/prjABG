<?php

	class crtNotificacao {

		public function cadastrarNotificacao(){	
			$usuario = new Conn();

				if(filter_input(INPUT_POST, 'sel-tipo') != '-' && filter_input(INPUT_POST, 'sel-tipo') != '') {
					$usuario = new CadastrarNotificacao();
					if($usuario->cadNotificacao()){
						return "Notificação cadastrada com Sucesso!";
					} else {
						return "ERRO. Verifique as informações de entrada e tente novamente ou contate o Suporte.";
				}
			}

		}

		public function editarNotificacao()
		{	
			$usuario = new Conn();
			$usuario = new EditarNotificacao();

				if(filter_input(INPUT_GET, 'sel-resolver') == "RESOLVIDO"){
					$usuario->edNotificacao();
				} elseif (filter_input(INPUT_GET, 'sel-resolver') == 'ADIAR' && filter_input(INPUT_GET, 'ipt-data-adiada') > date("Y-m-d")) {
					$usuario->edNotificacao();
				} else {
					echo "<script>alert('ERRO AO ADIAR... Verifique se não está passando uma data MENOR ou IGUAL a atual...')</script>";
					echo "<script>window.location.href ='/?pagina=demandas-do-dia'</script>";
				}
		}
	}

	$crtl = new crtNotificacao;
	$mensagem_erro = $crtl->cadastrarNotificacao();
	$crtl->EditarNotificacao();
?>