<?php
if($_GET && !empty($_GET["sayfa"]))
{
 $sayfa=$_GET["sayfa"];
 if(file_exists(SAYFA.$sayfa.".php"))
 {
 	switch ($sayfa) {
 		case 'kurumsal':
 			if(!empty($_GET["seflink"]))
 			{
 				$seflink=$VT->filter($_GET["seflink"]);
	$bilgi=$VT->VeriGetir("kurumsal","WHERE seflink=? AND durum=?",array($seflink,1),"ORDER BY ID ASC",1);
				if($bilgi!=false)
				{
					$sitebaslik=stripslashes($bilgi[0]["baslik"])." - ".$sitebaslik;
					$sitedescription=stripslashes($bilgi[0]["description"]);
					$siteanahtar=stripslashes($bilgi[0]["anahtar"]);
				}
 			}
 			break;
 			case 'blog-detay':
 			if(!empty($_GET["seflink"]))
 			{
 				$seflink=$VT->filter($_GET["seflink"]);
	$bilgi=$VT->VeriGetir("bloglar","WHERE seflink=? AND durum=?",array($seflink,1),"ORDER BY ID ASC",1);
				if($bilgi!=false)
				{
					$sitebaslik=stripslashes($bilgi[0]["baslik"])." - ".$sitebaslik;
					$sitedescription=stripslashes($bilgi[0]["description"]);
					$siteanahtar=stripslashes($bilgi[0]["anahtar"]);
				}
 			}
 			break;
 			case 'gizlilik-politikasi':
 			if(!empty($_GET["seflink"]))
 			{
 				$seflink=$VT->filter($_GET["seflink"]);
	$bilgi=$VT->VeriGetir("gizlilikpolitikasi","WHERE seflink=? AND durum=?",array($seflink,1),"ORDER BY ID ASC",1);
				if($bilgi!=false)
				{
					$sitebaslik=stripslashes($bilgi[0]["baslik"])." - ".$sitebaslik;
					$sitedescription=stripslashes($bilgi[0]["description"]);
					$siteanahtar=stripslashes($bilgi[0]["anahtar"]);
				}
 			}
 			break;
 			case 'kategoriler':
 			if(!empty($_GET["seflink"]))
 			{
 				$seflink=$VT->filter($_GET["seflink"]);
	$bilgi=$VT->VeriGetir("kategoriler","WHERE seflink=? AND durum=?",array($seflink,1),"ORDER BY ID ASC",1);
				if($bilgi!=false)
				{
					$sitebaslik=stripslashes($bilgi[0]["baslik"])." - ".$sitebaslik;
					$sitedescription=stripslashes($bilgi[0]["description"]);
					$siteanahtar=stripslashes($bilgi[0]["anahtar"]);
				}
 			}
 			break;
 			case 'urun-detay':
 			if(!empty($_GET["seflink"]))
 			{
 				$seflink=$VT->filter($_GET["seflink"]);
	$bilgi=$VT->VeriGetir("urunler","WHERE seflink=? AND durum=?",array($seflink,1),"ORDER BY ID ASC",1);
				if($bilgi!=false)
				{
					$sitebaslik=stripslashes($bilgi[0]["baslik"])." - ".$sitebaslik;
					$sitedescription=stripslashes($bilgi[0]["description"]);
					$siteanahtar=stripslashes($bilgi[0]["anahtar"]);
				}
 			}
 			break;
 			case "sepet":
 				$sitebaslik="Sepetim - ".$sitebaslik;
				$sitedescription="Alışveriş sepetinizi doldurun ve fırsatı yakalayın.";
				$siteanahtar="sepetim, e-ticaret sepeti, ürün sepeti, ".$siteanahtar;
 			break;
 			case "bloglar":
 				$sitebaslik="Blog - ".$sitebaslik;
				$sitedescription="Aradığınız her şey blogda!";
				$siteanahtar="blog, e-ticaret blog, ".$siteanahtar;
 			break;
 			case "uyelik":
 				$sitebaslik="Giriş Yap / Üye Ol - ".$sitebaslik;
				$sitedescription="Hemen yeni bir hesap oluşturun yada giriş yapın.";
				$siteanahtar="üyelik, e-ticaret üyelik, giriş yap, ".$siteanahtar;
 			break;
 			case "favorilerim":
 				$sitebaslik="Favorilerim - ".$sitebaslik;
				$sitedescription="Favori listesinde yıldız ürünlerinizi önerin.";
				$siteanahtar="favorilerim, e-ticaret favorilerim, ".$siteanahtar;
 			break;
 			case "hesabim":
 				$sitebaslik="Hesabım - ".$sitebaslik;
				$sitedescription="Hesabınızı yönetmek için hemen başla.";
				$siteanahtar="hesabım, üyelik, e-ticaret hesabım, giriş yap, ".$siteanahtar;
 			break;
 			case "cikis":
 				$sitebaslik="Çıkış - ".$sitebaslik;
				$sitedescription="Hesabınızdan güvenle çıkış yapın.";
				$siteanahtar="hesabım, üyelik, e-ticaret hesabım, çıkış yap, ".$siteanahtar;
 			break;
 			case "sifre-belirle":
 				$sitebaslik="Şifre Belirle - ".$sitebaslik;
				$sitedescription="Hesabınızı güvene almak için yeni bir şifre belirleyin.";
				$siteanahtar="hesabım, üyelik, e-ticaret hesabım, şifre belirle, şifre iste, ".$siteanahtar;
 			break;
 			case "odeme-tipi":
 				$sitebaslik="Ödeme Tipi - ".$sitebaslik;
				$sitedescription="Alışverişinizi tamamlamak için ödeme yöntemi seçin.";
				$siteanahtar="ödeme yap, hesabım, ödeme tipi, e-ticaret ödeme ".$siteanahtar;
 			break;
 			case "odeme-yap":
 				$sitebaslik="Ödeme Yap - ".$sitebaslik;
				$sitedescription="Alışverişinizi tamamlamak için ödeme yapın!";
				$siteanahtar="ödeme yap, hesabım, ödeme tipi, e-ticaret ödeme ".$siteanahtar;
 			break;
 			case "odeme-sonuc":
 				$sitebaslik="Ödeme Sonucunuz - ".$sitebaslik;
				$sitedescription="Alışverişinizi tamamlandı. Ödeme sonucunu öğrenin.";
				$siteanahtar="ödeme yap, hesabım, ödeme tipi, e-ticaret ödeme, ödeme sonucu ".$siteanahtar;
 			break;
 			case "siparislerim":
 				$sitebaslik="Siparişlerim - ".$sitebaslik;
				$sitedescription="Siparişlerinizi takip etmek için hemen sipariş listeni ziyaret et.";
				$siteanahtar="hesabım, siparişlerim, sipariş listesi, alışveriş, alışveriş listesi ".$siteanahtar;
 			break;
 			case "siparis-detay":
 				$sitebaslik="Sipariş Detayım - ".$sitebaslik;
				$sitedescription="Siparişlerinizi takip etmek için hemen sipariş listeni ziyaret et.";
				$siteanahtar="hesabım, siparişlerim, sipariş listesi, alışveriş, alışveriş listesi ".$siteanahtar;
 			break;
 			case "siparis-takip":
 				$sitebaslik="Sipariş Takibi - ".$sitebaslik;
				$sitedescription="Siparişlerinizi takip etmek için sipariş kodunuz ile arama yapın.";
				$siteanahtar="hesabım, siparişlerim, sipariş listesi, alışveriş, alışveriş listesi, sipariş takibi ".$siteanahtar;
 			break;
 			case "iadeler":
 				$sitebaslik="İadelerim - ".$sitebaslik;
				$sitedescription="İadelerinizi takip etmek için hemen iade listeni ziyaret et.";
				$siteanahtar="hesabım, İadelerim, iade listesi, alışveriş, alışveriş listesi ".$siteanahtar;
 			break;
 			case "iade-detay":
 				$sitebaslik="İade Detayı - ".$sitebaslik;
				$sitedescription="İadelerinizi takip etmek için hemen iade listeni ziyaret et.";
				$siteanahtar="hesabım, İadelerim, iade listesi, alışveriş, alışveriş listesi ".$siteanahtar;
 			break;
 			case "iletisim":
 				$sitebaslik="İletişim - ".$sitetelefon." - ".$sitebaslik;
				$sitedescription="Destek için bizimle iletişime geçin. ".$sitetelefon." | ".$siteadres;
				$siteanahtar="iletişim, ".$sitetelefon.", ".$sitemail.", ".$siteadres.", alışveriş listesi ".$siteanahtar;
 			break;
 			case "hesap-numaramiz":
 				$sitebaslik="Hesap Numaralarımız - ".$sitebaslik;
				$sitedescription="Havale /EFT ödemeleri için hesap numaralarımızı inceleyebilirsiniz.";
				$siteanahtar="hesabım, hesap numaramız, banka hesap numarası ".$siteanahtar;
 			break;
 			case "arama":
 				$sitebaslik="Arama Sonuçları - ".$sitebaslik;
				$sitedescription="E-Ticaret'de aradığınız ürüne kolayca ulaşın.";
				$siteanahtar="arama, eticarette arama, arama yap, arama motoru, ".$siteanahtar;
 			break;
 		default:
 			/*N*/
 			break;
 	}
 }
}

?>