<?php

class crtNotificacoesCadastradas {

	public function carregarNotificacoes()
	{	
            $pesquisar = new NotificacoesCadastradas();
            $resultados = $pesquisar->pesquisarNotificacoes();
            return $resultados;
	}
}

$crtl = new crtNotificacoesCadastradas();
$todas_notificacoes = $crtl->carregarNotificacoes();

?>