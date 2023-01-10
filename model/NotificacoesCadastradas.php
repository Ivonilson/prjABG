<?php
require_once "Conn.php";


class NotificacoesCadastradas {

	function pesquisarNotificacoes()
	{
		
		/*$data_inicial = filter_input(INPUT_POST, 'data_inicial');
		$data_final = filter_input(INPUT_POST, 'data_final');*/

		$querySelect = "SELECT id_notificacao, tipo, remetente, destinatario, descricao, status, data_emissao, data_limite, data_programada_resolver, prioridade, meio_notificacao, observacoes, usuario  FROM tbl_notificacoes ORDER BY data_limite desc";
        /*$querySelect = "SELECT * FROM tbl_notificacoes;";*/

		$conn = new Conn();
		$dados = $conn->getConn()->query($querySelect);

		$resultados = $dados->fetchAll(PDO::FETCH_ASSOC);

		return $resultados;

	}
}


?>