<?php

	class Nfe {


		public function calculaImpostos()
			{
				@$tomador = $_POST['Selecao'];
				@$empresa = $_POST['Empresa'];	
				@$valorNota = str_replace(',' , '.', $_POST['valorNota']);
				$aliquotaIss = 0.05;
				$aliquotaIssDif = 0.0217;
				$aliquotaPis = 0.0065;
				$aliquotaCofins = 0.03;
				$aliquotaIrNormal = 0.048;
				$aliquotaIrDif = 0.015;
				$aliquotaCsll = 0.01;
				
			if ($tomador == "1" && $empresa == "Havalia") {
				$valorIss = number_format($valorNota * $aliquotaIss,2,',','.');
				$valorPis = number_format($valorNota * $aliquotaPis,2,',','.');
				$valorCofins = number_format($valorNota * $aliquotaCofins,2,',','.');
				$valorCsll = number_format($valorNota * $aliquotaCsll,2,',','.');
				$valorIr = number_format($valorNota * $aliquotaIrNormal,2,',','.');
				return $conteudo1 = "Retenções: ISS(5%)=R$$valorIss; PIS/PASEP(0,65%)=R$$valorPis; COFINS(3%)=R$$valorCofins; CSLL(1%)=R$$valorCsll e IR(4,8%)=R$$valorIr. - Dados para crédito: Ag. 3396-0, Conta 32.440-X, Banco do Brasil S.A.";
				//$conteudo2 = "";

			} else if ($tomador == "2" && $empresa == "Havalia") {
				$valorIss = number_format($valorNota * $aliquotaIss,2,',','.');
				$valorPis = number_format($valorNota * $aliquotaPis,2,',','.');
				$valorCofins = number_format($valorNota * $aliquotaCofins,2,',','.');
				$valorCsll = number_format($valorNota * $aliquotaCsll,2,',','.');
				$valorIr = number_format($valorNota * $aliquotaIrNormal,2,',','.');
				return  $conteudo1 = "Retenções: ISS(5%)=R$$valorIss; PIS/PASEP(0,65%)=R$$valorPis; COFINS(3%)=R$$valorCofins; CSLL(1%)=R$$valorCsll e IR(4,8%)=R$$valorIr. - Dados para crédito: Ag. 3396-0, Conta 32.440-X, Banco do Brasil S.A.";
				//$conteudo2 = "";


			} else if ($tomador == "4" && $empresa == "Havalia") {
				$valorIss = number_format($valorNota * $aliquotaIss,2,',','.');
				$valorPis = number_format($valorNota * $aliquotaPis,2,',','.');
				$valorCofins = number_format($valorNota * $aliquotaCofins,2,',','.');
				$valorCsll = number_format($valorNota * $aliquotaCsll,2,',','.');
				$valorIr = number_format($valorNota * $aliquotaIrNormal,2,',','.');
				return  $conteudo1 = "Ref.: Prestacao de servicos tecnicos de Engenharia, Arquitetura e Agronomia relativos ao Edital 3142/2014. Processo n 7066.01.3142.42/2014,
			Contrato n 0746/2015; Serviços prestados em xx de xxxx. Valor dos Serviços: xxxx, Valor do Deslocamento: xxxxx - Dados para crédito:
			AG.0002, Conta: 301-3, OP. 003 - CEF - Retenções: ISS(5%)=R$$valorIss; PIS/PASEP(0,65%)=R$$valorPis; COFINS(3%)=R$$valorCofins; CSLL(1%)=R$$valorCsll e IR(4,8%)=R$$valorIr.";
				//$conteudo2 = "";

			} else if ($tomador == "3" && $empresa == "Havalia") {
				$valorIss = number_format($valorNota * $aliquotaIss,2,',','.');
				$valorPis = number_format($valorNota * $aliquotaPis,2,',','.');
				$valorCofins = number_format($valorNota * $aliquotaCofins,2,',','.');
				$valorCsll = number_format($valorNota * $aliquotaCsll,2,',','.');
				$valorIr = number_format($valorNota * $aliquotaIrNormal,2,',','.');
				return  $conteudo1 = "Retenções: ISS(5%)=R$$valorIss; PIS/PASEP(0,65%)=R$$valorPis; COFINS(3%)=R$$valorCofins; CSLL(1%)=R$$valorCsll e IR(4,8%)=R$$valorIr.";
				//$conteudo2 = "";

			} else if ($tomador == "5" && $empresa == "Havalia") {
				$valorIssDif = number_format($valorNota * $aliquotaIssDif,2,',','.');
				$valorPis = number_format($valorNota * $aliquotaPis,2,',','.');
				$valorCofins = number_format($valorNota * $aliquotaCofins,2,',','.');
				$valorCsll = number_format($valorNota * $aliquotaCsll,2,',','.');
				$valorIr = number_format($valorNota * $aliquotaIrDif,2,',','.');
				return $conteudo1 = "Retenções: ISS(2,17%)=R$$valorIssDif; PIS/PASEP(0,65%)=R$$valorPis; COFINS(3%)=R$$valorCofins; CSLL(1%)=R$$valorCsll e IR(1,5%)=R$$valorIr. - Dados p/ crédito: Ag. 0002, Conta 301-3, Caixa Econômica Federal.";
				//$conteudo2 = "";

			} else if ($tomador == "6" && $empresa == "Havalia") {
				$valorIss = number_format($valorNota * $aliquotaIss,2,',','.');
				$valorPis = number_format($valorNota * $aliquotaPis,2,',','.');
				$valorCofins = number_format($valorNota * $aliquotaCofins,2,',','.');
				$valorCsll = number_format($valorNota * $aliquotaCsll,2,',','.');
				$valorIr = number_format($valorNota * $aliquotaIrNormal,2,',','.');
				return $conteudo1 = "Retenções: ISS(5%)=R$$valorIss; PIS/PASEP(0,65%)=R$$valorPis; COFINS(3%)=R$$valorCofins; CSLL(1%)=R$$valorCsll e IR(4,8%)=R$$valorIr. - Dados p/ crédito: Ag. 0002, Conta 301-3, Caixa Econômica Federal.";
				//$conteudo2 = "";

			} else if ($tomador == "1" && $empresa == "Mamck") {
				$valorIss = number_format($valorNota * $aliquotaIss,2,',','.');
				$valorPis = number_format($valorNota * $aliquotaPis,2,',','.');
				$valorCofins = number_format($valorNota * $aliquotaCofins,2,',','.');
				$valorCsll = number_format($valorNota * $aliquotaCsll,2,',','.');
				$valorIr = number_format($valorNota * $aliquotaIrNormal,2,',','.');
				return $conteudo1 = "Retenções: ISS(5%)=R$$valorIss; PIS/PASEP(0,65%)=R$$valorPis; COFINS(3%)=R$$valorCofins; CSLL(1%)=R$$valorCsll e IR(4,8%)=R$$valorIr. - Dados p/ crédito: Ag. 3476-2, Conta 225.014-4, Banco do Brasil S.A.";
				//$conteudo2 = "";

			} else if ($tomador == "2" && $empresa == "Mamck") {
				$valorIss = number_format($valorNota * $aliquotaIss,2,',','.');
				$valorPis = number_format($valorNota * $aliquotaPis,2,',','.');
				$valorCofins = number_format($valorNota * $aliquotaCofins,2,',','.');
				$valorCsll = number_format($valorNota * $aliquotaCsll,2,',','.');
				$valorIr = number_format($valorNota * $aliquotaIrNormal,2,',','.');
				return $conteudo1 = "Retenções: ISS(5%)=R$$valorIss; PIS/PASEP(0,65%)=R$$valorPis; COFINS(3%)=R$$valorCofins; CSLL(1%)=R$$valorCsll e IR(4,8%)=R$$valorIr. - Dados p/ crédito: Ag. 3476-2, Conta 225.014-4, Banco do Brasil S.A.";
				//$conteudo2 = "";

			} else if ($tomador == "3" && $empresa == "Mamck") {
				$valorIss = number_format($valorNota * $aliquotaIss,2,',','.');
				$valorPis = number_format($valorNota * $aliquotaPis,2,',','.');
				$valorCofins = number_format($valorNota * $aliquotaCofins,2,',','.');
				$valorCsll = number_format($valorNota * $aliquotaCsll,2,',','.');
				$valorIr = number_format($valorNota * $aliquotaIrNormal,2,',','.');
				return $conteudo1 = "Retenções: ISS(5%)=R$$valorIss; PIS/PASEP(0,65%)=R$$valorPis; COFINS(3%)=R$$valorCofins; CSLL(1%)=R$$valorCsll e IR(4,8%)=R$$valorIr.";
				//$conteudo2 = "";

			} else if ($tomador == "4" && $empresa == "Mamck") {
				$valorIss = number_format($valorNota * $aliquotaIss,2,',','.');
				$valorPis = number_format($valorNota * $aliquotaPis,2,',','.');
				$valorCofins = number_format($valorNota * $aliquotaCofins,2,',','.');
				$valorCsll = number_format($valorNota * $aliquotaCsll,2,',','.');
				$valorIr = number_format($valorNota * $aliquotaIrNormal,2,',','.');
				return $conteudo1 = "Ref. Prestacao de servicos tecnicos de Engenharia, Arquitetura e Agronomia relativos ao Edital 3142/2014. Processo n 7066.01.3142.19/2014,
			Contrato n 0669/2015; Servicos Prestados em xxxx/xxxx. Valor do Servicos: XXXXX; Valor do Deslocamento: XXXXX. Dados Bancarios:
			AG.4460, Conta: 53-9, OP. 003 - CEF - Retenções: ISS(5%)=R$$valorIss; PIS/PASEP(0,65%)=R$$valorPis; COFINS(3%)=R$$valorCofins; CSLL(1%)=R$$valorCsll e IR(4,8%)=R$$valorIr.";
				//$conteudo2 = "";

			} else if ($tomador == "5" && $empresa == "Mamck") {
				$valorIssDif = number_format($valorNota * $aliquotaIssDif,2,',','.');
				$valorPis = number_format($valorNota * $aliquotaPis,2,',','.');
				$valorCofins = number_format($valorNota * $aliquotaCofins,2,',','.');
				$valorCsll = number_format($valorNota * $aliquotaCsll,2,',','.');
				$valorIr = number_format($valorNota * $aliquotaIrDif,2,',','.');
				return $conteudo1 = "Retenções: ISS(2,17%)=R$$valorIssDif; PIS/PASEP(0,65%)=R$$valorPis; COFINS(3%)=R$$valorCofins; CSLL(1%)=R$$valorCsll e IR(1,5%)=R$$valorIr. - Dados p/ crédito: Ag. 4460, Conta 53-9, Caixa Econômica Federal.";
				//$conteudo2 = "";

			} else if ($tomador == "6" && $empresa == "Mamck") {
				$valorIss = number_format($valorNota * $aliquotaIss,2,',','.');
				$valorPis = number_format($valorNota * $aliquotaPis,2,',','.');
				$valorCofins = number_format($valorNota * $aliquotaCofins,2,',','.');
				$valorCsll = number_format($valorNota * $aliquotaCsll,2,',','.');
				$valorIr = number_format($valorNota * $aliquotaIrNormal,2,',','.');
				return $conteudo1 = "Retenções: ISS(5%)=R$$valorIss; PIS/PASEP(0,65%)=R$$valorPis; COFINS(3%)=R$$valorCofins; CSLL(1%)=R$$valorCsll e IR(4,8%)=R$$valorIr. - Dados p/ crédito: Ag. 4460, Conta 53-9, Caixa Econômica Federal.";
				//$conteudo2 = "";

			} else if ($tomador == "7" && $empresa == "Mamck") {
				$valorIss = number_format($valorNota * $aliquotaIss,2,',','.');
				$valorPis = number_format($valorNota * $aliquotaPis,2,',','.');
				$valorCofins = number_format($valorNota * $aliquotaCofins,2,',','.');
				$valorCsll = number_format($valorNota * $aliquotaCsll,2,',','.');
				$valorIr = number_format($valorNota * $aliquotaIrDif,2,',','.');
				return $conteudo1 = "Retenções: PIS/PASEP(0,65%)=R$$valorPis; COFINS(3%)=R$$valorCofins; CSLL(1%)=R$$valorCsll e IR(1,5%)=R$$valorIr. - Informações para crédito: Conta Corrente Digital nº 654308-1, Ag. 0001, Banco 077, Banco Inter.";
				//$conteudo2 = "";

			} else if ($tomador == "4" && $empresa == "Moreira") {
			return $conteudo3 = "Referente aos serviços prestados em xx de xxxx (Serviços de Avaliação de Bens e Serviços de Qualquer Natureza), sob Contrato (SICLG) nº 8190/2016. - Empresa optante pelo Simples Nacional, de que trata o artigo 12 da lei Complementar nº 123, de 14 de Dezembro de 2006. Dados p/ crédito: Ag. 0002, Conta: 4583-2, Op. 003, CEF.";
				//$conteudo1 = " ";
				//$conteudo2 = " ";
				
				
			} else if ($tomador != "4" && $empresa == "Moreira") {
			return $conteudo3 = "Empresa optante pelo Simples Nacional, de que trata o artigo 12 da lei Complementar nº 123, de 14 de Dezembro de 2006. Dados p/ crédito: Ag. 0002, Conta: 4583-2, Op. 003, CEF.";
				//$conteudo1 = " ";
				//$conteudo2 = " ";
						
			} 

		}		

	}
			
?>