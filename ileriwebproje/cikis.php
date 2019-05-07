<?php
session_start();
session_destroy();
setcookie("kadi", $satir["uye_ad"], time() +0);
setcookie("ksoyad", $satir["uye_soyad"], time() +0);
setcookie("kmail", $satir["e_mail"], time() +0);
setcookie("sifre", $satir["uye_sifre"], time() +0);
header("location:index.php");
?>