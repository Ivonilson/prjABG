<?php
require "model/CadastrarOs.php";
require "model/Cidade.php";

	class crtCadastrarOs {

		public function cadastrarOs()
		{	
			$usuario = new Conn();
				include "view/cadastrar-os.php";

				if(filter_input(INPUT_POST, 'sel-banco') != 'INDEFINIDO' && filter_input(INPUT_POST, 'sel-banco') != '') {
					$usuario = new CadastrarOs();
					$usuario->cadOs();

				} else {
					echo "NENHUM DADO ENVIADO.";
				}
		}

	}
?>