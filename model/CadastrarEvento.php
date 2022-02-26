<?php
require_once "Conn.php";

/*
SQL DA TABELA tbl_eventos

CREATE TABLE `controle_demandas`.`tbl_eventos` ( `cod_evento` INT(8) NOT NULL PRIMARY KEY AUTO_INCREMENT , `tipo` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, `descricao` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `local` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `cidade` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `uf` CHAR(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `data_cadastro` TIMESTAMP NOT NULL , `data_evento` TIMESTAMP NOT NULL , `status` VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `observacoes` VARCHAR(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `alteracoes` VARCHAR(5000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;

*/

class CadastrarEvento {

	public function cadEvento()
	{
			$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

			if (!empty($dados['btnCadastrar'])) {
				unset($dados['btnCadastrar']);
			}

			try {

			$conn = new Conn();

			$statement = "INSERT INTO tbl_eventos (tipo, descricao, local, cidade, uf, data_cadastro, data_evento, status, observacoes, alteracoes) VALUES (:tipo, :descricao, :local, :cidade, :uf, CURRENT_TIMESTAMP(), :data_evento, 'Pendente', :observacoes, :alteracoes)";

			$dados_cadastrar = $conn->getConn()->prepare($statement);

			$dados_alteracoes = "
			
			Alterado por: "."<mark>".$_SESSION['user']."</mark>".'<br>'
			.'Data e Horário: <mark>'.date('d/m/Y H:i:s').'</mark><br>'
			."Tipo: ".$dados['sel-tipo-evento'].'<br>'
			.'Descricao: '.$dados['ipt-descricao'].'<br>'
			.'Local: '.$dados['ipt-local'].'<br>'
			.'Cidade/UF: '.$dados['sel-cidade'].'/'.$dados['sel-uf'].'<br>'
			.'Data Evento: '."<mark>".date_format(date_create($dados['ipt-data-evento']), 'd/m/Y')."</mark>".'<br>'
			.'Status: Pendente'.'<br>'
			.'Observações: '.$dados['ta-observacoes'].'<br>'
			.'<hr>';

			$dados_cadastrar->bindParam(':tipo', $dados['sel-tipo-evento']);
			$dados_cadastrar->bindParam(':descricao', $dados['ipt-descricao']);
			$dados_cadastrar->bindParam(':local', $dados['ipt-local']);
			$dados_cadastrar->bindParam(':cidade', $dados['sel-cidade']);
			$dados_cadastrar->bindParam(':uf', $dados['sel-uf']);
			$dados_cadastrar->bindParam(':data_evento', $dados['ipt-data-evento']);
			$dados_cadastrar->bindParam(':observacoes', $dados['ta-observacoes']);
			$dados_cadastrar->bindParam(':alteracoes', $dados_alteracoes);
			
			$dados_cadastrar->execute();

			} catch (PDOException $erro) {
				echo "ERRO: ".$erro->getMessage();
			}

			if($dados_cadastrar->rowCount()) {
				echo "<script>alert('Registro Incluído com Sucesso!!!')</script>";
				echo "<script>window.location.href = '/?pagina=cadastrar-evento'</script>";
			} else {
				echo "<script>alert('Erro ao Incluir Registro!!!')</script>";
				print_r($dados_cadastrar->errorInfo());
			}

		}
	}

?>