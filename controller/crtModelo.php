<?php
require "model/Modelo.php";
require "model/Cidade.php";

class crtModelo {

	public function incluirModelo()
		{
			include "view/incluir-modelo.php";
		
			if(filter_input(INPUT_POST, 'sel-tipologia') != 'INDEFINIDO' && filter_input(INPUT_POST, 'sel-tipologia') != '') {
					$usuario = new Modelo();
					$usuario->incluirMod();

				} else {
					echo "NENHUM DADO ENVIADO.";
				}
		}
	}

?>