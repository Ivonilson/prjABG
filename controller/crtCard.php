<?php
require_once "model/Card.php";

	class crtCard {

		public function cadastrarItemCard(){	
			$usuario = new Conn();
			
			if(filter_input(INPUT_POST, 'ipt-item') != 'INDEFINIDO' && filter_input(INPUT_POST, 'ipt-item') != ''){
					$cadastrar = new Card();
					
					if($cadastrar->cadItemCard()){
						return "Item cadastrado com Sucesso!";
					} else {
						return  "ERRO. Verifique se o item do CARD que está tentando cadastrar já exista no sistema ou contate o Suporte.";
					}
		
                }
			}

			public function editarItemCard(){	
				$usuario = new Conn();
				
				if(filter_input(INPUT_POST, 'ipt-item-ed') != '' && filter_input(INPUT_POST, 'ipt-item-ed') != NULL){
						$editar = new Card();
						
						if($editar->edItemCard()){
							return "Item editado com Sucesso!";
						} else {
							return  "Erro. Contate o Suporte.";
						}
			
					}
				}
		}

	$crtl = new crtCard();
	$mensagem_erro = $crtl->cadastrarItemCard();
    
	if(filter_input(INPUT_GET, 'item') != '' && filter_input(INPUT_GET, 'item') != NULL) {
		$itemEdicao = new Card();
		$item = $itemEdicao->itemParaEdicao(filter_input(INPUT_GET, 'item'));
		$mensagem_erro = $crtl->editarItemCard();
	}

	if(filter_input(INPUT_GET,'item-historico') != '' && filter_input(INPUT_GET, 'item-historico') != NULL){
		$itemHistorico = new Card();
		$historicoItem = $itemHistorico->historicoItem(filter_input(INPUT_GET,'item-historico'));
	}
?>