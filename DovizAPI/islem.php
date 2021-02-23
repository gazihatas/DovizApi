<?php
require_once 'baglan.php';
require_once 'bot.php';


//EKLEME İŞLEMİ
if (isset($_POST['insertislemi'])) {
	
	

	$kaydet=$db->prepare("INSERT into doviz_tbl set
		
		gold=:gold,
		usd=:usd,
		euro=:euro
		");

	$insert=$kaydet->execute(array(

		//'id' => $_POST['kullanicidan_gelen_id'],
		'gold' => $_POST['kullanicidan_gelen_gold'],
		'usd' => $_POST['kullanicidan_gelen_usd'],
		'euro' => $_POST['kullanicidan_gelen_euro']
	));

	

	if ($insert) {
		
		//echo "kayıt başarılı";

		Header("Location:index.php?durum=ok");
		exit;

	} else {

		//echo "kayıt başarısız";
		Header("Location:index.php?durum=no");
		exit;
	}



}

//GÜNCELLEME İŞLEMİ
if (isset($_POST['updateislemi'])) {
	
	$bilgilerim_id=$_POST['bilgilerim_id'];

	$kaydet=$db->prepare("UPDATE doviz_tbl set
		bilgilerim_gold=:bilgilerim_gold,
		bilgilerim_usd=:bilgilerim_usd,
		bilgilerim_euro=:bilgilerim_euro,
		
		where bilgilerim_id={$_POST['kullanicidan_gelen_id']}
		");

	$insert=$kaydet->execute(array(

		'bilgilerim_gold' => $_POST['kullanicidan_gelen_gold'],
		'bilgilerim_usd' => $_POST['kullanicidan_gelen_usd'],
		'bilgilerim_euro' => $_POST['kullanicidan_gelen_euro'],
		
	));

	

	if ($insert) {
		
		//echo "kayıt başarılı";

		Header("Location:duzenle.php?durum=ok&bilgilerim_id=$bilgilerim_id");
		exit;

	} else {

		//echo "kayıt başarısız";
		Header("Location:duzenle.php?durumno&bilgilerim_id=$bilgilerim_id");
		exit;
	}



}

//SİLME İŞLEMİ
if ($_GET['bilgilerimsil']=="ok") {
	

	$sil=$db->prepare("DELETE from doviz_tbl where id=:id");
	$kontrol=$sil->execute(array(
		'id' => $_GET['bilgilerim_id']
	));

	if ($kontrol) {
		
		//echo "kayıt başarılı";

		Header("Location:index.php?durum=ok");
		exit;

	} else {

		//echo "kayıt başarısız";
		Header("Location:index.php?durum=no");
		exit;
	}


}

?>
?>