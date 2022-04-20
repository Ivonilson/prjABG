<?php
//session_start();
require_once "Conn.php";

class Modelo {

	public function incluirMod()
	{
			$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

			if (!empty($dados['btnIncluirModelo'])) {
				unset($dados['btnIncluirModelo']);
			}

			try {

			$conn = new Conn();

			$statement = "INSERT INTO tbl_modelo (cod_os, banco, empresa, tipologia, cidade, uf, complemento, observacoes, data_criacao, data_atualizacao, usuario, modelo_inferencial, alteracoes) VALUES (:cod_os, :banco, :empresa, :tipologia, :cidade, :uf, :complemento, :observacoes, CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP(), :usuario, :modelo_inferencial, :alteracoes)";

			$dados_cadastrar = $conn->getConn()->prepare($statement);

			$modelo = $_FILES['ipt-up-modelo']['tmp_name'];
			$tamanho = $_FILES['ipt-up-modelo']['size'];
			$nome = $_FILES['ipt-up-modelo']['name'];
			$extensao = pathinfo($nome, PATHINFO_EXTENSION);
			//$diretorio = 'upload/modelos/'.$nome;
			$diretorio = 'https://abgsolucoes.tec.br/upload/modelos/';

			if($extensao != 'sda' && $extensao != 'srn'){
				echo "<script>alert('TIPO DE ARQUIVO NÃO SUPORTADO!!!')</script>";
				echo "<script>alert('AÇÃO CANCELADA!!!')</script>";
				exit;
			} else {
				move_uploaded_file($modelo, $diretorio);
			}

			$dados_alteracoes = "
			
			Alterado por: "."<mark>".$_SESSION['user']."</mark>".'<br>'
			.'Data e Horário: <mark>'.date('d/m/Y H:i:s').'</mark><br>'
			.'Última O.S: '.$dados['ipt-os'].'<br>'
			.'Banco: '.$dados['sel-banco'].'<br>'
			.'Empresa: '.$dados['sel-empresa'].'<br>'
			.'Tipologia: '.$dados['sel-tipologia'].'<br>'
			.'Cidade/UF: '.$dados['sel-cidade'].'/'.$dados['sel-uf'].'<br>'
			.'Complemento: '.$dados['ipt-complemento'].'<br>'
			.'Nome do Modelo: '.$nome.'<br>'
			.'Usuário: '.$_SESSION['user'].'<br>'
			.'Observações: '."<mark>".$dados['ta-observacoes']."</mark>".'<br>'
			.'<hr>';

			$dados_cadastrar->bindParam(':cod_os', $dados['ipt-os']);
			$dados_cadastrar->bindParam(':banco', $dados['sel-banco']);
			$dados_cadastrar->bindParam(':empresa', $dados['sel-empresa']);
			$dados_cadastrar->bindParam(':tipologia', $dados['sel-tipologia']);
			$dados_cadastrar->bindParam(':cidade', $dados['sel-cidade']);
			$dados_cadastrar->bindParam(':uf', $dados['sel-uf']);
			$dados_cadastrar->bindParam(':complemento', $dados['ipt-complemento']);
			$dados_cadastrar->bindParam(':observacoes', $dados['ta-observacoes']); 
			$dados_cadastrar->bindParam(':usuario', $_SESSION['user']);
			$dados_cadastrar->bindParam(':modelo_inferencial', $nome);
			$dados_cadastrar->bindParam(':alteracoes', $dados_alteracoes);
			
			$dados_cadastrar->execute();

			} catch (PDOException $erro) {
				echo "ERRO: ".$erro->getMessage();
			}

			if($dados_cadastrar->rowCount()) {
				echo "<script>alert('Registro Incluído com Sucesso!!!')</script>";
				$conn = null;
			} else {
				echo "<script>alert('Erro ao Incluir Registro!!!')</script>";
				print_r($dados_cadastrar->errorInfo());
				$conn = null;
			}

		}


		function buscarModelos($cidade)
		{
			if($cidade == 'TODAS'){
				$querySelect = "SELECT id, cod_os, banco, empresa, tipologia, cidade, uf, complemento, observacoes, usuario, data_atualizacao, modelo_inferencial FROM tbl_modelo";
			} else {
				$querySelect = "SELECT id, cod_os, banco, empresa, tipologia, cidade, uf, complemento, observacoes, usuario, data_atualizacao, modelo_inferencial FROM tbl_modelo WHERE cidade = '$cidade'";
			}

			$conn = new Conn();
			$dadosSelect = $conn->getConn()->query($querySelect);
			$resultados = $dadosSelect->fetchAll(PDO::FETCH_ASSOC);

			return $resultados;
		}

		function cidadesComModelos(){
			$querySelect = "SELECT DISTINCT cidade FROM tbl_modelo ORDER BY cidade";

			$conn = new Conn();
			$dadosSelect = $conn->getConn()->query($querySelect);
			$cidadesComModelo = $dadosSelect->fetchAll(PDO::FETCH_ASSOC);

			return $cidadesComModelo;
		}
	}

?>