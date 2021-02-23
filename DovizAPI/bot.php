<?php
// GEREKLİ APİYE BAĞLANTI SAĞLANARAK VERİLER JSON FORMATINDA ÇEKİLDİ AKABİNDE FOREEACH DÖZGÜSÜ İLE DİZİ OLARAK TARANDI GEREKLİ DEĞERLERE ULAŞILDI
$url = 'http://api.bigpara.hurriyet.com.tr/doviz/headerlist/anasayfa';
$cekVeri = file_get_contents($url);
$gelenVeri = json_decode($cekVeri);
foreach($gelenVeri->data as $veri){
     if($veri->SEMBOL == 'USDTRY'){
        //  echo 'Dolar alış: '.$veri->ALIS.'<br>';
        $usd = $veri->ALIS;
     }

     if($veri->SEMBOL == 'EURTRY'){
        // echo 'Euro alış: '.$veri->ALIS.'<br>';
        $euro = $veri->ALIS;
     }

     if($veri->SEMBOL == 'GLDGR'){
        // echo 'Gram Altın alış: '.$veri->ALIS.'<br>';
        $gold = $veri->ALIS;
     }
}

?>



