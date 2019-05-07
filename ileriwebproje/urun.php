<html>
<head>
	<?php
		include 'header.php';
		$id = intval($_GET['id']);
		$kitapsorgu = "SELECT * FROM kitaplar WHERE kitapid = $id";
		$kitapsonuc = $baglanti->query($kitapsorgu);
		$kitapveri = $kitapsonuc->fetch_array();
		
	?>
	<meta charset="utf-8"/>
	<link type="text/css" rel="stylesheet" href="CSS/urun.css"/>
	<?php include 'baglanti.php';
	 ?>	 
	 <script type="text/javascript">
	 	function gorunurluk(id) {
	 	var temp = '';
	 	var idler = ['first_open', 'second_open', 'third_open'];
	 	for (var i = 0; i < idler.length; i++) {
	 		temp = document.getElementById(idler[i]);
	 		temp.style.display = 'none';
	 	}
       var e = document.getElementById(id);
       e.style.display = 'block';
    }

	 </script>
</head>
<body style="margin:0px;padding: 0px;">
	<div class="kategori">
		<a href="index.php" style="text-decoration: none;font-weight: bold;">Anasayfa</a>&nbsp>>
		<a href="index.php"><?php echo $kitapveri["kategori"]; ?></a>
	</div>
	<div class="main">
		<div class="kitap">
			<div class="kitapresim" style="<?php echo 'background-image:url(images/'.$kitapveri["kitapresim"].')';?>;background-size: cover;">
			</div>
			<div class="kitapinfo">
				<p id="kitapinfo"><?php echo $kitapveri["kitapadi"]; ?></p>
				<p id="kitapinfo"><?php echo $kitapveri["kitapfiyat"]; ?> TL Kdv Dahil</p>
				<hr></hr>
				<br/>
				<p id="kitapinfo2">Kategori : <?php echo $kitapveri["kategori"]; ?></p>
				<p id="kitapinfo2">Yayınevi : <?php echo $kitapveri["yayinevi"]; ?></p>
				<p id="kitapinfo2">Stok Kodu : <?php echo $kitapveri["kitapid"]; ?></p>
				<p id="kitapinfo2">Fiyat : <?php echo $kitapveri["kitapfiyat"]; ?></p>
				<select class='_selectBox' id='quantity_225260' name='quantity_225260'>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
                <a href="sepetekle.php"><img src="images/sepetekle.jpg" /></a>
                <a href="satinal.php"><img src="images/satinal.jpg" /></a><br/><br/>
                <a href="favekle.php"><img src="images/favekle.jpg" /></a>
                <a href="alarm.php"><img src="images/alarm.jpg" /></a>
                <a href="oner.php"><img src="images/oner.jpg" /></a>
                <a href="yazdir.php"><img src="images/yazdir.jpg" /></a><br/><br/>
                <div style="float:right;">
	                <a href="http://www.facebook.com/share.php?u=https://www.gazikitabevi.com.tr/urun/kamu-maliyesi&amp;" style="font-size: 30px;text-decoration: none;"><i class="fab fa-facebook"></i></a>

	                <a href="http://twitter.com/home?status=https://www.gazikitabevi.com.tr/urun/kamu-maliyesi" style="text-decoration:none;font-size: 30px;margin-left: 10px;"><i class="fab fa-twitter-square"></i></a>

	                <a href="https://plus.google.com/share?url=https://www.gazikitabevi.com.tr/urun/kamu-maliyesi" style="text-decoration:none;font-size: 30px;margin-left: 10px;"><i class="fab fa-google-plus"></i></a>

	                <a href="http://pinterest.com/pin/create/link/?url=https://www.gazikitabevi.com.tr/urun/kamu-maliyesi&amp;media=//st2.myideasoft.com/idea/bq/34/myassets/products/260/4.jpg?revision=1551251392" style="text-decoration:none;font-size: 30px;margin-left: 10px;"><i class="fab fa-pinterest-square"></i></a>
            	</div>
			</div>
		</div>
		<div class="secenekler">
			<ul id="secenek_menu">
				<li id="first" onclick="gorunurluk('first_open');">ÜRÜN AÇIKLAMALARI</li>
				<li id="second" onclick="gorunurluk('second_open');">TAKSİT SEÇENEKLERİ</li>
				<li id="third" onclick="gorunurluk('third_open');">YORUMLAR</li>
			</ul>
		</div>
		<div id="first_open">
			<p style="margin-top:5%;margin-left: 5%;">
				<?php $i = 1; echo $i.'-)Basım Yılı : '.$kitapveri["basim_yili"]; $i++; ?><br/>
				<?php echo $i.'-)Yayınevi : '.$kitapveri["yayinevi"]; $i++;?><br/>
				<?php echo $i.'-)Yazar : '.$kitapveri["yazar"]; $i++;?><br/>
				<?php echo $i.'-)Sayfa Sayısı : '.$kitapveri["sayfa_sayi"]; $i++; ?><br/>
				<?php echo $i.'-)Seri No : '.$kitapveri["kitapid"];  $i++;?><br/>
			</p>
		</div>
		<div id="second_open">
			<table class="dis_table" cellpadding="0" cellspacing="0">
        	<tbody>
        		<tr>
                <td width="193" valign="top">
                    <table width="100%" cellspacing="1">
                        <tbody><tr>
                            <td bgcolor="#CCCCCC" align="center" height="50" width="46"></td>
                            <td bgcolor="#F8E3F0" colspan="2" align="center" height="20" valign="center" width="147">
                                <img src="//st1.myideasoft.com/6.4.3.0/storefront/../images/cardlogos/cardlogo_3.gif?revision=6.4.3.0-15" alt="T. İş Bankası">
                                    <br><b>T. İş Bankası</b>
                                    <br><b>&nbsp;</b>
                            </td>
                            </tr>
                            <tr>
                                <td bgcolor="#CCCCCC" align="center" height="50" width="46"> Taksit Sayısı </td>
                                <td bgcolor="#F8E3F0" width="41" align="center" height="50"> Taksit (TL) </td>
                                <td bgcolor="#F8E3F0" width="41" align="center"> Toplam (TL)</td>
                            </tr>
                            <tr>
                            <td bgcolor="#CCCCCC" align="center" height="30">1</td>
                            <td bgcolor="#F8E3F0" align="center" height="30"><b>  43,35  </b> </td>
                            <td bgcolor="#F8E3F0" align="center"><b>  43,35 </b> </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td width="193" valign="top">
                    <table width="100%" cellspacing="1">
                        <tbody>
                        	<tr>
                                <td bgcolor="#CCCCCC" align="center" height="50" width="46"></td>
                                <td bgcolor="#EDF4E6" colspan="2" align="center" height="20" valign="center" width="147">
                                    <img src="//st3.myideasoft.com/6.4.3.0/storefront/../images/cardlogos/cardlogo_1.gif?revision=6.4.3.0-15" alt="Garanti Bankası">
                                    <br><b>Garanti Bankası</b>
                                    <br><b>&nbsp;</b>
                                </td>
                            </tr>
                            <tr>
                                <td bgcolor="#CCCCCC" align="center" height="50" width="46"> Taksit Sayısı </td>
                                <td bgcolor="#EDF4E6" width="41" align="center" height="50"> Taksit (TL) </td>
                                <td bgcolor="#EDF4E6" width="41" align="center"> Toplam (TL)</td>
                            </tr>
                            <tr>
                                <td bgcolor="#CCCCCC" align="center" height="30">1</td>
                                <td bgcolor="#EDF4E6" align="center" height="30"><b>  43,35  </b> </td>
                                <td bgcolor="#EDF4E6" align="center"><b>  43,35 </b> </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td width="193" valign="top">
                    <table width="100%" cellspacing="1">
                        <tbody>
                        	<tr>
                                <td bgcolor="#CCCCCC" align="center" height="50" width="46"></td>
                                <td bgcolor="#F1E7F3" colspan="2" align="center" height="20" valign="center" width="147">
                                    <img src="//st3.myideasoft.com/6.4.3.0/storefront/../images/cardlogos/cardlogo_10.gif?revision=6.4.3.0-15" alt="Yapı Kredi">
                                    <br><b>Yapı Kredi</b>
                                    <br><b>&nbsp;</b>
                                </td>
                            </tr>
                            <tr>
                                <td bgcolor="#CCCCCC" align="center" height="50" width="46"> Taksit Sayısı </td>
                                <td bgcolor="#F1E7F3" width="41" align="center" height="50"> Taksit (TL) </td>
                                <td bgcolor="#F1E7F3" width="41" align="center"> Toplam (TL)</td>
                            </tr>
                            <tr>
                                    <td bgcolor="#CCCCCC" align="center" height="30">1</td>
                                    <td bgcolor="#F1E7F3" align="center" height="30"><b>  43,35  </b> </td>
                                    <td bgcolor="#F1E7F3" align="center"><b>  43,35 </b> </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            	</tr>
    		</tbody>
		</table>
		</div>
		<div id="third_open">
			<?php
				$kitapid = $kitapveri["kitapid"];
				$yorumlar = $baglanti->query("SELECT * FROM yorumlar WHERE yorum_kitapid = $kitapid");
				while ($yorum = $yorumlar->fetch_array()) {
					
			?>
			<div class="yorum">
				<b style="color:#17375e"><?php echo $yorum["yorum_baslik"]; ?></b><br/><br/>
				<?php echo $yorum["yorum"]."<br/><br/>";
				if($yorum["yorum_anonimlik"] == 1){
				echo $yorum["yorum_ad"]."&nbsp".$yorum["yorum_soyad"]."&emsp;";
				}
				echo $yorum["yorum_tarih"]."&emsp;".$yorum["yorum_saat"]."<br/><hr></hr>"; ?>
			</div>
			<?php
			 }
			?>
			<div class="yorum_yap" onclick="location.href ='yorumyap.php'">
				Yorum Yaz
			</div>	
		</div>
	</div>
	
	<?php
		include 'footer.php';
	?>
</body>
</html>