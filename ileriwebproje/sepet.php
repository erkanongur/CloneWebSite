<html>
<head>
  	<meta charset="UTF-8">
	<link type="text/css" rel="stylesheet" href="CSS/sepet.css"/>
	<script type="text/javascript">
		function Arttir(id){
			var temp = document.getElementById(id);
			temp.value++;
			location.replace("sepet_functions/sepeteEkle.php?id="+id);
		}
		function Azalt(id){
			var temp = document.getElementById(id);
			if (temp.value != 0) {
				temp.value--;
				location.replace("sepet_functions/sepettenSil.php?id="+id);
			}
		}
		function Sepetten_Kaldir(id){
			location.replace("sepet_functions/sepettenKaldir.php?id="+id);
		}
	</script>
</head>
<body>
<?php 
	include 'header.php';
	include 'baglanti.php'; 
	@session_start();
?>
<div class="main">
	<?php 
		if(empty($_SESSION["sepet"]["urunler"])){
			?>
			<div class="bos_sepet">
				<br/>
				<br/>
				<b><i class="fas fa-info-circle"></i></b><br/>
				<p>Alışveriş Sepetinizde Ürün Bulunmamaktadır..</p>	
				<br/>
				<br/>
			</div>
			<?php
		}
		else{
			$urunler = $_SESSION["sepet"]["urunler"];
			?>
			<div class="container">
				<div class="sepet">
					<div class="sepet_icerik">
						<div class="baslik">
							<h2>&nbsp&nbsp&nbsp&nbspSEPET DETAYI</h2>
						</div>
						<?php foreach ($urunler as $kitap) { ?>
						<div class="urun">
							<div class="urun_img">
								<?php echo '<img src="images/'.$kitap["kitapresim"].'" class="urun_resim">';?>
							</div>
							<div class="urun_ad">
								<?php echo '<br/>&nbsp&nbsp&nbsp<a href="urun.php?id='.$kitap["kitapid"].'" class="urun_ismi">'.$kitap["kitapadi"].'</a><br/><br/>' ?>
								&nbsp&nbsp&nbsp<a class="sepettenKaldir" onclick="Sepetten_Kaldir(<?php echo $kitap["kitapid"];?>)" class="urun_ismi">Sepetten Sil</a>
							</div>
							<div class="urun_adet">
								<div class="adet_div">
									<?php echo '
									
										<input onclick="Arttir('.$kitap["kitapid"].');" name="Arttir" type="submit" value="+">

										<input type="hidden" name="id" value="'.$kitap["kitapid"].'"/>
									
									
										<input type="number" value="'.$kitap["adet"].'" class="adet_bilgisi" id="'.$kitap["kitapid"].'"/>
									

									
										<input type="hidden" name="id" value="'.$kitap["kitapid"].'"/>
										<input onclick="Azalt('.$kitap["kitapid"].');" name="Azalt" type="submit" value="-">'
									?>
								</div>
							</div>
							<div class="urun_fiyat">
								<div class="toplam_fiyat">
									<b>Toplam</b>
									<hr>
									<p style="font-weight: 20px;">
										<?php 
											echo $kitap["kitapfiyat"]*intval($_SESSION["sepet"]["urunler"][$kitap["kitapid"]]["adet"]); 
										?>
										<br/>
										+KDV % 0
									</p>
								</div>
							</div>
						</div>
						<?php }?>
						<a href="index.php" class="Alisveris_Devam"> <- Alışverişe Devam Et</a>
					</div>
					<div class="sepet_ozeti">
						<h3>&nbsp&nbsp&nbspSEPET ÖZETİ</h3><br/>
						<div class="ozet">
							<table class="ozet_tablo">
								<tr>
									<td id="sol">Ara Toplam</td>
									<td id="sag"><?php 
											echo $kitap["kitapfiyat"]*intval($_SESSION["sepet"]["urunler"][$kitap["kitapid"]]["adet"]); 
										?> TL 
								</td>
								</tr>
								<tr>
									<td id="sol">KDV</td>
									<td id="sag">0,00 TL </td>
								</tr>
								<tr>
									<td id="sol">KDV Dahil</td>
									<td id="sag"><?php 
											echo $kitap["kitapfiyat"]*intval($_SESSION["sepet"]["urunler"][$kitap["kitapid"]]["adet"]); 
										?>
									</td>
								</tr>

								<tr>
									<td id="sol" style="border-top: 1px solid #DDDDDD">Toplam</td>
									<td id="sag" style="border-top: 1px solid #DDDDDD"><?php 
											echo $kitap["kitapfiyat"]*intval($_SESSION["sepet"]["urunler"][$kitap["kitapid"]]["adet"]); 
										?> TL 
									</td>
								</tr>
							</table>
							<input id="buton" type="submit" value="ALIŞVERİŞİ TAMAMLA"/>
						</div>

					</div>
				</div>
			</div>
			<?php
		}
	?>

	
</div>
<?php 
	include 'footer.php';
?>
</body>
</html>