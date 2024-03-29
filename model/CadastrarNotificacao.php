﻿<?php
require_once "Conn.php";

class CadastrarNotificacao {

	public function cadNotificacao()

	{		
			$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
			$remetente = strtoupper($dados['ipt-remetente']);
			$destinatario = strtoupper($dados['ipt-destinatario']);
			$descricao = strtoupper($dados['ipt-descricao']);

			if (!empty($dados['btnCadastrar'])) {
				unset($dados['btnCadastrar']);
			}

			try {

			$conn = new Conn();

			$statement = "INSERT INTO tbl_notificacoes (remetente, destinatario, descricao, data_emissao, data_limite, data_programada_resolver, prioridade, observacoes, usuario, data_cadastro) VALUES (:remetente, :destinatario, :descricao, CURDATE(), :data_limite, :data_programada_resolver, :prioridade, :observacoes, :usuario, CURRENT_TIMESTAMP())";

			$dados_cadastrar = $conn->getConn()->prepare($statement);
			$usuario = $_SESSION['user'];

			$dados_cadastrar->bindParam(':remetente', $remetente);
			$dados_cadastrar->bindParam(':destinatario', $destinatario);
			$dados_cadastrar->bindParam(':descricao', $descricao);
			$dados_cadastrar->bindParam(':data_limite', $dados['ipt-data-limite']);
			$dados_cadastrar->bindParam(':data_programada_resolver', $dados['ipt-data-programada']);
			$dados_cadastrar->bindParam(':prioridade', $dados['sel-prioridade']);
			$dados_cadastrar->bindParam(':observacoes', $dados['ta-observacoes']);
			$dados_cadastrar->bindParam(':usuario', $usuario);
			
			$dados_cadastrar->execute();

			} catch (PDOException $erro) {
				echo "ERRO: ".$erro->getMessage();
			}

			if($dados_cadastrar->rowCount()) {
				//echo "<script>alert('Registro Incluído com Sucesso!!!')</script>";
				//echo "<script>window.location.href = '/?pagina=cadastrar-notificacao'</script>";
				return true;
			} else {
				//echo "<script>alert('Erro ao Incluir Registro!!!')</script>";
				print_r($dados_cadastrar->errorInfo());
				return false;
			}

		}

		public function carregaNotificacoes(){
			//$usuario = $_SESSION['user'];
			
			$queryNotificacoes = "SELECT id_notificacao, tipo, remetente, destinatario, descricao, data_emissao, data_limite, data_programada_resolver, prioridade, meio_notificacao, observacoes, usuario, data_cadastro FROM tbl_notificacoes WHERE DATE(data_programada_resolver) = CURDATE() AND status != 'RESOLVIDO'"; 

			$conn = new Conn();
			$dadosNotificacoes = $conn->getConn()->query($queryNotificacoes);
			$notificacoes = $dadosNotificacoes->fetchAll(PDO::FETCH_OBJ);

			return $notificacoes;
		}

	}

?>