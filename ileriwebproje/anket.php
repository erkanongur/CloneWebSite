<html>
<head>
	<link type="text/css" rel="stylesheet" href="CSS/anket.css"/>
</head>
<body>
<?php
	include 'header.php';
	include 'baglanti.php';

	if(isset($_SESSION["login"]) != true){
		?>
		<script type="text/javascript">
			alert("Anketimizi doldurmak için lütfen giriş yapınız...");
			location.replace("index.php");
		</script>
		<?php
	}
	else{
		?>
		<div class="container">
			<table class="anket_tablo">
				<form action="" method="POST">
					<tr id="baslik_satir">
						<td><h2>HOŞGELDİNİZ <?php echo strtoupper($_SESSION["ad"])."\t".strtoupper($_SESSION["soyad"]);?></h2></td>
					</tr>

					<tr id="soru">
						<td>
						Sitemize 1 Kötü 5 Çok İyi Olmak Üzere, Kaç Puan Verirsiniz? <br/>
						<input type="number" name="Site_puani" min="1" max="5"/>
						</td>
					</tr>

					<tr id="soru">
						<td>
							Sitemizdeki Fiyatları Uygun Buluyormusunuz? <br/>
							<input type="radio" name="Fiyat_Uygunlugu" value="Evet" />&nbspEvet
							<input type="radio" name="Fiyat_Uygunlugu" value="Hayir" />&nbspHayır
						</td>
					</tr>

					<tr id="soru">
						<td>
							Sitemizde Yapılan Güncellemelerden Memnunmusunuz? <br/>
							<input type="radio" name="Memnuniyet" value="Evet" />&nbspEvet
							<input type="radio" name="Memnuniyet" value="Hayir" />&nbspHayır
						</td>
					</tr>
					<tr id="soru">
						<td>
							Sitemizi Güvenilirliğine 1 En Düşük 5 En Yüksek Olmak Üzere, Kaç Puan Verirsiniz? <br/> 
							<input type="number" name="Site_guvenilirlik" min="1" max="5"/>
						</td>
					</tr>
					<tr id="soru">
						<td>
							Sitemizin Ne Kadar Kullanışlı Olduğunu Düşünüyorsunuz?<br/>
							<select name="Kullanıslilik">
								<option>-Seçiniz-</option>
								<option>Kullanışsız</option>
								<option>Eh İşte</option>
								<option>Çok Kullanışlı</option>
							</select>
						</td>
					</tr>
					<tr id="soru">
						<td>
							Sitemizi Geliştirebilmemiz İçin Görüşleriniz Bizim İçin Çok Önemli, <br/>
							Lütfen Görüşlerinizi Bizimle Paylaşın..<br/>
							<textarea rows="5" cols="20" name="yorum"></textarea>
						</td>
					</tr>
					<tr id="soru">
						<td>
							<input type="checkbox" name="sozlesme"> Kullanıcı Sözleşmesini Okudum ve Kabul Ediyorum.
						</td>
					</tr>
					<tr id="soru">
						<td>
							<input type="submit" name="gonder" value="Gönder"/><br/>
						</td>
					</tr>
				</form>
			</table>
		</div>
		<?php
	}	
	if($_POST){
		if (isset($_POST["gonder"])) {
			if (isset($_POST["sozlesme"])) {
				$Site_puani = $_POST["Site_puani"];
				$Fiyat_Uygunlugu = "";
				if(isset($_POST["Fiyat_Uygunlugu"])){$Fiyat_Uygunlugu = $_POST["Fiyat_Uygunlugu"];}
				$Memnuniyet = "";
				if(isset($_POST["Memnuniyet"])){$Memnuniyet = $_POST["Memnuniyet"];}
				$Site_guvenilirlik = $_POST["Site_guvenilirlik"];
				$Kullanıslilik = $_POST["Kullanıslilik"];
				$Yorum = $_POST["yorum"]; 
				$ID = $_SESSION["kid"];

				$baglanti->query("INSERT INTO anket (anket_uye_id , anket_site_puani , anket_fiyat_uygunlugu , anket_memnuniyet, anket_guvenilirlik , anket_kullanislilik , anket_yorum) VALUES ('$ID' , '$Site_puani' , '$Fiyat_Uygunlugu' , '$Memnuniyet' , '$Site_guvenilirlik' , '$Kullanıslilik' , '$Yorum')");

				?> 
					<script type="text/javascript">
						alert("Zamanınızı Ayırıp Anketimizi Doldurduğunuz İçin Teşekkür Ederiz...");
						location.replace("index.php");
					</script>
				<?php
			}
			else{
				?>
				<script type="text/javascript">
					alert("Kullanıcı Sözleşmesini Kabul Etmelisiniz..");
				</script>
				<?php
			}
		}
	}
?>





<?php
	include 'footer.php';
?>
</body>
</html>