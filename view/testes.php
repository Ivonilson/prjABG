<?php
	/*if ($_SESSION['user'] == null || !isset($_SESSION['user'])) {
		//header('Location: index.php');
		echo "<script>window.location.href ='/'</script>";
	}*/
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="noindex, nofollow">
	<title></title>
</head>
<body>

	<h1>
		<?php 
			$senha = crypt('', '');
			echo $senha;
		?>
	</h1>
	
</body>
</html>
