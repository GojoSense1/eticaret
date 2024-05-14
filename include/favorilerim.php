<?php
if(!empty($_SESSION["uyeID"]))
{
	$uyeID=$VT->filter($_SESSION["uyeID"]);
	$uyebilgisi=$VT->VeriGetir("uyeler","WHERE ID=? AND durum=?",array($uyeID,1),"ORDER BY ID ASC",1);
	if($uyebilgisi!=false)
	{
		if(!empty($_GET["ID"]) && ctype_digit($_GET["ID"]))
		{
			$favoriID=$VT->filter($_GET["ID"]);
			$favoriSil=$VT->VeriGetir("favoriler","WHERE uyeID=? AND ID=?",array($uyebilgisi[0]["ID"],$favoriID),"ORDER BY ID DESC",1);
			if($favoriSil!=false)
			{
				$sil=$VT->SorguCalistir("DELETE FROM favoriler","WHERE ID=?",array($favoriSil[0]["ID"]),1);
			}
			?>
			<meta http-equiv="refresh" content="0;url=<?=SITE?>favorilerim">
			<?php
			exit();
		}
		?>
		<link href="<?=SITE?>css/account.css" rel="stylesheet">
		<link href="<?=SITE?>css/faq.css" rel="stylesheet">
<main class="bg_gray">
		
	<div class="container margin_30">
		<div class="page_header">
		<h1>Favori Ürünlerim</h1>
	</div>
	<!-- /page_header -->
	<div class="row">
				<div class="col-lg-2 col-md-4">
					<a class="box_topic" href="<?=SITE?>siparislerim">
						<i class="ti-wallet"></i>
						<h3>Siparişlerim</h3>
						
					</a>
				</div>
				<div class="col-lg-2 col-md-4">
					<a class="box_topic" href="<?=SITE?>hesabim">
						<i class="ti-user"></i>
						<h3>Hesabım</h3>
						
					</a>
				</div>
				<div class="col-lg-2 col-md-4">
					<a class="box_topic" href="<?=SITE?>iadeler">
						<i class="ti-reload"></i>
						<h3>İade Takibi</h3>
						
					</a>
				</div>
				<div class="col-lg-2 col-md-4">
					<a class="box_topic" href="<?=SITE?>siparis-takip">
						<i class="ti-truck"></i>
						<h3>Sipariş Takibi</h3>
						
					</a>
				</div>
				<div class="col-lg-2 col-md-4">
					<a class="box_topic" href="<?=SITE?>sepet">
						<i class="ti-shopping-cart"></i>
						<h3>Sepetim</h3>
						
					</a>
				</div>
				<div class="col-lg-2 col-md-4">
					<a class="box_topic" href="<?=SITE?>cikis-yap">
						<i class="ti-power-off"></i>
						<h3>Çıkış</h3>
						
					</a>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-xl-12 col-lg-12 col-md-12">
				<div class="box_account" style="background: #fff; padding-top: 5px; padding-bottom: 50px;">
					
					<form action="#" method="post">
				<table class="table tabhov">
					<tr>
						<th>ÜRÜN BİLGİSİ</th>
						<th>TARİH</th>
						<th>İNCELE</th>
					</tr>

					<?php
					$favoriler=$VT->VeriGetir("favoriler","WHERE uyeID=?",array($uyebilgisi[0]["ID"]),"ORDER BY ID DESC");
					if($favoriler!=false)
					{
						for($i=0;$i<count($favoriler);$i++)
						{
							$urunBilgisi=$VT->VeriGetir("urunler","WHERE ID=? AND durum=?",array($favoriler[$i]["urunID"],1),"ORDER BY ID ASC",1);
								if($urunBilgisi!=false)
								{
							?>
							<tr>
						<td><img src="<?=SITE?>images/urunler/<?=$urunBilgisi[0]["resim"]?>" style="height: 50px; width: auto; display: block; float: left; margin-right: 8px;"> <?=stripslashes($urunBilgisi[0]["baslik"])?></td>
						
						
						<td><?=date("d.m.Y",strtotime($favoriler[$i]["tarih"]))?></td>
						<td><a href="<?=SITE?>urun/<?=$urunBilgisi[0]["seflink"]?>" class="btn_1" style="padding: 5px 15px;">İncele &raquo;</a> <a href="<?=SITE?>favorilerim/<?=$favoriler[$i]["ID"]?>" class="btn_2" style="background: #F44336; color: #fff; padding: 6px 8px; border-radius: 5px;"><i class="ti-trash"></i></a></td>
					</tr>

							<?php
						}
						}
					}
					else
					{
						?>
						<tr>
							<td colspan="3">Favorinizde hiç ürün bulunmuyor.</td>
						</tr>
						<?php
					}
					?>

				</table>
				
				</form>
					<!-- /form_container -->
				</div>
				<!-- /box_account -->
			</div>
			
			
		</div>
		<!-- /row -->
		</div>
		<!-- /container -->
	</main>
	<!--/main-->
		<?php
	}
	else
	{
		?>
		<meta http-equiv="refresh" content="0;url=<?=SITE?>uyelik">
		<?php
		exit();
	}
}
else
{
	?>
		<meta http-equiv="refresh" content="0;url=<?=SITE?>uyelik">
		<?php
		exit();
}
?>
