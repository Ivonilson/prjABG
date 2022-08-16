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
			."<u>Item</u>: ".$dados['ipt-item'].'<br>'
			."<u>Versão</u>: ".$dados['sel-versao'].'<br>'
			.'<u>Título</u>: '.$dados['ipt-titulo'].'<br>'
			.'<u>Descrição</u>: '.$dados['ta-descricao-cot'].'<br>'
			.'<u>Observações</u>: '.$dados['ta-observacoes-cot'].'<br>'
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

		public function itemParaEdicao($item)
		{
			$querySelect = "SELECT id, item, versao, titulo, descricao, observacoes, usuario  FROM tbl_cot WHERE item  = '$item'";

			$conn = new Conn();
			$dadosSelect = $conn->getConn()->query($querySelect);
			$resultados = $dadosSelect->fetchAll(PDO::FETCH_ASSOC);

			return $resultados;
		}

		public function edItemCot()
		{
			$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

			if (!empty($dados['btnEditarItemCod'])) {
				unset($dados['btnEditarItemCod']);
			}
		

			$titulo = strtoupper($dados['ipt-titulo-ed']);

            $dados_alteracoes = "
			
			Editado por: "."<mark>".$_SESSION['user']."</mark>".'<br>'
			.'<u>Data e Horário</u>: <mark>'.date('d/m/Y H:i:s').'</mark><br>'
			."<u>Item</u>: ".$dados['ipt-item-ed'].'<br>'
			."<u>Versão</u>: ".$dados['sel-versao-ed'].'<br>'
			."<u>Título</u>: ".$titulo.'<br>'
			."<u>Descrição</u>: ".$dados['ta-descricao-cot-ed'].'<br>'
			."<u>Observações</u>: ".$dados['ta-observacoes-cot-ed'].'<br>'
			.'<hr>';

			try {

			$conn = new Conn();

			$statement = "UPDATE tbl_cot set versao = :versao, titulo = :titulo, descricao = :descricao, observacoes = :observacoes, alteracoes = CONCAT(IFNULL(alteracoes, ''), :alteracoes) WHERE item = :item";

			$dados_editar = $conn->getConn()->prepare($statement);

			$dados_editar->bindParam(':versao', $dados['sel-versao-ed']);
			$dados_editar->bindParam(':titulo', $titulo);
			$dados_editar->bindParam(':descricao', $dados['ta-descricao-cot-ed']);
			$dados_editar->bindParam(':observacoes', $dados['ta-observacoes-cot-ed']);
			$dados_editar->bindParam(':alteracoes', $dados_alteracoes);
			$dados_editar->bindParam(':item', $dados['ipt-item-ed']);
			
			$dados_editar->execute();

			} catch (PDOException $erro) {
				echo "ERRO: ".$erro->getMessage();
			}

			if($dados_editar->rowCount()) {
				//echo "<script>alert('Registro Incluído com Sucesso!!!')</script>";
				return true;
			} else {
				//echo "<script>alert('Erro ao Incluir Registro!!!')</script>";
				//print_r($dados_cadastrar->errorInfo());
				return false;
			}

		}

		public function historicoItem($item){

			$querySelect = "SELECT id, item, versao, titulo, descricao, observacoes, data_cadastro, alteracoes, usuario  FROM tbl_cot WHERE item  = '$item'";

			$conn = new Conn();
			$dadosSelect = $conn->getConn()->query($querySelect);
			$resultados = $dadosSelect->fetch(PDO::FETCH_ASSOC);

			return $resultados;

		}
	}

?>