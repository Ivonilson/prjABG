<?php
require_once "model/Coc.php";

	class crtCoc {

		public function cadastrarItemCoc(){	
			$usuario = new Conn();
			
			if(filter_input(INPUT_POST, 'ipt-item') != 'INDEFINIDO' && filter_input(INPUT_POST, 'ipt-item') != ''){
					$cadastrar = new Coc();
					
					if($cadastrar->cadItemCoc()){
						return "Item cadastrado com Sucesso!";
					} else {
						return  "ERRO. Verifique se o item do COC que está tentando cadastrar já exista no sistema ou contate o Suporte.";
					}
		
                }
			}

			public function editarItemCoc(){	
				$usuario = new Conn();
				
				if(filter_input(INPUT_POST, 'ipt-item-ed') != '' && filter_input(INPUT_POST, 'ipt-item-ed') != NULL){
						$editar = new Coc();
						
						if($editar->edItemCoc()){
							return "Item editado com Sucesso!";
						} else {
							return  "Erro. Contate o Suporte.";
						}
			
					}
				}
		}

	$crtl = new crtCoc();
	$mensagem_erro = $crtl->cadastrarItemCoc();
    
	if(filter_input(INPUT_GET, 'item') != '' && filter_input(INPUT_GET, 'item') != NULL) {
		$itemEdicao = new Coc();
		$item = $itemEdicao->itemParaEdicao(filter_input(INPUT_GET, 'item'));
		$mensagem_erro = $crtl->editarItemCoc();
	}

	if(filter_input(INPUT_GET,'item-historico') != '' && filter_input(INPUT_GET, 'item-historico') != NULL){
		$itemHistorico = new Coc();
		$historicoItem = $itemHistorico->historicoItem(filter_input(INPUT_GET,'item-historico'));
	}
?>