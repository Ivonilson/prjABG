<?php
require_once "Conn.php";

class EditarNotif {

    public function carregarNotifEdicao($cod_notif){
        $conn = new Conn();
        $query = "SELECT * from tbl_notificacoes WHERE id_notificacao = '$cod_notif'";
        $notificacao = $conn->getConn()->query( $query);
        $resultado = $notificacao->fetch(PDO::FETCH_OBJ);
        return $resultado;
    }

	public function edNotif()
	{
			$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
			//$form = filter_input(INPUT_GET, 'pagina');

			if (!empty($dados['btnGravar'])) {
				unset($dados['btnGravar']);
			}

			try {

			$conn = new Conn();

			$queryEditarNotificacao = "UPDATE tbl_notificacoes SET remetente = :remetente, destinatario = :destinatario, descricao = :descricao, 
            status = :status, data_programada_resolver = :data_programada_resolver, data_limite = :data_limite,
            prioridade = :prioridade, observacoes = :observacoes 
            WHERE id_notificacao = :id_notificacao";

			$dados_editar = $conn->getConn()->prepare($queryEditarNotificacao);

			$dados_editar->bindParam(':id_notificacao', $dados['ipt-id-notificacao']);
			$dados_editar->bindParam(':remetente', $dados['ipt-remetente']);
			$dados_editar->bindParam(':destinatario', $dados['ipt-destinatario']);
            $dados_editar->bindParam(':descricao', $dados['ipt-descricao']);
            $dados_editar->bindParam(':status', $dados['sel-status']);
            $dados_editar->bindParam(':data_programada_resolver', $dados['ipt-dataAlerta']);
            $dados_editar->bindParam(':data_limite', $dados['ipt-dataLimite']);
            $dados_editar->bindParam(':prioridade', $dados['sel-prioridade']);
            $dados_editar->bindParam(':observacoes', $dados['ta-observacoes']);

			$dados_editar->execute();

			} catch (PDOException $erro) {
				//echo "ERRO: ".$erro->getMessage();
			}	

			if($dados_editar->rowCount()) {
				//echo "<script>alert('Registro ATUALIZADO com SUCESSO.')</script>";
                return true;
			} else {
				//echo "<script>alert('ERRO ao ATUALIZAR Registro.')</script>";
				print_r($dados_editar->errorInfo());
                return false;
			}

			$conn = NULL;

		}

	}

?>