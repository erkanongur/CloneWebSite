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
		<h3>YENİ ÜYELİK</h3>
		<hr style="width:90%;margin-top:3%;float:left;"></hr>
	</div>
	<div>
		<form action="" name="uyelik_form" method="POST">
			<table style="margin-left:5%;">
				<tr>
					<td class="sutun">Adı <span id="span">:</span></td>
					<td  class="sutun"><input type="text" name="k_ad" required>*</td>
				</tr>
				<tr>
					<td  class="sutun">Soyadı <span id="span">:</span></td>
					<td class="sutun"><input type="text" name="k_soyad" required>*</td>
				</tr>
				<tr>
					<td  class="sutun">Email <span id="span">:</span></td>
					<td class="sutun"><input type="email" name="k_mail" required>*</td>
				</tr>
				<tr>
					<td  class="sutun">Şifre <span id="span">:</span></td>
					<td class="sutun"><input type="password" name="k_sifre" required>*</td>
				</tr>
				<tr>
					<td class="sutun">Şifre Tekrar <span id="span">:</span></td>
					<td class="sutun"><input type="password" name="k_sifre2" required>*</td>
				</tr>
				<tr>
					<td class="sutun">Cinsiyet <span id="span">:</span></td>
					<td class="sutun"><input type="radio" name="k_cinsiyet" value="Erkek" required>Erkek
										<input type="radio" name="k_cinsiyet" value="Kadın" required>Kadın</td>
				</tr>
				<tr>
					<td class="sutun">Cep Telefonu <span id="span">:</span></td>
					<td class="sutun"><input type="tel" name="k_telefon" maxlength="11"></td>
				</tr>
				<tr>
					<td class="sutun">Doğum Tarihi <span id="span">:</span></td>
					<td class="sutun"><input type="date" name="k_dogum"></td>
				</tr>
				<tr>
					<td class="sutun">Mail Listesi <span id="span">:</span></td>
					<td class="sutun"><input type="checkbox" name="k_haberal">Kampanyalardan haberdar olmak istiyorum.</td>
				</tr>
				<tr>
					<td class="sutun">Üyelik Sözleşmesi <span id="span">:</span></td>
					<td class="sutun"><input type="checkbox" name="k_sozlesme" required>Üyelik sözleşmesini kabul ediyorum.*</td>
				</tr>
				<tr>
					<td class="sutun">Kişisel Verilerin Korunması <span id="span">:</span></td>
					<td class="sutun"><input type="checkbox" name="k_sozlesme2" required>Kişisel verilerin korunması hakkında bilgilendirmeyi okudum onaylıyorum.*</td>
				</tr>
				<tr>
					<td class="sutun"></td>
					<td class="sutun"><input type="submit" value="Kaydet" name="submit">&nbsp&nbsp
										<input type="submit" value="İptal" name="iptal"></td>
				</tr>
			</table>
		</form>
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