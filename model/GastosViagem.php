<?php
require_once "Conn.php";

class GastosViagem {

	public function cadGasto()
	{
			$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

			if (!empty($dados['btnCadastrar'])) {
				unset($dados['btnCadastrar']);
			}

			$descricao = mb_strtoupper(strtoupper($dados['ipt-descricao']));
            $valor = $dados['ipt-valor'];
			$valor = str_replace("," , "." , $valor);
            $estabelecimento = mb_strtoupper(strtoupper($dados['ipt-estabelecimento']));
            $cidadeUf = mb_strtoupper(strtoupper($dados['ipt-cidadeUf']));
            $observacoes = mb_strtoupper(strtoupper($dados['ta-observacoes']));
		
			try {

			$conn = new Conn();

			$statement = "INSERT INTO tbl_gastos_viagem (descricao, valor, forma_pagamento, pagador, estabelecimento,
            cidade_uf, data_despesa, data_cadastro, observacoes, usuario) VALUES (:descricao, :valor, :forma_pagamento, 
            :pagador, :estabelecimento, :cidade_uf, :data_despesa, CURRENT_TIMESTAMP(), :observacoes, :usuario)";

			$dados_cadastrar = $conn->getConn()->prepare($statement);

			$dados_cadastrar->bindParam(':descricao', $descricao );
			$dados_cadastrar->bindParam(':valor', $valor);
            $dados_cadastrar->bindParam(':forma_pagamento', $dados['sel-forma-pagamento']);
            $dados_cadastrar->bindParam(':pagador', $dados['radio-btn-pagador']);
            $dados_cadastrar->bindParam(':estabelecimento', $estabelecimento);
            $dados_cadastrar->bindParam(':cidade_uf', $cidadeUf);
            $dados_cadastrar->bindParam(':data_despesa', $dados['ipt-dataDespesa']);
            $dados_cadastrar->bindParam(':observacoes', $observacoes);
            $dados_cadastrar->bindParam(':usuario', $_SESSION['user']);
			
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

        public function carregarRegistroEdicao($id)
        {
            $conn = new Conn();
            $query = "SELECT * from tbl_gastos_viagem WHERE id = '$id'";
            $registro = $conn->getConn()->query( $query);
            $resultado = $registro->fetch(PDO::FETCH_OBJ);
            return $resultado;
        }

        public function edGasto()
	    {
			$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

			if (!empty($dados['btnCadastrar'])) {
				unset($dados['btnCadastrar']);
			}

			$descricao = mb_strtoupper(strtoupper($dados['ipt-descricao']));
            $valor = $dados['ipt-valor'];
			$valor = str_replace("," , "." , $valor);
            $estabelecimento = mb_strtoupper(strtoupper($dados['ipt-estabelecimento']));
            $cidadeUf = mb_strtoupper(strtoupper($dados['ipt-cidadeUf']));
            $observacoes = mb_strtoupper(strtoupper($dados['ta-observacoes']));
		
			try {

			$conn = new Conn();

			$statement = "UPDATE tbl_gastos_viagem SET descricao = :descricao, valor = :valor, forma_pagamento = :forma_pagamento,
            pagador = :pagador, estabelecimento = :estabelecimento, cidade_uf = :cidade_uf, data_despesa = :data_despesa, 
            observacoes = :observacoes, usuario = :usuario WHERE id = :id";

			$dados_editar = $conn->getConn()->prepare($statement);

			$dados_editar->bindParam(':descricao', $descricao );
			$dados_editar->bindParam(':valor', $valor);
            $dados_editar->bindParam(':forma_pagamento', $dados['sel-forma-pagamento']);
            $dados_editar->bindParam(':pagador', $dados['radio-btn-pagador']);
            $dados_editar->bindParam(':estabelecimento', $estabelecimento);
            $dados_editar->bindParam(':cidade_uf', $cidadeUf);
            $dados_editar->bindParam(':data_despesa', $dados['ipt-dataDespesa']);
            $dados_editar->bindParam(':observacoes', $observacoes);
            $dados_editar->bindParam(':usuario', $_SESSION['user']);
            $dados_editar->bindParam(':id', $dados['ipt-id']);
			
			$dados_editar->execute();

			} catch (PDOException $erro) {
				echo "ERRO: ".$erro->getMessage();
			}

			if($dados_editar->rowCount()) {
				//echo "<script>alert('Registro Incluído com Sucesso!!!')</script>";
				return true;
			} else {
				//echo "<script>alert('Erro ao Incluir Registro!!!')</script>";
				print_r($dados_editar->errorInfo());
				return false;
			}
		}

        function buscarGastos()
	    {
		
		    $querySelect = "SELECT * FROM tbl_gastos_viagem";
    
		    $conn = new Conn();
		    $dados = $conn->getConn()->query($querySelect);

		    $resultados = $dados->fetchAll(PDO::FETCH_ASSOC);

		    return $resultados;

	    }
	}

?>