<?php
require_once "Conn.php";


class PesquisaPorOs {

	function pesqPorOs()
	{
		
		$numero_os = filter_input(INPUT_POST, 'ipt-numeroOs');

		$querySelect = "SELECT cod_os, empresa, banco, tipo, proponente, CONTATO, tipologia, cidade, observacoes, condominio, bairro, uf, data_receb, data_entrega, status, area_construida, area_terreno, padrao_acabamento, LAJE, novo, valor_avaliacao, obs3, notas_importantes, ficha_pesquisa, numero_op_inter  FROM controle_demandas WHERE cod_os = '$numero_os'";

		$conn = new Conn();
		$dadosPorOs = $conn->getConn()->query($querySelect);

		$resultadoPorOs = $dadosPorOs->fetchAll(PDO::FETCH_ASSOC);

		return $resultadoPorOs;

	}
}


?>