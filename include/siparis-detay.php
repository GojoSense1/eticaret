<?php
if(!empty($_SESSION["uyeID"]) && !empty($_GET["sipariskodu"]))
{
	$uyeID=$VT->filter($_SESSION["uyeID"]);
	$sipariskodu=$VT->filter($_GET["sipariskodu"]);
	$uyebilgisi=$VT->VeriGetir("uyeler","WHERE ID=? AND durum=?",array($uyeID,1),"ORDER BY ID ASC",1);
	if($uyebilgisi!=false)
	{
		$siparisler=$VT->VeriGetir("siparisler","WHERE sipariskodu=? AND uyeID=?",array($sipariskodu,$uyebilgisi[0]["ID"]),"ORDER BY ID ASC",1);
		if($siparisler!=false)
		{

		}
		else
		{
			?>
			<meta http-equiv="refresh" content="0;url=<?=SITE?>siparislerim">
			<?php
			exit();
		}
		?>
		<link href="<?=SITE?>css/account.css" rel="stylesheet">
		<link href="<?=SITE?>css/faq.css" rel="stylesheet">
<main class="bg_gray">
		
	<div class="container margin_30">
		<div class="page_header">
		<h1>Siparişlerim</h1>
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
						<?php
					
							if($siparisler[0]["odemetipi"]==1){$odemetipi="Kredi Kartı";}
							if($siparisler[0]["odemetipi"]==2){$odemetipi="Havale / EFT";}
							if($siparisler[0]["odemetipi"]==3){$odemetipi="Kapıda Ödeme";}
							?>
				<h3 style="padding: 2px 10px; display: block; clear: both; background: #343436; color: #fff; padding-top: 5px;">SİPARİŞ ÖZETİ</h3>
				<table class="table solKolonGri">
					<tr>
						<th>SİPARİŞ KODU</th>
						<td><?=$siparisler[0]["sipariskodu"]?></td>
						<th>ÖDEME TİPİ</th>
						<td><?=$odemetipi?></td>
					</tr>
					<tr>
						<th>ALICI BİLGİSİ</th>
						<td><?php
						if($uyebilgisi[0]["tipi"]==1)
						{
							echo stripslashes($uyebilgisi[0]["ad"]." ".$uyebilgisi[0]["soyad"]);
						}
						else
						{
							echo stripslashes($uyebilgisi[0]["firmaadi"]);
						}
						?></td>
						<th>KDV HARİÇ TUTAR</th>
						<td style="color: #607D8B;"><?=number_format($siparisler[0]["kdvharictutar"],2,",",".")?> TL</td>
					</tr>
					<tr>
						<th>ADRES BİLGİSİ</th>
						<td><?php
						$ilBilgi=$VT->VeriGetir("il","WHERE ID=?",array($uyebilgisi[0]["ilID"]),"ORDER BY ID ASC",1);
						echo stripslashes($uyebilgisi[0]["adres"]." ".$uyebilgisi[0]["ilce"]);
						if($ilBilgi!=false)
						{
							echo "/".mb_convert_case($ilBilgi[0]["ADI"],MB_CASE_UPPER,"UTF-8");
						}
						?></td>
							<th>KDV TUTAR</th>
						<td style="color: #00bcd4;"><?=number_format($siparisler[0]["kdvtutar"],2,",",".")?> TL</td>
						
					</tr>
					<tr>
						<th>TARİH</th>
						<td><?=date("d.m.Y",strtotime($siparisler[0]["tarih"]))?></td>
						<?php
						$AlanBaslik="ÖDENEN";
						if($siparisler[0]["durum"]==1)
							{
							}
							else
							{
								$AlanBaslik="ÖDENECEK";
							}
						?>
						<th><?=$AlanBaslik?> TUTAR</th>
						<td><strong style="color: #E91E63;"><?=number_format($siparisler[0]["odenentutar"],2,",",".")?> TL</strong></td>
						
					</tr>
					<tr>
					<th>KARGO BİLGİSİ</th>
					<td>
						<?php
						if(!empty($siparisler[0]["kargoadi"]))
						{
							echo $siparisler[0]["kargoadi"]."<br>Takip Numarası : ".$siparisler[0]["takipno"];
						}
						?>

					</td>
					<th>ÖDEME DURUMU</th>
						<td><?php
						$AlanBaslik="ÖDENEN";
							if($siparisler[0]["durum"]==1)
							{
								?>
								<strong style="color:#4caf50;">ÖDENDİ</strong>
								<?php
							}
							else
							{
								?>
								<strong style="color:#ff9800;">ÖDEME BEKLİYOR</strong>
								<?php
								$AlanBaslik="ÖDENECEK";
							}
							?></td>
					
					</tr>
				</table>
				<?php
				$iadekontrol=$VT->VeriGetir("iadeler","WHERE siparisID=?",array($siparisler[0]["ID"]),"ORDER BY ID ASC",1);
				?>
				<h3 style="padding: 2px 10px; display: block; clear: both; background: #343436; color: #fff; padding-top: 5px;">SİPARİŞ VERİLEN ÜRÜNLER</h3>
				<?php
				if($_POST)
				{
					if(!empty($_POST["urunID"]) && !empty($_POST["urunID"][0]) && !empty($_POST["metin"]))
					{
						$iadesebebi=$VT->filter($_POST["metin"]);
						$iadekodu=$VT->IDGetir("iadeler").rand(1000,9999);
						$iadeID=$VT->IDGetir("iadeler");
						$iadekayit=$VT->SorguCalistir("INSERT INTO iadeler","SET uyeID=?, siparisID=?, iadekodu=?, metin=?, durum=?, tarih=?",array($uyebilgisi[0]["ID"],$siparisler[0]["ID"],$iadekodu,$iadesebebi,1,date("Y-m-d")));
						foreach ($_POST["urunID"] as $urunIDdizi) {
							$urunID=$VT->filter($urunIDdizi);
							$iadeurunKayit=$VT->SorguCalistir("INSERT INTO iadeurunler","SET uyeID=?, iadeID=?, siparisurunID=?, tarih=?",array($uyebilgisi[0]["ID"],$iadeID,$urunID,date("Y-m-d")));
						}
						?>
						<meta http-equiv="refresh" content="0;url=<?=SITE?>iadeler">
						<?php
						exit();
					}
				}
				?>
				<table class="table tabhov">
					<tr>
						<?php
						if($iadekontrol!=false || $siparisler[0]["durum"]==2)
						{

						}
						else
						{
							?>
							<th>SEÇ</th>
							<?php
						}
						?>
						<th>ÜRÜN KODU</th>
						<th>RESİM</th>
						<th>AÇIKLAMA</th>
						<th>ÜRÜN FİYATI</th>
						<th>ADET</th>
						<th>TOPLAM TUTAR</th>
					</tr>
					<?php
					$siparisurunler=$VT->VeriGetir("siparisurunler","WHERE siparisID=?",array($siparisler[0]["ID"]),"ORDER BY ID ASC");
					if($siparisurunler!=false)
					{
						for ($i=0; $i <count($siparisurunler); $i++) { 
							$urunler=$VT->VeriGetir("urunler","WHERE ID=?",array($siparisurunler[$i]["urunID"]),"ORDER BY ID ASC",1);
							if($urunler!=false)
							{
								$ozellikler="";
								if(!empty($siparisurunler[$i]["varyasyonID"]))
								{
									$varyasyonKontrol=$VT->VeriGetir("urunvaryasyonstoklari","WHERE ID=?",array($siparisurunler[$i]["varyasyonID"]),"ORDER BY ID ASC",1);
									if($varyasyonKontrol!=false)
									{
										$varyasyonID=$varyasyonKontrol[0]["varyasyonID"];
										$secenekID=$varyasyonKontrol[0]["secenekID"];

										if(strpos($varyasyonID,"@")>0)
										{
											$varyasyonDizi=explode("@",$varyasyonID);
											$secenekDizi=explode("@",$secenekID);
											for($x=0;$x<count($varyasyonDizi);$x++)
											{
												$varyasyonBilgisi=$VT->VeriGetir("urunvaryasyonlari","WHERE ID=?",array($varyasyonDizi[$x]),"ORDER BY ID ASC",1);
											$secenekBilgisi=$VT->VeriGetir("urunvaryasyonsecenekleri","WHERE ID=?",array($secenekDizi[$x]),"ORDER BY ID ASC",1);

											if($varyasyonBilgisi!=false && $secenekBilgisi!=false)
											{
												$ozellikler=$ozellikler.stripslashes($secenekBilgisi[0]["baslik"])." ".stripslashes($varyasyonBilgisi[0]["baslik"])." ";
											}
											}
										}
										else
										{
											$varyasyonBilgisi=$VT->VeriGetir("urunvaryasyonlari","WHERE ID=?",array($varyasyonID),"ORDER BY ID ASC",1);
											$secenekBilgisi=$VT->VeriGetir("urunvaryasyonsecenekleri","WHERE ID=?",array($secenekID),"ORDER BY ID ASC",1);

											if($varyasyonBilgisi!=false && $secenekBilgisi!=false)
											{
												$ozellikler=stripslashes($secenekBilgisi[0]["baslik"])." ".stripslashes($varyasyonBilgisi[0]["baslik"]);
											}

										}
									}
								}
								?>
								<tr>
									<?php
						if($iadekontrol!=false || $siparisler[0]["durum"]==2)
						{

						}
						else
						{
							?>
							<td><input type="checkbox" name="urunID[]" value="<?=$siparisurunler[$i]["ID"]?>"></td>
							<?php
						}
						?>
						<td><?=$urunler[0]["urunkodu"]?></td>
						<td><img src="<?=SITE?>images/urunler/<?=$urunler[0]["resim"]?>" style="height: 50px; width: auto; display: block;"></td>
						<td><?=stripslashes($urunler[0]["baslik"])?>
						<br>
						<small style="color: #009688; font-size: 13px;"><?=$ozellikler?></small></td>
						<td><?=number_format($siparisurunler[$i]["uruntutar"],2,",",".")?> TL</td>
						<td><?=$siparisurunler[$i]["adet"]?></td>
						<td><?=number_format($siparisurunler[$i]["toplamtutar"],2,",",".")?> TL</td>
					</tr>
								<?php
							}
						}
					}
					?>

				</table>
				<?php
						if($iadekontrol!=false || $siparisler[0]["durum"]==2)
						{

						}
						else
						{
							?>
							<table class="table">
								<tr>
									<td>
										İade Sebebiniz : <br>
										<textarea name="metin" style="width: 100%; height: 220px;"></textarea>
									</td>
								</tr>
								<tr>
									<td>
										<input type="submit" name="gonder" value="İade Talebinde Bulun" class="btn_1">
									</td>
								</tr>
							</table>
							<?php
						}
						?>
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
