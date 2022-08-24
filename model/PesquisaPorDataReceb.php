<?php
require_once "Conn.php";


class PesquisaPorDataReceb {

	function pesquisaDataReceb()
	{
		
		$data_inicial = filter_input(INPUT_POST, 'data_inicial');
		$data_final = filter_input(INPUT_POST, 'data_final');

		$querySelect = "SELECT cod_os, tipo, banco, empresa, proponente, CONTATO, cidade, observacoes, condominio, bairro, uf, data_receb, data_entrega, status, notas_importantes, ficha_pesquisa  FROM controle_demandas WHERE data_receb >= '$data_inicial' AND data_receb <= '$data_final'";

		$conn = new Conn();
		$dadosPorDataReceb = $conn->getConn()->query($querySelect);

		/* bindParam não está funcionando, verificar o por que.
		$dadosPorDataRecb->bindParam(':dataInicial', $data_inicial);
		$dadosPorDataReceb->bindParam(':dataFinal', $data_final);
		*/

		$resultadoPorDataReceb = $dadosPorDataReceb->fetchAll(PDO::FETCH_ASSOC);

		return $resultadoPorDataReceb;

	}
}


?>