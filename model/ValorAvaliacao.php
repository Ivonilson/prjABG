<?php
require_once "Conn.php";

class ValorAvaliacao {

	function avaliacao()
	{
		try {

			if(filter_input(INPUT_POST, 'sel-cidade') != NULL){

			$cidade = filter_input(INPUT_POST, 'sel-cidade');
			//$uf = utf8_decode(filter_input(INPUT_POST, 'sel-uf'));

			$querySelect = "SELECT cod_os, tipo, banco, empresa, cidade, observacoes, condominio, bairro, uf, valor_avaliacao, tipologia, area_construida, area_terreno, LAJE, novo, data_receb, status, notas_importantes  FROM controle_demandas WHERE cidade ='$cidade'";

			$conn = new Conn();
			$dadosValorAvaliacao = $conn->getConn()->query($querySelect);

			/* bindParam não está funcionando, verificar o por que.
			$dadosPorDataRecb->bindParam(':dataInicial', $data_inicial);
			$dadosPorDataReceb->bindParam(':dataFinal', $data_final);
			*/

			$resultadoValorAvaliacao = $dadosValorAvaliacao->fetchAll(PDO::FETCH_ASSOC);

			return $resultadoValorAvaliacao;

			}

		} catch (PDOException $erro) {
			echo "Erro: ".$erro->getMessage();
		}
	}

	function buscaCidades()
	{
		try {

			$querySelect = "SELECT DISTINCT cidade  FROM controle_demandas ORDER BY cidade";

			$conn = new Conn();
			$dadosCidades = $conn->getConn()->query($querySelect);

			/* bindParam não está funcionando, verificar o por que.
			$dadosPorDataRecb->bindParam(':dataInicial', $data_inicial);
			$dadosPorDataReceb->bindParam(':dataFinal', $data_final);
			*/

			$resultadoCidades = $dadosCidades->fetchAll(PDO::FETCH_ASSOC);

			return $resultadoCidades;

		} catch (PDOException $e){
			echo "Erro: ".$e->getMessage();
		}
		
	}
}

?>