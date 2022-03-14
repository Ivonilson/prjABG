<?php

class crtValidarUsuario {

	public function valUsuario(){

		$validacao = new Conn();

		if(filter_input(INPUT_POST, 'usuario') != NULL) {

			try {

			$resultado = $validacao->validarUsuario();

			if($resultado){
				$_SESSION['user'] = $resultado[0]->user;

			} else {
				$_SESSION['user'] = NULL;
				echo "<script>alert('aqui')</script>";
				
			}

			} catch (PDOException $erro) {
				//echo "ERRO: ".$erro->getMessage();

			}
		}

	}
}

	$valida = new crtValidarUsuario();
	$mensagem_erro = $valida->valUsuario();


?>
