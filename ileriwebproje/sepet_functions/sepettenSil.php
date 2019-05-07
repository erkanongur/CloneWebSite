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
			if($urunler[$urun_id]["adet"]>1){
				echo $urun_id.". Ürünün Adeti Azaltıldı !!!<br/><br/><br/>";
				--$_SESSION["sepet"]["urunler"][$urun_id]["adet"];
			}
			else{
				echo $urun_id.". Ürün Silindi !!!<br/><br/><br/>";
				unset($urunler[$urun_id]);
				$_SESSION["sepet"]["urunler"] = $urunler;
			}
		}
		
		$url = htmlspecialchars($_SERVER["HTTP_REFERER"]);
		header("Location: ".$url);
	}
	else{
		echo "ID POST EDİLMEDİ !!!";
	}
?>