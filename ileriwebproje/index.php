<html>
<head>
  	<meta charset="UTF-8">

	<link type="text/css" rel="stylesheet" href="CSS/index.css"/>
	<script type="text/javascript">
		function eklendi(){
			alert("Sepete Eklendi...");
		}
	</script>
</head>
<body>
<?php 
include 'header.php';
include 'baglanti.php';
?>
<div class="main">
	<div class="kitap_sutun">
		<?php
		$sorgu = "";
		if(isset($_GET["sorgu"])){
			$kitap_adi = $_GET["sorgu"];
			$sorgu = "SELECT * FROM kitaplar WHERE kitapadi LIKE '%$kitap_adi%'";
		}
		else{
			$sorgu = "SELECT * FROM kitaplar";
		}
			$sonuc=$baglanti->query($sorgu);
			$kitap_adlari = array();
			$kitap_fiyatlari = array();
			$kitap_imgs = array();
			if($sonuc->num_rows >0){
				$temp = 0;
				while($kitaplar=$sonuc->fetch_assoc()){
					$kitap_adlari[$temp] = $kitaplar["kitapadi"];
					$kitap_fiyatlari[$temp] = $kitaplar["kitapfiyat"];
					$kitap_imgs[$temp] = $kitaplar["kitapresim"]; 
					$kitap_ids[$temp] = $kitaplar["kitapid"];
					$temp++;
				}
				for($i=0;$i<count($kitap_adlari);$i++){
					$kid = $kitap_ids[$i];
		?>

			<div class="kitap">
				<?php
					echo '<div style="background-image:url(images/'.$kitap_imgs[$i].');" class="kitap_img">'.
							'<div class="visible"><div class="non_visible"><a href="urun.php?id='.$kid.'" class="nva">İNCELE</a></div>
							<div class="non_visible2"><a href="sepet_functions/sepeteEkle.php?id='.$kid.'" onclick="eklendi();" class="nva2">SEPETE EKLE</a></div></div>'.			
							'</div><br/><div class="kitap_bilgi"><a class="kitap_ad" href="#">'.$kitap_adlari[$i].'</a>'.
							'<a class="fiyat" href="#">'.$kitap_fiyatlari[$i].'&nbspTL</a></div>';

				?>
			</div>
		<?php 
				}
			}
			else{
				echo "Kayıt yok!!";
			}
		
		?>
	</div>
</div>


<?php 
include 'footer.php';
?>

</body>
</html>