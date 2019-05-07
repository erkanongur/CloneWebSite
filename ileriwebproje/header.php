<html>
<head>
	<title>Akademik, Kültür ve Eğitim Kitapları - Gazi Kitabevi</title>
	<meta charset="utf-8"/>
	<link type="text/css" rel="stylesheet" href="CSS/header.css"/>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<?php include 'baglanti.php';
		session_start();
	?> 
</head>
<body style="margin:0px;padding:0px;">

<div class="header">
<div class="hakkimizda">
	<a href="hakkimizda.html">Hakkımızda</a>&nbsp&nbsp&nbsp&nbsp<a href="iletisim.html">İletişim</a>&nbsp&nbsp&nbsp&nbsp<a href="akademik.html">Akademik Teşvik Bilgilendirme</a>
	<div class="giris">
		<?php 
			if(isset($_SESSION["login"]) != true){
				if(isset($_COOKIE["kmail"]) && isset($_COOKIE["sifre"])){
					$cookie_sorgu = $baglanti->query("SELECT * FROM uyeler");
					$cookie_kontrol = false;
					while($cookie_satir = $cookie_sorgu->fetch_array()){
						if($cookie_satir["e_mail"] == $_COOKIE["kmail"] && $cookie_satir["uye_sifre"] == $_COOKIE["sifre"]){
							$_SESSION["login"] = true;
							$_SESSION["ad"] = $_COOKIE["kadi"];
							$_SESSION["soyad"] = $_COOKIE["ksoyad"];
							$cookie_kontrol = true;
							break;
						}
						else{
							$cookie_kontrol = false;
						}
					}
					if($cookie_kontrol){
						?>
					 	<script> location.replace("index.php"); </script>
						<?php
					}
					else{
						echo 
						'<form name="giris" action="" method="POST">
							E-Mail :&nbsp<input type="text" name="giris_mail" placeholder="e-mail.." class="giris_input" required/>
							Şifre :&nbsp<input type="password" name="giris_sifre" placeholder="Şifreniz.." class="giris_input" required/>
							<input type="checkbox" name="giris_hatirla" value="1"/>Beni Hatırla
							<input type="submit" name="giris_buton" value="Giriş Yap" width:"50px" border:"none"/>
							<a href="kayit.php">Kaydol</a><i class="fas fa-sort-down"></i>
						</form>';
					}
					
				}
				else{
					echo 
						'<form name="giris" action="" method="POST">
							E-Mail :&nbsp<input type="text" name="giris_mail" placeholder="e-mail.." class="giris_input" required/>
							Şifre :&nbsp<input type="password" name="giris_sifre" placeholder="Şifreniz.." class="giris_input" required/>
							<input type="checkbox" name="giris_hatirla" value="1"/>Beni Hatırla
							<input type="submit" name="giris_buton" value="Giriş Yap" width:"50px" border:"none"/>
							<a href="kayit.php">Kaydol</a><i class="fas fa-sort-down"></i>
						</form>';
				}
				
			}
			else{
				echo '<i class="fas fa-user"></i><span>Hoşgeldiniz Sn. '.$_SESSION["ad"]." ".$_SESSION["soyad"].'&emsp;-&emsp;</span><a href="hesabim.php">Hesabım</a>&emsp;-&emsp;<a href="siparis.php">Siparişlerim</a><a href="cikis.php" style="color:red;">&emsp;Çıkış</a>';
			}
		if(isset($_POST["giris_buton"])){
			$k_mail = $_POST["giris_mail"];
			$k_sifre = $_POST["giris_sifre"];
			$hatirla = @$_POST["giris_hatirla"];
			$kontrol = false;
			$sorgu = $baglanti->query("SELECT * FROM uyeler");
			while($satir = $sorgu->fetch_array()){
				if($satir["e_mail"] == $k_mail && $satir["uye_sifre"] == $k_sifre){
					$kontrol = false;
					$_SESSION["login"] = true;
					$_SESSION["ad"] = $satir["uye_ad"];
					$_SESSION["soyad"] = $satir["uye_soyad"];

					if(isset($_POST["giris_hatirla"])){
						setcookie("kid", $satir["uye_id"], time()+60*60*24);
						setcookie("kadi", $satir["uye_ad"], time() +60*60*24);
						setcookie("ksoyad", $satir["uye_soyad"], time() +60*60*24);
						setcookie("kmail", $satir["e_mail"], time() + 60*60*24);
						setcookie("sifre", $satir["uye_sifre"], time() +60*60*24);
					}

					?>
					 <script> location.replace("index.php"); </script>
					<?php
				}
				else{
    				$kontrol = true;
				}
			}
			if($kontrol){
				?>
    			<script>alert("Kullanıcı Maili Ya da Şifreniz Hatalı !!!");</script>
    			<?php
			}
			

		}
		?>
	</div>
</div>
<div class="arama" background-image="images/arama.jpg">
	<img src="images/logo.png" class="resim"/>
	<input type="search" placeholder="    Yazar Adı, Kitap Adı Yada Stok Kodu İle Arama Yapabilirsiniz..."/ class="searchbar">
	<div class="kargo">
		<i class="fas fa-truck"></i>
		<a style="margin-right:10px" href="kargo.html">Kargo Sorgulama</a>
		<i class="fas fa-shopping-basket"></i>
		<a href="sepet_giris_kontrol.php">Sepetim</a>
	</div>	
</div>
<div class="menu">
	<ul id="menu">
		<li id="a"><a href="index.php">ANASAYFA</a></li>
		<li id="a"><a href="kategoriler.php">KATEGORİLER</a>&nbsp&nbsp
			<i class="fas fa-sort-down"></i>
			<ul id="icmenu">
				<li id="b"><a href="konu.html"><i class="fas fa-caret-right"></i>&nbspBİLİM TEKNOLOJİ VE ÇEVRE</a></li>
				<li id="b"> <a href="konu.html"><i class="fas fa-caret-right"></i>&nbspEKONOMİ İŞLETME MUHASEBE</a></li>
				<li id="b"> <a href="konu.html"><i class="fas fa-caret-right"></i>&nbspKAMPANYALI ÜRÜNLER</a></li>
				<li id="b"> <a href="konu.html"><i class="fas fa-caret-right"></i>&nbspPROMOSYONLU ÜRÜNLER</a></li>
				<li id="b"> <a href="konu.html"><i class="fas fa-caret-right"></i>&nbspSPOR</a></li>
				<li id="b"> <a href="konu.html"><i class="fas fa-caret-right"></i>&nbspSAĞLIK TIP</a></li>
				<li id="b"> <a href="konu.html"><i class="fas fa-caret-right"></i>&nbspDİN</a></li>
				<li id="b"> <a href="konu.html"><i class="fas fa-caret-right"></i>&nbspFEN BİLİMLERİ</a></li>
				<li id="b"><a href="konu.html"><i class="fas fa-caret-right"></i>&nbsp KÜLTÜR-SANAT-MİMARLIK</a></li>
				<li id="b"><a href="konu.html"><i class="fas fa-caret-right"></i>&nbsp SINAVLARA HAZIRLIK</a></li>
				<li id="b"> <a href="konu.html"><i class="fas fa-caret-right"></i>&nbspZİRAAT & TARIM & HAYVANCILIK</a></li>
				<li id="b"><a href="konu.html"><i class="fas fa-caret-right"></i>&nbsp EDEBİYAT</a></li>
				<li id="b"> <a href="konu.html"><i class="fas fa-caret-right"></i>&nbspHOBİ</a></li>
				<li id="b"><a href="konu.html"><i class="fas fa-caret-right"></i>&nbsp MALİYE</a></li>
				<li id="b"><a href="konu.html"><i class="fas fa-caret-right"></i>&nbsp SOSYAL BİLİMLER</a></li>
				<li id="b"> <a href="konu.html"><i class="fas fa-caret-right"></i>&nbspGAZİ KİTABEVİ ÖZEL İNDİRİM</a></li>
				<li id="b"> <a href="konu.html"><i class="fas fa-caret-right"></i>&nbspEĞİTİM</a><li>
				<li id="b"> <a href="konu.html"><i class="fas fa-caret-right"></i>&nbspHUKUK</a></li>
				<li id="b"> <a href="konu.html"><i class="fas fa-caret-right"></i>&nbspPOLİTİKA</a></li>
				<li id="b"> <a href="konu.html"><i class="fas fa-caret-right"></i>&nbspSÖZLÜK</a></li>
				<li id="b"><a href="konu.html"><i class="fas fa-caret-right"></i>&nbsp HEDİYELİK & AKSESUAR</a></li>
			</ul>
		</li>
		<li id="a"><a href="yenikitap.php">YENİ ÇIKAN KİTAPLAR</a></li>
	</ul>
</div>
</div>		
</body>
</html>