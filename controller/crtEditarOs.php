<?php
require "model/EditarOs.php";
require "model/Cidade.php";

	class crtEditarOs {

		public function editarOs()
		{	

			if(filter_input(INPUT_POST, 'ipt-os') != 'INDEFINIDO' && filter_input(INPUT_POST, 'ipt-os') != '') {
				
				$usuario = new EditarOs();
				
				if($usuario->edOs()){
					return "Ordem de Serviço atualizada com Sucesso!";
				} else {
					return "ERRO. Verifique as informações e tente novamente ou contate o Suporte.";
				}	
			}
		}
	}

	$crtl = new crtEditarOs();
	$mensagem_erro = $crtl->editarOs();

?>