<html>
<head>
	<link type="text/css" rel="stylesheet" href="CSS/yorumyap.css"/>
	<script type="text/javascript">
		function yonlendir(){
			var eleman = document.getElementsByClassName('gizli');
			var kimlik = eleman[0].id;
			console.log("Çalıştıııı");
			location.replace("urun.php?id=" + kimlik);
			
		}
	</script>
</head>
<body>
	<?php 
		include 'header.php';
		include 'baglanti.php';
		$id = intval($_GET['id']);
	?>
	<div class="container">
		<div class="baslik">
			<h3>YORUM YAP</h3>
		</div>
			
		
		<div class="form">
			<form action="" name="yorum_form" method="POST" id="form">
				Başlık :<br/>
				<input type="text" name="baslik"/><br/><br/>
				<input type="hidden" id="<?php echo $id; ?>" class="gizli"/>
				Yorumunuz : <br/>
				<textarea name="yorum" id="yorum"></textarea>
				<br/><br/>
				<input type="radio" name="anonimlik"/>&nbspAnonim olarak paylaşılsın<br/><br/>
				<input type="submit" name="yorumyap"/>
			</form>
		</div>
	</div>
	<?php
	if(isset($_POST["yorumyap"])){
		if(empty($_POST["yorum"]) or $_POST["yorum"] == ""){
			?>
			<script type="text/javascript">
				alert("Lütfen yorum alanını boş bırakmayınız !!");
			</script>
			<?php
		}
		else{
			$ad = $_SESSION["ad"];
			$soyad = $_SESSION["soyad"];
			$tarih = date('d.m.Y');
			$yorum = $_POST["yorum"];
			$saat = date('H:i:s');
			$yorum_kitapid = $id;
			$baslik = $_POST["baslik"];
			$anonimlik = 0;
			if(isset($_POST["anonimlik"])){
				$anonimlik = 1;
			}

			$sorgu = "INSERT INTO yorumlar (yorum_ad , yorum_soyad , yorum_tarih , yorum , yorum_saat , yorum_kitapid , yorum_baslik , yorum_anonimlik) VALUES ('$ad' , '$soyad' , '$tarih' , '$yorum' , '$saat' , '$yorum_kitapid' , '$baslik' , '$anonimlik')";
			$baglanti->query($sorgu);
			?>
			<script type="text/javascript">
				alert("Yorumunuz Eklendi...");
				yonlendir();
			</script>
			<?php
		}
	}
						
 	?>


	<?php include 'footer.php';?>
</body>
</html>