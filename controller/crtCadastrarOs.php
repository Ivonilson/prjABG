<?php
require_once "model/CadastrarOs.php";
require_once "model/Cidade.php";

	class crtCadastrarOs {

		public function cadastrarOs(){	
			$usuario = new Conn();
			
			if(filter_input(INPUT_POST, 'sel-banco') != 'INDEFINIDO' && filter_input(INPUT_POST, 'sel-banco') != ''){
					$usuario = new CadastrarOs();
					
					if($usuario->cadOs()){
						return "Ordem de Serviço cadastrada com Sucesso!";
					} else {
						return  "ERRO. Verifique se a Ordem de Serviço que está tentando cadastrar já exista no sistema ou contate o Suporte.";
					}
		
				}		
			}
		}

	$crtl = new crtCadastrarOs();
	$mensagem_erro = $crtl->cadastrarOs();
?>