<?php
require_once "Conn.php";

class ListaMamck {

	function dadosListaMamck()
	{
		
		$querySelect = "SELECT cod_os, banco, empresa, proponente, cidade, bairro, uf, CONTATO, observacoes, condominio, obs2, obs3, data_receb, data_entrega  FROM controle_demandas WHERE empresa = 'MAMCK' AND status = 'AGUARDANDO VISTORIA' ORDER BY cidade ASC";

		//$querySelect = "SELECT cod_os, tipo, banco, empresa, proponente, cidade, bairro, uf, data_receb, data_entrega, status, notas_importantes  FROM controle_demandas LIMIT 50";

		$conn = new Conn();
		$dadosSelect = $conn->getConn()->query($querySelect);
		$resultados = $dadosSelect->fetchAll(PDO::FETCH_ASSOC);

		return $resultados;

	}

	function quantListaMamck()
	{
		
		$querySelect = "SELECT COUNT(cod_os) AS total  FROM controle_demandas WHERE empresa = 'MAMCK' AND status = 'AGUARDANDO VISTORIA' ORDER BY cidade ASC";

		//$querySelect = "SELECT cod_os, tipo, banco, empresa, proponente, cidade, bairro, uf, data_receb, data_entrega, status, notas_importantes  FROM controle_demandas LIMIT 50";

		$conn = new Conn();
		$dadosSelect = $conn->getConn()->query($querySelect);
		$quantidade = $dadosSelect->fetchAll(PDO::FETCH_ASSOC);

		return $quantidade;

	}
}


?>