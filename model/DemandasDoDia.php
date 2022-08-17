<?php
require_once "Conn.php";

$conn = new Conn();

class DemandasDoDia {

	function dadosDoDia()
	{
		
		$querySelect = "SELECT cod_os, tipo, banco, empresa, proponente, cidade, observacoes, condominio, bairro, uf, data_receb, data_entrega, status, notas_importantes, ficha_pesquisa  FROM controle_demandas WHERE DATE(data_entrega) = CURDATE()";

		//$querySelect = "SELECT cod_os, tipo, banco, empresa, proponente, cidade, bairro, uf, data_receb, data_entrega, status, notas_importantes  FROM controle_demandas LIMIT 50";

		$conn = new Conn();
		$dadosSelect = $conn->getConn()->query($querySelect);
		$resultados = $dadosSelect->fetchAll(PDO::FETCH_ASSOC);

		return $resultados;

	}

	function dadosCot()
	{
		$querySelect = "SELECT id, versao, item, titulo, descricao, observacoes, data_cadastro, usuario  FROM tbl_cot";

		$conn = new Conn();
		$dadosSelect = $conn->getConn()->query($querySelect);
		$resultados = $dadosSelect->fetchAll(PDO::FETCH_ASSOC);

		return $resultados;
	}

	function dadosCoc()
	{
		$querySelect = "SELECT id, versao, item, titulo, descricao, observacoes, data_cadastro, usuario  FROM tbl_coc";

		$conn = new Conn();
		$dadosSelect = $conn->getConn()->query($querySelect);
		$resultados = $dadosSelect->fetchAll(PDO::FETCH_ASSOC);

		return $resultados;
	}
}


?>