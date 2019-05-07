<?php 
	include '../baglanti.php';
	session_start();
	if(isset($_GET["id"])){
		$urun_id=intval($_GET["id"]);
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
			++$_SESSION["sepet"]["urunler"][$urun_id]["adet"];
		}
		else{
			echo $urun_id.". Ürün Eklendi !!!<br/><br/><br/>";
			$urunler[$urun_id] = $kitapveri;
			$_SESSION["sepet"]["urunler"] = $urunler;
		}
		
		$url = htmlspecialchars($_SERVER["HTTP_REFERER"]);
		header("Location: ".$url);
		

	}
	else{
		echo "ID POST EDİLMEDİ !!!";
	}
	
?>