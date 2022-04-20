<?php
require_once "Conn.php";

class HistoricoModelo {


	public function registroAlteracoes()
	{

		$cod_os = filter_input(INPUT_GET, 'cod_os');

		$queryAlteracao = "SELECT cod_os, banco, empresa, cidade, uf, tipologia, observacoes, data_criacao, usuario, modelo_inferencial, alteracoes FROM tbl_modelo WHERE cod_os = '$cod_os'";

		$conn = new Conn();

		$dadoAlteracao = $conn->getConn()->query($queryAlteracao);

		$resultadoAlteracao = $dadoAlteracao->fetch(PDO::FETCH_ASSOC);

			return $resultadoAlteracao;
		}

	}

?>