<html>
<head>
	<link type="text/css" rel="stylesheet" href="CSS/kayit.css"/>
</head>
<body>
	<?php 
		include 'header.php';
		include 'baglanti.php';
	?>
	<div class="baslik">
		<h3>PROFİLİ GÜNCELLE</h3>
		<hr style="width:100%;margin-top:3%;float:left;"></hr>
	</div>
	<?php 
		$kid = $_SESSION["kid"];
		$sorgu = $baglanti->query("SELECT * FROM uyeler WHERE uye_id = '$kid'");
		$uye = $sorgu->fetch_assoc();
	?>
	<div class="container">
		<div class="form">
			<form action="" name="uyelik_form" method="POST">
				<table style="margin-left:5%;">
					<tr>
						<td class="sutun">Adı <span id="span">:</span></td>
						<td  class="sutun"><input type="text" name="k_ad" value="<?php echo $uye['uye_ad']; ?>">*</td>
					</tr>
					<tr>
						<td  class="sutun">Soyadı <span id="span">:</span></td>
						<td class="sutun"><input type="text" name="k_soyad" value="<?php echo $uye['uye_soyad']; ?>">*</td>
					</tr>
					<tr>
						<td  class="sutun">Email <span id="span">:</span></td>
						<td class="sutun"><input type="email" name="k_mail" value="<?php echo $uye['e_mail']; ?>">*</td>
					</tr>
					<tr>
						<td  class="sutun">Şifre <span id="span">:</span></td>
						<td class="sutun"><input type="password" name="k_sifre" value="<?php echo $uye['uye_sifre']; ?>">*</td>
					</tr>
					<tr>
						<td class="sutun">Şifre Tekrar <span id="span">:</span></td>
						<td class="sutun"><input type="password" name="k_sifre2" value="<?php echo $uye['uye_sifre']; ?>">*</td>
					</tr>
					<tr>
						<td class="sutun">Cinsiyet <span id="span">:</span></td>
						<td class="sutun">
							<?php
							if($uye["cinsiyet"] == "Erkek"){
								echo'
								<input type="radio" name="k_cinsiyet" value="Erkek" checked="true">Erkek
								<input type="radio" name="k_cinsiyet" value="Kadın">Kadın';
							}
							else if($uye["cinsiyet"] == "Kadın"){
								echo'
								<input type="radio" name="k_cinsiyet" value="Erkek">Erkek
								<input type="radio" name="k_cinsiyet" value="Kadın" checked="true">Kadın';
							}
							?>
						</td>
							
					</tr>
					<tr>
						<td class="sutun">Cep Telefonu <span id="span">:</span></td>
						<td class="sutun"><input type="tel" name="k_telefon" maxlength="11" value="<?php echo $uye['cep_telefonu']; ?>"></td>
					</tr>
					<tr>
						<td class="sutun">Doğum Tarihi <span id="span">:</span></td>
						<td class="sutun"><input type="date" name="k_dogum" value="<?php echo $uye['dogum_tarihi']; ?>"></td>
					</tr>
					<tr>
						<td class="sutun">Mail Listesi <span id="span">:</span></td>
						<td class="sutun">
							<?php 
							if($uye["mail_liste"] == 1){
								echo '
								<input type="checkbox" name="k_haberal" checked="true"/>
								Kampanyalardan haberdar olmak istiyorum.';
							}
							else{
								echo '
								<input type="checkbox" name="k_haberal"/>
								Kampanyalardan haberdar olmak istiyorum.';
							}
							?>
						</td>
					</tr>
					<tr>
						<td class="sutun"></td>
						<td class="sutun"><input type="submit" value="Kaydet" name="submit">&nbsp&nbsp
											<input type="submit" value="İptal" name="iptal"></td>
					</tr>
				</table>
			</form>
		</div>
	</div>
	<?php
	if(isset($_POST["submit"])){
		if($_POST["k_sifre"] == $_POST["k_sifre2"]){
			$ad = $_POST["k_ad"];
			$soyad = $_POST["k_soyad"];
			$sifre = $_POST["k_sifre"];
			$mail = $_POST["k_mail"];
			$tarih = $_POST["k_dogum"];
			$cinsiyet = "";
			$mail_listesi = false;
			$cinsiyet = $_POST["k_cinsiyet"];
			$telefon = $_POST["k_telefon"];
			$mail_listesi = true;
			$sql = "INSERT INTO uyeler (uye_ad, uye_soyad, uye_sifre ,e_mail, dogum_tarihi, cinsiyet,cep_telefonu,mail_liste) VALUES('$ad','$soyad','$sifre', '$mail', '$tarih', '$cinsiyet', '$telefon','$mail_listesi')";
			$baglanti->query($sql);
		}
		else{
			echo '<p style="text-align:center">Şifreler Eşleşmiyor !!!</p>';
		}
	}
						
 	?>


	<?php include 'footer.php';?>
</body>
</html>