<?php
require "model/DemandasDoDia.php";

class crtDemandasDoDia {

	public function demandasDoDia()
		{
			$dados = new DemandasDoDia();
			$cot = new DemandasDoDia();
			$coc = new DemandasDoDia();
			$quant = 0;
			$quantLaudoPronto = 0;
			$contadorMdCot = 0;

			$resultado = $dados->dadosDoDia();
			$resultadoCot = $cot->dadosCot();
			$resultadoCoc = $coc->dadosCoc();

			include "view/demandas-do-dia.php";
						
		}	
	}

	$crtl = new crtDemandasdoDia();
	$crtl->demandasDoDia();

?>