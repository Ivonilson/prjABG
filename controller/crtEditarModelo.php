<?php
require "model/EditarModelo.php";
require "model/Cidade.php";
require "model/DadosAuxiliares.php";

	class crtEditarModelo {
		
		public function editarModelo()
		{	
			$carregaModelo = new DadosAuxiliares();
			$modelo = $carregaModelo->modeloEmEdicao();
			
			include "view/editar-modelo.php";

			if(filter_input(INPUT_POST, 'ipt-os') != 'INDEFINIDO' && filter_input(INPUT_POST, 'ipt-os') != '') {
				$usuario = new EditarModelo();
				$usuario->edModelo();

			} else {
				echo "NENHUM DADO ENVIADO.";
			}	
		}

	}

?>