<?php
require "model/EditarOs.php";
require "model/Cidade.php";

	class crtEditarOs {

		public function editarOs()
		{	
			include "view/editar-os.php";

			if(filter_input(INPUT_POST, 'ipt-os') != 'INDEFINIDO' && filter_input(INPUT_POST, 'ipt-os') != '') {
				$usuario = new EditarOs();
				$usuario->edOs();

			} else {
				echo "NENHUM DADO ENVIADO.";
			}	
		}
	}


?>