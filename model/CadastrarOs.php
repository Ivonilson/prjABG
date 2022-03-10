<?php
require_once "Conn.php";

class CadastrarOS {

	public function cadOs()
	{
			$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

			if (!empty($dados['btnCadastrar'])) {
				unset($dados['btnCadastrar']);
			}

			try {

			$conn = new Conn();

			$statement = "INSERT INTO controle_demandas (cod_os, tipo, banco, empresa, proponente, CONTATO, cidade, uf, tipologia, observacoes, condominio, bairro, cep, data_receb, data_entrega, valor_servico, valor_deslocamento, area_construida, area_terreno, padrao_acabamento, novo, LAJE, situacao, status, obs3, obs2, notas_importantes, resp_cadastro, data_cadastro, alteracoes) VALUES (:cod_os, :tipo, :banco, :empresa, :proponente, :CONTATO, :cidade, :uf, :tipologia, :observacoes, :condominio, :bairro, :cep, :data_receb, :data_entrega, :valor_servico, :valor_deslocamento, :area_construida, :area_terreno, :padrao_acabamento, :novo, :LAJE, :situacao, :status, :obs3, :obs2, :notas_importantes, :resp_cadastro, CURRENT_TIMESTAMP(), :alteracoes)";

			$dados_cadastrar = $conn->getConn()->prepare($statement);

			$dados_alteracoes = "
			
			Alterado por: "."<mark>".$_SESSION['user']."</mark>".'<br>'
			.'Data e Horário: <mark>'.date('d/m/Y H:i:s').'</mark><br>'
			."Tipo: ".$dados['sel-tipo'].'<br>'
			.'Banco: '.$dados['sel-banco'].'<br>'
			.'Empresa: '.$dados['sel-empresa'].'<br>'
			.'Proponente: '.$dados['ipt-proponente'].'<br>'
			.'Contato: '.$dados['ipt-contato'].'<br>'
			.'Cidade/UF: '.$dados['sel-cidade'].'/'.$dados['sel-uf'].'<br>'
			.'Tipologia: '.$dados['sel-tipologia'].'<br>'
			.'Endereço: '.$dados['ipt-endereco'].'<br>'
			.'Condominio: '.$dados['ipt-condominio'].'<br>'
			.'Bairro: '.$dados['ipt-bairro'].'<br>'
			.'Data Recebimento: '.date_format(date_create($dados['ipt-dataReceb']), 'd/m/Y').'<br>'
			.'Data Entrega: '."<mark>".date_format(date_create($dados['ipt-dataEntrega']), 'd/m/Y')."</mark>".'<br>'
			.'Valor Serviço (R$): '.$dados['ipt-valorServ'].'<br>'
			.'Valor Deslocamento (R$): '.$dados['ipt-valorDesloc'].'<br>'
			.'Área construída (M²): '.$dados['ipt-areaEdif'].'<br>'
			.'Área terreno (M²): '.$dados['ipt-areaTerreno'].'<br>'
			.'Padrão Acabamento: '.$dados['sel-padraoAcab'].'<br>'
			.'Novo: '.$dados['sel-novo'].'<br>'
			.'Laje: '.$dados['sel-laje'].'<br>'
			.'Situação: '.$dados['sel-situacao'].'<br>'
			.'Status: '."<mark>".$dados['sel-status']."</mark>".'<br>'
			.'Status para a Lista: '.$dados['sel-statusLista'].'<br>'
			.'Observações da Lista: '.$dados['ta-observacoes'].'<br>'
			.'Observações I/G: '."<mark>".$dados['ta-observacoesig']."</mark>".'<br>'
			.'<hr>';

			$dados_cadastrar->bindParam(':cod_os', $dados['ipt-os']);
			$dados_cadastrar->bindParam(':tipo', $dados['sel-tipo']);
			$dados_cadastrar->bindParam(':banco', $dados['sel-banco']);
			$dados_cadastrar->bindParam(':empresa', $dados['sel-empresa']);
			$dados_cadastrar->bindParam(':proponente', $dados['ipt-proponente']);
			$dados_cadastrar->bindParam(':CONTATO', $dados['ipt-contato']);
			$dados_cadastrar->bindParam(':cidade', $dados['sel-cidade']);
			$dados_cadastrar->bindParam(':uf', $dados['sel-uf']);
			$dados_cadastrar->bindParam(':tipologia', $dados['sel-tipologia']);
			$dados_cadastrar->bindParam(':observacoes', $dados['ipt-endereco']); // endereço do imóvel
			$dados_cadastrar->bindParam(':condominio', $dados['ipt-condominio']);
			$dados_cadastrar->bindParam(':bairro', $dados['ipt-bairro']);
			$dados_cadastrar->bindParam(':cep', $dados['ipt-cep']);
			$dados_cadastrar->bindParam(':data_receb', $dados['ipt-dataReceb']);
			$dados_cadastrar->bindParam(':data_entrega', $dados['ipt-dataEntrega']);
			$dados_cadastrar->bindParam(':valor_servico', $dados['ipt-valorServ']);
			$dados_cadastrar->bindParam(':valor_deslocamento', $dados['ipt-valorDesloc']);
			$dados_cadastrar->bindParam(':area_construida', $dados['ipt-areaEdif']);
			$dados_cadastrar->bindParam(':area_terreno', $dados['ipt-areaTerreno']);
			$dados_cadastrar->bindParam(':padrao_acabamento', $dados['sel-padraoAcab']);
			$dados_cadastrar->bindParam(':novo', $dados['sel-novo']);
			$dados_cadastrar->bindParam(':LAJE', $dados['sel-laje']);
			$dados_cadastrar->bindParam(':situacao', $dados['sel-situacao']);
			$dados_cadastrar->bindParam(':status', $dados['sel-status']);
			$dados_cadastrar->bindParam(':obs3', $dados['sel-statusLista']); //status para a lista (frase para iniciar observações)
			$dados_cadastrar->bindParam(':obs2', $dados['ta-observacoes']); //observações complementares
			$dados_cadastrar->bindParam(':notas_importantes', $dados['ta-observacoesig']);
			$dados_cadastrar->bindParam(':resp_cadastro', $_SESSION['user']);
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