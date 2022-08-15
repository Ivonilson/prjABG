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

			public function editarItemCot(){	
				$usuario = new Conn();
				
				if(filter_input(INPUT_POST, 'ipt-item-ed') != '' && filter_input(INPUT_POST, 'ipt-item-ed') != NULL){
						$editar = new Cot();
						
						if($editar->edItemCot()){
							return "Item editado com Sucesso!";
						} else {
							return  "Erro. Contate o Suporte.";
						}
			
					}
				}
		}

	$crtl = new crtCot();
	$mensagem_erro = $crtl->cadastrarItemCot();
	$mensagem_erro = $crtl->editarItemCot();

	if(filter_input(INPUT_GET, 'item') != '' && filter_input(INPUT_GET, 'item') != NULL) {
		$itemEdicao = new Cot();
		$item = $itemEdicao->itemParaEdicao(filter_input(INPUT_GET, 'item'));
	}

	if(filter_input(INPUT_GET,'item-historico') != '' && filter_input(INPUT_GET, 'item-historico') != NULL){
		$itemHistorico = new Cot();
		$historicoItem = $itemHistorico->historicoItem(filter_input(INPUT_GET,'item-historico'));
	}
?>