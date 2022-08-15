<?php
require_once "model/Cot.php";

	class crtCot {

		public function cadastrarItemCot(){	
			$usuario = new Conn();
			
			if(filter_input(INPUT_POST, 'ipt-item') != 'INDEFINIDO' && filter_input(INPUT_POST, 'ipt-item') != ''){
					$cadastrar = new Cot();
					
					if($cadastrar->cadItemCot()){
						return "Item cadastrado com Sucesso!";
					} else {
						return  "ERRO. Verifique se o item do COT que está tentando cadastrar já exista no sistema ou contate o Suporte.";
					}
		
                }
			}
		}

	$crtl = new crtCot();
	$mensagem_erro = $crtl->cadastrarItemCot();
?>