<?php
require_once "Conn.php";

class EditarOs {

	public function registroEdicao($cod_os)
	{
		$queryEdicao = "SELECT cod_os, tipo, banco, empresa, proponente, CONTATO, cidade, uf, tipologia, observacoes, condominio, bairro, data_receb, data_entrega, valor_servico, valor_deslocamento, valor_avaliacao, area_construida, area_terreno, padrao_acabamento, novo, LAJE, situacao, status, obs3, obs2, notas_importantes, ficha_pesquisa, numero_op_inter, alteracoes FROM controle_demandas WHERE cod_os = '$cod_os'";

		$conn = new Conn();

		$dadoEdicao = $conn->getConn()->query($queryEdicao);

		$resultado = $dadoEdicao->fetch(PDO::FETCH_OBJ);

		return $resultado;
	}

	public function edOs()
	{
			$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
			$form = filter_input(INPUT_GET, 'form');

			if (!empty($dados['btnCadastrar'])) {
				unset($dados['btnCadastrar']);
			}

			$ficha_pesquisa = isset($dados['sel-ficha-pesquisa']) ? $dados['sel-ficha-pesquisa'] : "-";
			$numero_operacao = isset($dados['ipt-numero-op-inter']) ? trim($dados['ipt-numero-op-inter']) : "-";

			$valor_servico = str_replace(".", "", $dados['ipt-valorServ']);
			$valor_servico = str_replace("," , "." , $valor_servico);

			$valor_deslocamento = str_replace(".", "", $dados['ipt-valorDesloc']);
			$valor_deslocamento = str_replace("," , "." , $valor_deslocamento);

			$area_edificada = str_replace("." , "" , $dados['ipt-areaEdif']);
			$area_edificada = str_replace("," , "." , $area_edificada);

			$area_terreno = str_replace("." , "" , $dados['ipt-areaTerreno']);
			$area_terreno = str_replace("," , "." , $area_terreno);


			try {

			$conn = new Conn();

			$statement = "UPDATE controle_demandas SET cod_os = :cod_os, tipo = :tipo, banco = :banco, empresa = :empresa, proponente = :proponente, CONTATO = :CONTATO, cidade = :cidade, uf = :uf, tipologia = :tipologia, observacoes = :observacoes, condominio = :condominio, bairro = :bairro, cep = :cep, data_receb = :data_receb, data_entrega = :data_entrega, valor_servico = :valor_servico, valor_deslocamento = :valor_deslocamento, valor_avaliacao= :valor_avaliacao, area_construida = :area_construida, area_terreno = :area_terreno, padrao_acabamento = :padrao_acabamento, novo = :novo, LAJE = :LAJE, situacao = :situacao, status = :status, obs3 = :obs3, obs2 = :obs2, notas_importantes = :notas_importantes,ficha_pesquisa = :ficha_pesquisa, numero_op_inter = :numero_op_inter,  alteracoes = CONCAT(IFNULL(alteracoes, ''), :alteracoes) WHERE cod_os = :cod_os";

			$dados_editar = $conn->getConn()->prepare($statement);

			$dados_alteracoes = "
			
			Alterado por: "."<mark>".$_SESSION['user']."</mark>".'<br>'
			.'Data e Horário: <mark>'.date('d/m/Y H:i:s').'</mark><br>'
			."Tipo: ".$dados['sel-tipo'].'<br>'
			.'Banco: '.$dados['sel-banco'].'<br>'
			.'Número Operação: '.$numero_operacao.'<br>'
			.'Empresa: '.$dados['sel-empresa'].'<br>'
			.'Proponente: '.$dados['ipt-proponente'].'<br>'
			.'Contato: '.$dados['ipt-contato'].'<br>'
			.'Cidade/UF: '.$dados['sel-cidade'].'/'.$dados['sel-uf'].'<br>'
			.'Tipologia: '.$dados['sel-tipologia'].'<br>'
			.'Endereço: '.$dados['ipt-endereco'].'<br>'
			.'Condomínio: '.$dados['ipt-condominio'].'<br>'
			.'Bairro: '.$dados['ipt-bairro'].'<br>'
			.'Data Recebimento: '.date_format(date_create($dados['ipt-dataReceb']), 'd/m/Y').'<br>'
			.'Data Entrega: '."<mark>".date_format(date_create($dados['ipt-dataEntrega']), 'd/m/Y')."</mark>".'<br>'
			.'Valor Serviço (R$): '.$dados['ipt-valorServ'].'<br>'
			.'Valor Deslocamento (R$): '.$dados['ipt-valorDesloc'].'<br>'
			.'Valor de Avaliação (R$): '."<mark>".$dados['ipt-valorAvaliacao']."</mark>".'<br>'
			.'Área construída (M²): '.$dados['ipt-areaEdif'].'<br>'
			.'Área terreno (M²): '.$dados['ipt-areaTerreno'].'<br>'
			.'Padrão Acabamento: '.$dados['sel-padraoAcab'].'<br>'
			.'Novo: '.$dados['sel-novo'].'<br>'
			.'Laje: '.$dados['sel-laje'].'<br>'
			.'Situação: '.$dados['sel-situacao'].'<br>'
			.'Status: '."<mark>".$dados['sel-status']."</mark>".'<br>'
			.'Status para a Lista: '.$dados['sel-statusLista'].'<br>'
			.'Ficha de Pesquisa: '.$ficha_pesquisa.'<br>'
			.'Observações da Lista: '.$dados['ta-observacoes'].'<br>'
			.'Observações I/G: '."<mark>".$dados['ta-observacoesig']."</mark>".'<br>'
			.'<hr>';


			$dados_editar->bindParam(':cod_os', $dados['ipt-os']);
			$dados_editar->bindParam(':tipo', $dados['sel-tipo']);
			$dados_editar->bindParam(':banco', $dados['sel-banco']);
			$dados_editar->bindParam(':empresa', $dados['sel-empresa']);
			$dados_editar->bindParam(':proponente', $dados['ipt-proponente']);
			$dados_editar->bindParam(':CONTATO', $dados['ipt-contato']);
			$dados_editar->bindParam(':cidade', $dados['sel-cidade']);
			$dados_editar->bindParam(':uf', $dados['sel-uf']);
			$dados_editar->bindParam(':tipologia', $dados['sel-tipologia']);
			$dados_editar->bindParam(':observacoes', $dados['ipt-endereco']); // endereço do imóvel
			$dados_editar->bindParam(':condominio', $dados['ipt-condominio']);
			$dados_editar->bindParam(':bairro', $dados['ipt-bairro']);
			$dados_editar->bindParam(':cep', $dados['ipt-cep']);
			$dados_editar->bindParam(':data_receb', $dados['ipt-dataReceb']);
			$dados_editar->bindParam(':data_entrega', $dados['ipt-dataEntrega']);
			$dados_editar->bindParam(':valor_servico', $valor_servico);
			$dados_editar->bindParam(':valor_deslocamento', $valor_deslocamento);
			$dados_editar->bindParam(':valor_avaliacao', $dados['ipt-valorAvaliacao']);
			$dados_editar->bindParam(':area_construida', $area_edificada);
			$dados_editar->bindParam(':area_terreno', $area_terreno);
			$dados_editar->bindParam(':padrao_acabamento', $dados['sel-padraoAcab']);
			$dados_editar->bindParam(':novo', $dados['sel-novo']);
			$dados_editar->bindParam(':LAJE', $dados['sel-laje']);
			$dados_editar->bindParam(':situacao', $dados['sel-situacao']);
			$dados_editar->bindParam(':status', $dados['sel-status']);
			$dados_editar->bindParam(':obs3', $dados['sel-statusLista']); //status para a lista (frase para iniciar observações)
			$dados_editar->bindParam(':obs2', $dados['ta-observacoes']); //observações complementares
			$dados_editar->bindParam(':notas_importantes', $dados['ta-observacoesig']);
			$dados_editar->bindParam(':ficha_pesquisa', $ficha_pesquisa);
			$dados_editar->bindParam(':numero_op_inter', $numero_operacao);
			$dados_editar->bindParam(':alteracoes', $dados_alteracoes);

			$dados_editar->execute();

			} catch (PDOException $erro) {
				//echo "ERRO: ".$erro->getMessage();
			}	

			if($dados_editar->rowCount()) {
				//echo "<script>alert('Registro ATUALIZADO com SUCESSO.')</script>";
					//echo "<script>window.location.href = '/?pagina=".$form."'</script>";
					//echo "<script>window.location.href = '../view/demandas-do-dia.php'</script>";
				return true;
				
			} else {
				//echo "<script>alert('ERRO ao ATUALIZAR Registro.')</script>";
				//print_r($dados_editar->errorInfo());
				return false;
			}

		}


			public function registroAlteracoes($cod_os_alteracao)
			{
				$queryAlteracao = "SELECT cod_os, tipo, banco, empresa, proponente, CONTATO, cidade, uf, tipologia, observacoes, condominio, bairro, data_receb, data_entrega, valor_servico, valor_deslocamento, valor_avaliacao, area_construida, area_terreno, padrao_acabamento, novo, LAJE, situacao, status, obs3, obs2, notas_importantes, resp_cadastro, data_cadastro, ficha_pesquisa, numero_op_inter, alteracoes  FROM controle_demandas WHERE cod_os = '$cod_os_alteracao'";

				$conn = new Conn();

				$dadoAlteracao = $conn->getConn()->query($queryAlteracao);

				$resultadoAlteracao = $dadoAlteracao->fetch(PDO::FETCH_OBJ);

				return $resultadoAlteracao;
			}

	}

?>