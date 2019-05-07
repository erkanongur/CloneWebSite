<?php 
	include '../baglanti.php';
	session_start();
	if(isset($_GET["id"])){
		if(!isset($_GET["sayi"])){
			$_GET["sayi"] = 1; 
		}
		$urun_id=intval($_GET["id"]);
		$urun_sayi = intval($_GET["sayi"]);
		$kitapsorgu = "SELECT * FROM kitaplar WHERE kitapid = $urun_id";
		$kitapsonuc = $baglanti->query($kitapsorgu);
		$kitapveri = $kitapsonuc->fetch_array(); 

		if(isset($_SESSION["sepet"])){
			$sepet = $_SESSION["sepet"];
			$urunler = $sepet["urunler"];
		}
		else{
			$urunler = array();
		}


		if(array_key_exists($urun_id, $urunler)){
			echo $urun_id.". Ürün Adeti arttırıldı !!!<br/><br/><br/>";
			for ($i=0; $i < $urun_sayi; $i++) { 
				++$_SESSION["sepet"]["urunler"][$urun_id]["adet"];
			}
		}
		else{
			echo $urun_id.". Ürün Eklendi !!!<br/><br/><br/>";
			$urunler[$urun_id] = $kitapveri;
			$urunler[$urun_id]["adet"] = $urun_sayi;
			$_SESSION["sepet"]["urunler"] = $urunler;
		}
		
		$url = htmlspecialchars($_SERVER["HTTP_REFERER"]);
		header("Location: ".$url);
		

	}
	else{
		echo "ID POST EDİLMEDİ !!!";
	}
	
?>