<?php
    require_once "model/GastosViagem.php";
	class crtCadastrarGastosViagem {

		public function cadastrarGasto(){	
			$usuario = new Conn();
			
			if(filter_input(INPUT_POST, 'ipt-descricao') != '' && filter_input(INPUT_POST, 'ipt-descricao') != ''){
				$usuario = new GastosViagem();
					
				if($usuario->cadGasto()){
					return "Gasto contabilizado com sucesso!";
				} else {
					return  "ERRO. Contate o Suporte.";
				}
		
			}		
		}
	}
    
	$crtl = new crtCadastrarGastosViagem();
	$mensagem = $crtl->cadastrarGasto();
?>