<?php
    require_once "model/GastosViagem.php";
	class crtEditarGastosViagem {

        public function carregaRegistro(){
            $carregarRegistro = new GastosViagem();
            return $carregarRegistro->carregarRegistroEdicao($_GET['id']);
        }

		public function editarGasto(){	
			$usuario = new Conn();
			
			if(filter_input(INPUT_POST, 'ipt-id') != '' && filter_input(INPUT_POST, 'ipt-id') != ''){
				$usuario = new GastosViagem();
					
				if($usuario->edGasto()){
					return "Gasto atualizado com sucesso!";
				} else {
					return  "ERRO. Contate o Suporte.";
				}
		
			}		
		}
	}
    


	$crtl = new crtEditarGastosViagem();
    $registro = $crtl->carregaRegistro();
	$mensagem = $crtl->editarGasto();
?>