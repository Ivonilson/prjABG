<?php

class crtLogout{

	public function logout(){
		session_destroy();
		echo "<script>window.location.href ='/'</script>";
	}
}