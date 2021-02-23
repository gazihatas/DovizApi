<?php require_once 'baglan.php'; ?>
<?php require_once 'bot.php'?>
<!DOCTYPE html>
<html>
<head>
	<title>Döviz Uygulaması</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</head>
<body>

 
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">DÖVİZ APİ | PDO </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">ANASAYFA</a>
        </li>    
	  </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">ARA</button>
      </form>
    </div>
  </div>
</nav>

	<hr>
	<?php 
	if ($_GET['durum']=="ok") {
		
		echo "İşlem başarılı";

	} elseif ($_GET['durum']=="no") {

		echo "İşlem başarısız";
	}
	?>


	

<?php
if(array_key_exists('button3', $_POST)){
      button3();
     }

     function button3(){
       $con = mysqli_connect('localhost', 'root', '', 'doviz_db');
       if(!$con){
         die('Bağlanamadı: ' . mysql_error());
       }
       echo 'Başarıyla bağlandı';
       //mysqli_close($con);
       mysqli_select_db($con,'doviz_');
       $sorgu=mysqli_query($con, 'select * from doviz_tbl');
       while($sonuv=mysqli_fetch_assoc($sorgu)){
         echo "<br>";
         echo $sonuv['id'];
         echo "<br>";
         echo $sonuv['gold'];
         echo "<br>";
         echo $sonuv['usd'];
         echo "<br>";
         echo $sonuv['euro'];
       }
     }
  ?>

<!-- BOSTRAP TABLOOOOO --------------------------------------------------->
<div>

<h4>Kayıtların Listelenmesi</h4>
  
<table class="table table-hover table-dark table-sm" >
  <thead>
    <tr class="bg-primary">
      <th scope="col">ID</th>
      <th scope="col">GOLD</th>
      <th scope="col">USD</th>
	  <th scope="col">EURO</th>
	  <th scope="col">İşlem</th>
	  <th scope="col">İşlem</th>
    <th scope="col">İşlem</th>
    </tr>
  </thead>
  
  <tbody>
  <?php
		$bilgilerimsor=$db->prepare("SELECT * from doviz_tbl");
		$bilgilerimsor->execute();
		$say=0;

			while($bilgilerimcek=$bilgilerimsor->fetch(PDO::FETCH_ASSOC)) { $say++?>

							<tr>
								<!--<td><?php //echo $say; ?></td>-->
								<td><?php echo $bilgilerimcek['id'] ?></td>
								<td><?php echo $bilgilerimcek['gold'] ?></td>
								<td><?php echo $bilgilerimcek['usd'] ?></td>
								<td><?php echo $bilgilerimcek['euro'] ?></td>
								<td><a href="duzenle.php?bilgilerim_id=<?php echo $bilgilerimcek['id'] ?>"><button class="btn btn-primary">Güncelle</button></td></a>
                <form action="" method="POST">
                <td><button class="btn btn-warning" type="submit" name="button3" class="button" value="Göster">Göster</button></td>
                </form>
								<td><a href="islem.php?bilgilerim_id=<?php echo $bilgilerimcek['id'] ?>&bilgilerimsil=ok"><button  type="button" class="btn btn-danger">Sil</button></td></a>

</tr>

<?php } ?>
  
  </tbody>
</table>
</div>
<hr>


<!--- İŞLEMLER --->
<div>
<h2>Kayıt Ekleme İşlemi</h2>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">GOLD</th>
      <th scope="col">USD</th>
      <th scope="col">EURO</th>
      <th scope="col">İŞLEM</th>
    </tr>
  </thead>

  <tbody>
    <tr>
    <form action="islem.php" method="POST">
				<?php 
				$bilgilerimsor=$db->prepare("SELECT * from doviz_tbl");
				$bilgilerimsor->execute();
	    		$bilgilerimcek=$bilgilerimsor->fetch(PDO::FETCH_ASSOC);
				?>

      <td><input type="text" name="" value="<?php echo $bilgilerimcek['id'];?>"></td>
      <td><input type="text" required="" name="kullanicidan_gelen_gold" placeholder="Gold Giriniz..." value="<?php echo $gold;?>"></td>
      <td><input type="text" required="" name="kullanicidan_gelen_usd" placeholder="Usd Giriniz..." value="<?php echo $usd; ?>"></td>
      <td><input type="text" required="" name="kullanicidan_gelen_euro" placeholder="Euro Giriniz..." value="<?php echo $euro; ?>"></td>
      <td><button type="submit" name="insertislemi" class="btn btn-success">Kayıt Ekle</button></td>

      </form>
    </tr>
  
  </tbody>
</table>
</div>
</body>
</html>