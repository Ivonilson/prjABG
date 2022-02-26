<?php
require_once "Conn.php";

class Cidade {

	function carregaCidades()
	{
		$conn = new Conn();
		$queryCidades = "SELECT nome_cidade FROM tb_cidades GROUP BY nome_cidade";
		$dadosCidades = $conn->getConn()->query($queryCidades);
		$cidades = $dadosCidades->fetchAll(PDO::FETCH_ASSOC);
		return $cidades;
	}

	function carregaUfs()
	{
		$conn = new Conn();
		$queryUfs = "SELECT uf FROM tb_cidades GROUP BY uf";
		$dadosUfs = $conn->getConn()->query($queryUfs);
		$ufs = $dadosUfs->fetchAll(PDO::FETCH_ASSOC);
		return $ufs;
	}
	
}

?>