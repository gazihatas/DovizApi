<?php require_once 'baglan.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD İŞLEMLERİ</title>
</head>
<body>


	<h1>Veritabanı PDO düzenleme işlemleri</h1>
	<hr>
	<?php 
	if ($_GET['durum']=="ok") {
		
		echo "İşlem başarılı";

	} elseif ($_GET['durum']=="no") {

		echo "İşlem başarısız";


	}

	?>

	<?php 

	$bilgilerimsor=$db->prepare("SELECT * from doviz_tbl where id=:id");
	$bilgilerimsor->execute(array(
		'id' => $_GET['bilgilerim_id']
	));

	$bilgilerimcek=$bilgilerimsor->fetch(PDO::FETCH_ASSOC);

	?>

	<form action="islem.php" method="POST">
		
		<input type="text" required="" name="kullanicidan_gelen_gold" placeholder="Gold Giriniz...">
		<input type="text" required="" name="kullanicidan_gelen_usd" placeholder="Usd Giriniz...">
		<input type="text" required="" name="kullanicidan_gelen_euro" placeholder="Euro Giriniz...">
		
		<input type="hidden" name="kullanicidan_gelen_id" value="<?php echo $bilgilerimcek['id'];?>">
		<button type="submit" name="updateislemi">Formu Düzenle</button>

	</form>

	<br>







</body>
</html>