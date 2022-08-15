<?php
require_once "Conn.php";

class Cot {

	public function cadItemCot()
	{
			$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

			if (!empty($dados['btnCadastrar'])) {
				unset($dados['btnCadastrar']);
			}
		

			$titulo = strtoupper($dados['ipt-titulo']);

            $dados_alteracoes = "
			
			Cadastrado por: "."<mark>".$_SESSION['user']."</mark>".'<br>'
			.'Data e Horário: <mark>'.date('d/m/Y H:i:s').'</mark><br>'
			."Item: ".$dados['ipt-item'].'<br>'
			.'Título: '.$dados['ipt-titulo'].'<br>'
			.'Descricação: '.$dados['ta-descricao-cot'].'<br>'
			.'Observações: '.$dados['ta-observacoes-cot'].'<br>'
			.'Data Cadastro: '.date('d/m/Y H:i:s').'<br>'
			.'<hr>';

			try {

			$conn = new Conn();

			$statement = "INSERT INTO tbl_cot (versao, item, titulo, descricao, observacoes, data_cadastro, alteracoes, usuario) VALUES (:versao, :item, :titulo, :descricao, :observacoes, CURRENT_TIMESTAMP(), :alteracoes, :usuario)";

			$dados_cadastrar = $conn->getConn()->prepare($statement);

			$dados_cadastrar->bindParam(':versao', $dados['sel-versao']);
			$dados_cadastrar->bindParam(':item', $dados['ipt-item']);
			$dados_cadastrar->bindParam(':titulo', $titulo);
			$dados_cadastrar->bindParam(':descricao', $dados['ta-descricao-cot']);
			$dados_cadastrar->bindParam(':observacoes', $dados['ta-observacoes-cot']);
			$dados_cadastrar->bindParam(':usuario', $_SESSION['user']);
			$dados_cadastrar->bindParam(':alteracoes', $dados_alteracoes);
			
			$dados_cadastrar->execute();

			} catch (PDOException $erro) {
				//echo "ERRO: ".$erro->getMessage();
			}

			if($dados_cadastrar->rowCount()) {
				//echo "<script>alert('Registro Incluído com Sucesso!!!')</script>";
				return true;
			} else {
				//echo "<script>alert('Erro ao Incluir Registro!!!')</script>";
				//print_r($dados_cadastrar->errorInfo());
				return false;
			}

		}
	}

?>