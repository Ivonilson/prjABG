<?php
require_once "Conn.php";


class DadosAuxiliares {

	function pesqCodigoEvento()
	{

		$querySelect = "SELECT cod_evento FROM tbl_eventos ORDER BY cod_evento DESC";

		$conn = new Conn();
		$codigoEvento = $conn->getConn()->query($querySelect);

		$resultado = $codigoEvento->fetch(PDO::FETCH_OBJ);
		return $resultado;
	}


	function modeloEmEdicao(){
		$id = $_GET['id'];

		$querySelect = "SELECT id, cod_os, banco, empresa, tipologia, cidade, uf, complemento, tipologia, observacoes, modelo_inferencial  FROM tbl_modelo WHERE id = $id";

		$conn = new Conn();
		$modelo = $conn->getConn()->query($querySelect);

		$resultado = $modelo->fetch(PDO::FETCH_OBJ);
		return $resultado;

	}

	function nomeFixoModelo ($id){
		$querySelect = "SELECT modelo_inferencial FROM tbl_modelo WHERE id = $id";
		$conn = new Conn();
		$modelo = $conn->getConn()->query($querySelect);

		$nomeModelo = $modelo->fetch(PDO::FETCH_OBJ);
		return $nomeModelo;
	}

}


?>