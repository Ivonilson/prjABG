<?php
require "model/CadastrarEvento.php";
require "model/Cidade.php";
require_once "model/DadosAuxiliares.php";

	class crtCadastrarEvento {

		public function cadastrarEvento()
		{	
			$usuario = new Conn();
				include "view/cadastrar-evento.php";

				if(filter_input(INPUT_POST, 'sel-tipo-evento') != 'INDEFINIDO' && filter_input(INPUT_POST, 'sel-tipo-evento') != '') {
					$usuario = new CadastrarEvento();
					
					$usuario->cadEvento();

				} else {
					echo "NENHUM DADO ENVIADO.";
				}
		}

	}
?>