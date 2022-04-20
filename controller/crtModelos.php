<?php
require "model/Modelo.php";

class crtModelos {

	public function Modelos()
		{	
			if(filter_input(INPUT_POST, 'sel-cidade') != '' && filter_input(INPUT_POST, 'sel-cidade') != null){
				$cidade = filter_input(INPUT_POST, 'sel-cidade');
				$dados = new Modelo();
				$resultado = $dados->buscarModelos($cidade);
			}
			
			$cidadesComModelos = new Modelo();
			$cidades = $cidadesComModelos->cidadesComModelos();
			include "view/modelos.php";
		}
	}


?>