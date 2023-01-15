<?php
    require_once "model/GastosViagem.php";
	class crtGastosViagem {

		public function carregarGastos(){	
			$usuario = new GastosViagem();
            return $usuario->buscarGastos();
		}
	}
    
	$crtl = new crtGastosViagem();
	$gastos = $crtl->carregarGastos();

    $valorTotal = 0;
    $total_regina = 0;
    $total_ivonilson = 0;
    $percentualRegina = 0;
    $percentualIvonilson = 0;
    $reembolsoIvonilson = 0;
    $reembolsoRegina = 0;

    foreach($gastos as $valor) {
        $valorTotal += $valor['valor'];

        if($valor['pagador'] == 'REGINA'){
            $total_regina += $valor['valor'];
        }

        if($valor['pagador'] == 'IVONILSON'){
            $total_ivonilson += $valor['valor'];
        }

        $percentualRegina = ($total_regina / $valorTotal) * 100;
        $percentualIvonilson = ($total_ivonilson / $valorTotal) * 100;

        $reembolsoIvonilson = ($valorTotal / 2) - $total_regina;
        $reembolsoIvonilson = $reembolsoIvonilson < 0 ? 0 :  $reembolsoIvonilson;

        $reembolsoRegina = ($valorTotal / 2) - $total_ivonilson;
        $reembolsoRegina = $reembolsoRegina < 0 ? 0 : $reembolsoRegina;
    }
?>