<?php
require_once "Conn.php";

class EditarModelo {

	public function edModelo()
		{
			$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
			$form = filter_input(INPUT_GET, 'form');
			
			$nomeFixoModelo = new DadosAuxiliares();
			$nomeFixo = $nomeFixoModelo->nomeFixoModelo($dados['ipt-id']);

			if (!empty($dados['btnEditarModelo'])) {
				unset($dados['btnEditarModelo']);
			}

			try {

			$conn = new Conn();

			$statement = "UPDATE tbl_modelo SET cod_os = :cod_os, banco = :banco, empresa = :empresa, observacoes = :observacoes, data_atualizacao = CURRENT_TIMESTAMP(), usuario = :usuario, modelo_inferencial = :modelo_inferencial,  alteracoes = CONCAT(IFNULL(alteracoes, ''), :alteracoes) WHERE id = :id";

			$dados_editar = $conn->getConn()->prepare($statement);

			$modelo = $_FILES['ipt-up-modelo']['tmp_name'];
			$tamanho = $_FILES['ipt-up-modelo']['size'];
			$nome = $_FILES['ipt-up-modelo']['name'];
			$extensao = pathinfo($nome, PATHINFO_EXTENSION);
			$diretorio = 'upload/modelos/'.$nome;

			//var_dump($extensao);

			if($extensao != 'sda' && $extensao != 'srn'){
				echo "<script>alert('TIPO DE ARQUIVO NÃO SUPORTADO!!!')</script>";
				echo "<script>alert('AÇÃO CANCELADA!!!')</script>";
				exit;
			} 

			if($nome != $nomeFixo->modelo_inferencial){
				echo "<script>alert('O NOME DO ARQUIVO É DIFERENTE DO ANTERIOR!!!')</script>";
				echo "<script>alert('AÇÃO CANCELADA!!!')</script>";
				exit;
			}else {
				if(file_exists($diretorio)){
					unlink($diretorio);
					move_uploaded_file($modelo, $diretorio);
				} else {
					move_uploaded_file($modelo, $diretorio);
				}
			}
			
			$dados_alteracoes = "
			
			Alterado por: "."<mark>".$_SESSION['user']."</mark>".'<br>'
			.'Data e Horário: <mark>'.date('d/m/Y H:i:s').'</mark><br>'
			.'Última O.S: '.$dados['ipt-os'].'<br>'
			.'Banco: '.$dados['sel-banco'].'<br>'
			.'Empresa: '.$dados['sel-empresa'].'<br>'
			.'Nome do Modelo: '.$nome.'<br>'
			.'Usuário: '.$_SESSION['user'].'<br>'
			.'Observações: '."<mark>".$dados['ta-observacoes']."</mark>".'<br>'
			.'<hr>';

			$dados_editar->bindParam(':cod_os', $dados['ipt-os']);
			$dados_editar->bindParam(':banco', $dados['sel-banco']);
			$dados_editar->bindParam(':empresa', $dados['sel-empresa']);
			$dados_editar->bindParam(':observacoes', $dados['ta-observacoes']); 
			$dados_editar->bindParam(':usuario', $_SESSION['user']);
			$dados_editar->bindParam(':modelo_inferencial', $nome);
			$dados_editar->bindParam(':alteracoes', $dados_alteracoes);
			$dados_editar->bindParam(':id', $dados['ipt-id']);
			
			$dados_editar->execute();

			} catch (PDOException $erro) {
				echo "ERRO: ".$erro->getMessage();
			}

			if($dados_editar->rowCount()) {
				echo "<script>alert('Registro Atualizado com Sucesso!!!')</script>";
				$conn = null;
				echo "<script>window.location.href = '/?pagina=".$form."&id=".$dados['ipt-id']."'</script>";
			} else {
				echo "<script>alert('Erro ao Atualizar Registro!!!')</script>";
				print_r($dados_editar->errorInfo());
				$conn = null;
			}

		}

	}

?>