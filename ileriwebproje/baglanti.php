<?php
$servername="localhost";
$kullanici="root";
$sifre="";
$veritabani="gazikitapevi";
$baglanti = new mysqli($servername,$kullanici,$sifre,$veritabani);
if($baglanti->connect_error){
	die("Connection Failed");
}
$baglanti->query("SET NAMES UTF8");
?>