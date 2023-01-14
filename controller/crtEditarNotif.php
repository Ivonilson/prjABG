<?php

	class crtEditarNotif {

		public function editarNotif()
		{	
			require_once "model/EditarNotif.php";
            $editarNotificacao = new EditarNotif();
            return $editarNotificacao->edNotif();
		}

        public function carregarNotif(){
            require_once "model/EditarNotif.php";
            $carregarNotif = new EditarNotif();
            return $carregarNotif->carregarNotifEdicao($_GET['id_notificacao']);
        }

	}

	 $notificacaoAlvo= new crtEditarNotif();
	 $notificacao = $notificacaoAlvo->carregarNotif();

     if(filter_input(INPUT_POST, 'ipt-id-notificacao') != '' || filter_input(INPUT_POST, 'ipt-id-notificacao') != NULL){
        $editar = new crtEditarNotif();
        $resposta = $editar->editarNotif();
        if($resposta){
            $mensagem = 'Notificação editada com Sucesso!';
         } else{
            $mensagem = 'Erro: Para gravar, alguma modificação deverá ser realizada ou Contate o Suporte.';
         } 
     } else {
        $mensagem = '';
     }
     
?>