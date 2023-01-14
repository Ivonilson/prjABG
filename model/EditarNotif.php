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

	/*public function edNotif()
	{
			$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
			//$form = filter_input(INPUT_GET, 'pagina');

			if (!empty($dados['btnGravar'])) {
				unset($dados['btnGravar']);
			}

			try {

			$conn = new Conn();

			$queryEditarNotificacao = "UPDATE tbl_notificacoes SET status = :status, data_programada_resolver = :data_programada_resolver WHERE id_notificacao = :id_notificacao";

			$dados_editar = $conn->getConn()->prepare($queryEditarNotificacao);

			$dados_editar->bindParam(':id_notificacao', $dados['ipt-id-notificacao']);
			$dados_editar->bindParam(':status', $dados['sel-resolver']);
			$dados_editar->bindParam(':data_programada_resolver', $dados['ipt-data-adiada']);

			$dados_editar->execute();

			} catch (PDOException $erro) {
				echo "ERRO: ".$erro->getMessage();
			}	

			if($dados_editar->rowCount()) {
				echo "<script>alert('Registro ATUALIZADO com SUCESSO.')</script>";
				unset($dados);
				
				echo "<script>window.location.href ='/?pagina=demandas-do-dia'</script>";
					//echo "<script>window.location.href = '../view/demandas-do-dia.php'</script>";
				
			} else {
				echo "<script>alert('ERRO ao ATUALIZAR Registro.')</script>";
				print_r($dados_editar->errorInfo());
			}

			$conn = NULL;

		}*/

	}

?>