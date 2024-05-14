<link href="<?=SITE?>css/error_track.css" rel="stylesheet">
<main class="bg_gray">
		<div id="track_order">
			<div class="container">
				<div class="row justify-content-center text-center">
					
						<?php
						$islemdurumu=false;
						if($_POST)
						{
							if(!empty($_POST["sipariskodu"]))
							{
								$sipariskodu=$VT->filter($_POST["sipariskodu"]);
								$siparisler=$VT->VeriGetir("siparisler","WHERE sipariskodu=?",array($sipariskodu),"ORDER BY ID ASC",1);
								if($siparisler!=false)
								{
									$islemdurumu=true;
								}
							}
						}

						if($islemdurumu!=false)
						{
							$uyebilgisi=$VT->VeriGetir("uyeler","WHERE ID=? AND durum=?",array($siparisler[0]["uyeID"],1),"ORDER BY ID ASC",1);
							if($uyebilgisi!=false)
							{
								?>
								<div class="row">
									<div class="col-md-12">
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
							echo stripslashes(mb_substr($uyebilgisi[0]["ad"],0,1,"UTF-8")."***** ".mb_substr($uyebilgisi[0]["soyad"],0,1,"UTF-8"))."*****";
						}
						else
						{
							echo mb_substr(stripslashes($uyebilgisi[0]["firmaadi"]),0,5,"UTF-8")."********** ***** *****";

						}
						?></td>
						<th>KDV HARİÇ TUTAR</th>
						<td style="color: #607D8B;">*****</td>
					</tr>
					<tr>
						<th>ADRES BİLGİSİ</th>
						<td><?php
						$ilBilgi=$VT->VeriGetir("il","WHERE ID=?",array($uyebilgisi[0]["ilID"]),"ORDER BY ID ASC",1);
						echo stripslashes(mb_substr($uyebilgisi[0]["adres"],0,1,"UTF-8")."*****  ".$uyebilgisi[0]["ilce"]);
						if($ilBilgi!=false)
						{
							echo "/".mb_convert_case($ilBilgi[0]["ADI"],MB_CASE_UPPER,"UTF-8");
						}
						?></td>
							<th>KDV TUTAR</th>
						<td style="color: #00bcd4;">*****</td>
						
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
						<td><strong style="color: #E91E63;">*****</strong></td>
						
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
								<strong style="color:#4caf50;">*****</strong>
								<?php
							}
							else
							{
								?>
								<strong style="color:#ff9800;">*****</strong>
								<?php
								$AlanBaslik="ÖDENECEK";
							}
							?></td>
					
					</tr>
				</table>

				<h3 style="padding: 2px 10px; display: block; clear: both; background: #343436; color: #fff; padding-top: 5px;">SİPARİŞ VERİLEN ÜRÜNLER</h3>
				<table class="table tabhov">
					<tr>
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
						<td><?=$urunler[0]["urunkodu"]?></td>
						<td><img src="<?=SITE?>images/urunler/<?=$urunler[0]["resim"]?>" style="height: 50px; width: auto; display: block;"></td>
						<td><?=stripslashes($urunler[0]["baslik"])?>
						<br>
						<small style="color: #009688; font-size: 13px;"><?=$ozellikler?></small></td>
						<td>*****</td>
						<td><?=$siparisurunler[$i]["adet"]?></td>
						<td>*****</td>
					</tr>
								<?php
							}
						}
					}
					?>

				</table>
				
				</form>
			</div>
		</div>
								<?php
							}
						}
						else
						{
							?>
							<div class="col-xl-7 col-lg-9">
						<img src="<?=SITE?>img/track_order.svg" alt="" class="img-fluid add_bottom_15" width="200" height="177">
						<p>Sipariş Takibi</p>
							<form action="#" method="post">
							<div class="search_bar">
								<input type="text" name="sipariskodu" class="form-control" placeholder="Sipariş Kodu">
								<input type="submit" value="Sorgula">
							</div>
						</form>
						</div>
							<?php
						}
						?>
						
					
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /track_order -->
		
		<div class="bg_white">
		<div class="container margin_60_35">
			<div class="main_title">
				<h2>Vitrin Ürünlerimiz</h2>
				<p>Size özel vitrin ürünlerimizi keşfedin.</p>
			</div>
			<div class="owl-carousel owl-theme products_carousel">

				<?php
				$urunler=$VT->VeriGetir("urunler","WHERE durum=? AND vitrindurum=?",array(1,1),"ORDER BY sirano ASC");
				if($urunler!=false)
				{
					for ($i=0; $i <count($urunler) ; $i++) { 
						?>
						<div class="item">
					<div class="grid_item">
						<figure class="ozelyukseklik">
							<a href="<?=SITE?>urun/<?=$urunler[$i]["seflink"]?>">
								<img class="owl-lazy" src="<?=SITE?>images/urunler/<?=$urunler[$i]["resim"]?>" data-src="<?=SITE?>images/urunler/<?=$urunler[$i]["resim"]?>" alt="<?=stripslashes($urunler[$i]["baslik"])?>">
							</a>
						</figure>
						<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
						<a href="<?=SITE?>urun/<?=$urunler[$i]["seflink"]?>">
							<h3><?=stripslashes($urunler[$i]["baslik"])?></h3>
						</a>
						<div class="price_box">
							<?php
							if(!empty($urunler[$i]["indirimlifiyat"]))
							{
								$fiyat=$urunler[$i]["indirimlifiyat"].".".$urunler[$i]["indirimlikurus"];
							}
							else
							{
								$fiyat=$urunler[$i]["fiyat"].".".$urunler[$i]["kurus"];
							}
							if($urunler[$i]["kdvdurum"]==1)
							{
								if($urunler[$i]["kdvoran"]>9)
								{
									$oran="1.".$urunler[$i]["kdvoran"];
								}
								else
								{
									$oran="1.0".$urunler[$i]["kdvoran"];
								}
								$fiyat=($fiyat/$oran);/*kdvsiz hali*/
							}
							?>
							<span class="new_price"><?=number_format($fiyat,2,",",".")?> TL</span>
						</div>
						<ul>
							<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Favoriye Ekle"><i class="ti-heart"></i><span>Favoriye Ekle</span></a></li>
							
						</ul>
					</div>
					<!-- /grid_item -->
				</div>
						<?php
					}
				}
				?>

			

			</div>
			<!-- /products_carousel -->
		</div>
		<!-- /container -->
		</div>
		<!-- /bg_white -->
	</main>