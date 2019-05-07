<?php
	session_start();
	if($_SESSION["login"] != true){
		?>
		<script type="text/javascript">
			alert("Lütfen sepetinizi görmek için giriş yapınız !!");
			location.replace("index.php");
		</script>
		<?php
	}
	else{
		?>
		<script type="text/javascript">
			location.replace("sepet.php");
		</script>
		<?php
	}

?>