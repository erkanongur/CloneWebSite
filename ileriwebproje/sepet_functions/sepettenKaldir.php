<?php
	include '../baglanti.php';
	session_start();
	if(isset($_GET["id"])){
		$urun_id=intval($_GET["id"]);
		if(isset($_SESSION["sepet"])){
			$sepet = $_SESSION["sepet"];
			$urunler = $sepet["urunler"];
		}
		else{
			$urunler = array();
		}


		if(array_key_exists($urun_id, $urunler)){
			echo $urun_id.". ÜRÜN SEPETTEN KALDIRILDI";
			unset($urunler[$urun_id]);
			$_SESSION["sepet"]["urunler"] = $urunler;
		}

		$url = htmlspecialchars($_SERVER["HTTP_REFERER"]);
		header("Location: ".$url);
	}
	else{
		echo "ID POST EDİLMEDİİ";
	}
?>	
