<header class="version_1">
		<div class="layer"></div><!-- Mobile menu overlay mask -->
		<div class="main_header">
			<div class="container">
				<div class="row small-gutters">
					<div class="col-xl-3 col-lg-3 d-lg-flex align-items-center">
						<div id="logo">
							<a href="<?=SITE?>"><img src="<?=SITE?>img/logo.svg" alt="" width="100" height="35"></a>
						</div>
					</div>
					<nav class="col-xl-6 col-lg-7">
						<a class="open_close" href="javascript:void(0);">
							<div class="hamburger hamburger--spin">
								<div class="hamburger-box">
									<div class="hamburger-inner"></div>
								</div>
							</div>
						</a>
						<!-- Mobile menu button -->
						<div class="main-menu">
							<div id="header_menu">
								<a href="<?=SITE?>"><img src="<?=SITE?>img/logo_black.svg" alt="" width="100" height="35"></a>
								<a href="#" class="open_close" id="close_in"><i class="ti-close"></i></a>
							</div>
							<ul>
								<li><a href="<?=SITE?>">Anasayfa</a></li>
								<li class="submenu">
									<a href="javascript:void(0);" class="show-submenu">Kurumsal</a>
									<ul>
										<?php
										$kurumsal=$VT->VeriGetir("kurumsal","WHERE durum=?",array(1),"ORDER BY sirano ASC");
										if($kurumsal!=false)
										{
											for ($i=0; $i <count($kurumsal) ; $i++) { 
												?>
											<li><a href="<?=SITE?>kurumsal/<?=$kurumsal[$i]["seflink"]?>"><?=stripslashes($kurumsal[$i]["baslik"])?></a></li>
												<?php
											}
										}
										?>
									</ul>
								</li>
								<li class="submenu">
									<a href="javascript:void(0);" class="show-submenu">Gizlilik ve Kullanım</a>
									<ul>
										<?php
										$gizlilikvekullanim=$VT->VeriGetir("gizlilikpolitikasi","WHERE durum=?",array(1),"ORDER BY sirano ASC");
										if($gizlilikvekullanim!=false)
										{
											for ($i=0; $i <count($gizlilikvekullanim) ; $i++) { 
												?>
											<li><a href="<?=SITE?>gizlilik-politikasi/<?=$gizlilikvekullanim[$i]["seflink"]?>"><?=stripslashes($gizlilikvekullanim[$i]["baslik"])?></a></li>
												<?php
											}
										}
										?>
									</ul>
								</li>
								<li><a href="<?=SITE?>blog">Blog</a></li>
								<li><a href="<?=SITE?>iletisim">İletişim</a></li>
							</ul>
						</div>
						<!--/main-menu -->
					</nav>
					<div class="col-xl-3 col-lg-2 d-lg-flex align-items-center justify-content-end text-right">
						<a class="phone_top" href="tel:<?=$sitetelefon?>"><strong><span>Destek Hattı?</span><?=$sitetelefon?></strong></a>
					</div>
				</div>
				<!-- /row -->
			</div>
		</div>
		<!-- /main_header -->

		<div class="main_nav Sticky">
			<div class="container">
				<div class="row small-gutters">
					<div class="col-xl-3 col-lg-3 col-md-3">
						<nav class="categories">
							<ul class="clearfix">
								<li><span>
										<a href="#">
											<span class="hamburger hamburger--spin">
												<span class="hamburger-box">
													<span class="hamburger-inner"></span>
												</span>
											</span>
											Tüm Kategoriler
										</a>
									</span>
									<div id="menu">
										<ul>
									<?php
									$kategoriler=$VT->VeriGetir("kategoriler","WHERE durum=? AND tablo=?",array(1,"urunler"),"ORDER BY sirano ASC");
									if($kategoriler!=false)
									{
										for ($i=0; $i < count($kategoriler) ; $i++) {

											?>
											<li><span><a href="<?=SITE?>kategori/<?=$kategoriler[$i]["seflink"]?>"><?=stripslashes($kategoriler[$i]["baslik"])?></a></span>
												<?php
												$altkategoriler=$VT->VeriGetir("kategoriler","WHERE durum=? AND tablo=?",array(1,$kategoriler[$i]["seflink"]),"ORDER BY sirano ASC");
									if($altkategoriler!=false)
									{
										echo "<ul>";
									for ($j=0; $j < count($altkategoriler) ; $j++) {
										?>
										<li><a href="<?=SITE?>kategori/<?=$altkategoriler[$j]["seflink"]?>"><?=stripslashes($altkategoriler[$j]["baslik"])?></a></li>
										<?php

										}
										echo "</ul>";
									}
												?>
											</li>
											<?php

										}
									}
									?>

													
													
												

										</ul>
									</div>
								</li>
							</ul>
						</nav>
					</div>
					<div class="col-xl-6 col-lg-7 col-md-6 d-none d-md-block">
						<div class="custom-search-input">
							<form action="<?=SITE?>arama" method="GET">
							<input type="text" name="search" placeholder="Ne aramak ister siniz?">
							<button type="submit"><i class="header-icon_search_custom"></i></button>
							</form>
						</div>
					</div>
					<div class="col-xl-3 col-lg-2 col-md-3">
						<ul class="top_tools">
							<?php
							if(!empty($_SESSION["sepet"]))
							{

							?>
							<li>
								<div class="dropdown dropdown-cart">
									<a href="<?=SITE?>sepet" class="cart_bt"><strong>1+</strong></a>
									<div class="dropdown-menu">
										<ul>
											<?php
												if(!empty($_SESSION["sepet"]))
												{
													$sayac=1;
													foreach ($_SESSION["sepet"] as $urunID => $bilgi) {
														if($sayac==4){break;}
									$urunbilgisi=$VT->VeriGetir("urunler","WHERE durum=? AND ID=?",array(1,$urunID),"ORDER BY ID ASC",1);
									if($urunbilgisi!=false)
									{
										
										?>
										<li>
												<a href="<?=SITE?>urun/<?=$urunbilgisi[0]["seflink"]?>">
													<figure><img src="<?=SITE?>images/urunler/<?=$urunbilgisi[0]["resim"]?>" data-src="<?=SITE?>images/urunler/<?=$urunbilgisi[0]["resim"]?>" alt="" width="50" height="50" class="lazy"></figure>
													<strong><span><?=stripslashes($urunbilgisi[0]["baslik"])?></span><?php
														if(!empty($urunbilgisi[0]["indirimlifiyat"]))
							{
								$fiyat=$urunbilgisi[0]["indirimlifiyat"].".".$urunbilgisi[0]["indirimlikurus"];
								if($urunbilgisi[0]["kdvdurum"]==1)
								{
									if($urunbilgisi[0]["kdvoran"]>9)
									{
										$oran="1.".$urunbilgisi[0]["kdvoran"];
									}
									else
									{
										$oran="1.0".$urunbilgisi[0]["kdvoran"];
									}
									$kdvsizBirimfiyat=($fiyat/$oran);/*kdvsiz hali*/
								}
								else
								{
									$kdvsizBirimfiyat=$fiyat;
								}
							}
							else
							{
								$fiyat=$urunbilgisi[0]["fiyat"].".".$urunbilgisi[0]["kurus"];
								if($urunbilgisi[0]["kdvdurum"]==1)
								{
									if($urunbilgisi[0]["kdvoran"]>9)
									{
										$oran="1.".$urunbilgisi[0]["kdvoran"];
									}
									else
									{
										$oran="1.0".$urunbilgisi[0]["kdvoran"];
									}
									$kdvsizBirimfiyat=($fiyat/$oran);/*kdvsiz hali*/
								}
								else
								{
									$kdvsizBirimfiyat=$fiyat;
								}
							}
							
							echo number_format($kdvsizBirimfiyat,2,",",".")." TL";
													?></strong>
												</a>
											</li>
										<?php
										$sayac++;
									}

												}

												}
											?>
											
											
										</ul>
										<?php 
										if(!empty($_SESSION["sepet"]))
										{
											$sepetkdvharictutar=0;
		$sepetkdvtutar18=0;
		$sepetkdvtutar8=0;
		$sepetkdvtutar6=0;
		$sepetkdvtutar1=0;
		$sepetTutar=0;
										?>
										<div class="total_drop">
											<?php
												/**********************/
												foreach ($_SESSION["sepet"] as $urunID => $bilgi) {
									$urunbilgisi=$VT->VeriGetir("urunler","WHERE durum=? AND ID=?",array(1,$urunID),"ORDER BY ID ASC",1);
									if($urunbilgisi!=false)
									{

										if($bilgi["varyasyondurumu"]!=false)
										{
					if(!empty($_SESSION["sepetVaryasyon"]))
					{
						foreach ($_SESSION["sepetVaryasyon"][$urunbilgisi[0]["ID"]] as $secenekID => $secenekAdet) {

							$stokTablo=$VT->VeriGetir("urunvaryasyonstoklari","WHERE ID=? AND urunID=?",array($secenekID,$urunbilgisi[0]["ID"]),"ORDER BY ID ASC",1);
							if($stokTablo!=false)
							{
								$varyasyonOzellikleri="";
								$varyasyonID=$stokTablo[0]["varyasyonID"];
								$secimID=$stokTablo[0]["secenekID"];

								if(strpos($varyasyonID,"@")!=false)
								{
									/*Eğer 1den fazla varyasyon var ise*/

									$varyasyondizi=explode("@", $varyasyonID);
									$secenekdizi=explode("@", $secimID);
									for($i=0;$i<count($varyasyondizi);$i++)
									{
										$varyasyonBilgisi=$VT->VeriGetir("urunvaryasyonlari","WHERE ID=?",array($varyasyondizi[$i]),"ORDER BY ID ASC",1);
									$secenekBilgisi=$VT->VeriGetir("urunvaryasyonsecenekleri","WHERE ID=?",array($secenekdizi[$i]),"ORDER BY ID ASC",1);
										if($varyasyonBilgisi!=false && $secenekBilgisi!=false)
										{
											$varyasyonOzellikleri.=stripslashes($secenekBilgisi[0]["baslik"])." ".$varyasyonBilgisi[0]["baslik"]." ";
											/* Mavi Renk Small Beden*/
										}
									}
								}
								else
								{
									/*Eğer 1 adet varyasyon var ise*/
									$varyasyonBilgisi=$VT->VeriGetir("urunvaryasyonlari","WHERE ID=?",array($varyasyonID),"ORDER BY ID ASC",1);
									$secenekBilgisi=$VT->VeriGetir("urunvaryasyonsecenekleri","WHERE ID=?",array($secimID),"ORDER BY ID ASC",1);
										if($varyasyonBilgisi!=false && $secenekBilgisi!=false)
										{
											$varyasyonOzellikleri=stripslashes($secenekBilgisi[0]["baslik"])." ".$varyasyonBilgisi[0]["baslik"];
										}
								}

								
										if(!empty($urunbilgisi[0]["indirimlifiyat"]))
							{
								$fiyat=$urunbilgisi[0]["indirimlifiyat"].".".$urunbilgisi[0]["indirimlikurus"];
								if($urunbilgisi[0]["kdvdurum"]==1)
								{
									if($urunbilgisi[0]["kdvoran"]>9)
									{
										$oran="1.".$urunbilgisi[0]["kdvoran"];
									}
									else
									{
										$oran="1.0".$urunbilgisi[0]["kdvoran"];
									}
									$kdvsizBirimfiyat=($fiyat/$oran);/*kdvsiz hali*/
								}
								else
								{
									$kdvsizBirimfiyat=$fiyat;
								}
							}
							else
							{
								$fiyat=$urunbilgisi[0]["fiyat"].".".$urunbilgisi[0]["kurus"];
								if($urunbilgisi[0]["kdvdurum"]==1)
								{
									if($urunbilgisi[0]["kdvoran"]>9)
									{
										$oran="1.".$urunbilgisi[0]["kdvoran"];
									}
									else
									{
										$oran="1.0".$urunbilgisi[0]["kdvoran"];
									}
									$kdvsizBirimfiyat=($fiyat/$oran);/*kdvsiz hali*/
								}
								else
								{
									$kdvsizBirimfiyat=$fiyat;
								}
							}
							
											$toplamtutar=($fiyat*$secenekAdet["adet"]);
								if($urunbilgisi[0]["kdvdurum"]==1)
								{
									if($urunbilgisi[0]["kdvoran"]>9)
									{
										$oran="1.".$urunbilgisi[0]["kdvoran"];
									}
									else
									{
										$oran="1.0".$urunbilgisi[0]["kdvoran"];
									}
									$kdvsizToplamTutar=($fiyat/$oran);/*kdvsiz hali*/
								}
								else
								{
									$kdvsizToplamTutar=$fiyat;
								}
								$kdvsizToplamTutar=($kdvsizToplamTutar*$secenekAdet["adet"]);


											if($urunbilgisi[0]["kdvdurum"]==1)
							{
								/*KDV li fiyat*/
								
								if($urunbilgisi[0]["kdvoran"]>9)
								{
									$oran="1.".$urunbilgisi[0]["kdvoran"];
								}
								else
								{
									$oran="1.0".$urunbilgisi[0]["kdvoran"];
								}
								$kdvlifiyat=$toplamtutar;
								$kdvsizfiyat=($toplamtutar/$oran);/*kdvsiz hali*/
								$kdvtutari=($toplamtutar-$kdvsizfiyat);/*KDV Fiyatı*/
								if($urunbilgisi[0]["kdvoran"]==18){$sepetkdvtutar18=($sepetkdvtutar18+$kdvtutari);}
								if($urunbilgisi[0]["kdvoran"]==8){$sepetkdvtutar8=($sepetkdvtutar8+$kdvtutari);}
								if($urunbilgisi[0]["kdvoran"]==6){$sepetkdvtutar6=($sepetkdvtutar6+$kdvtutari);}
								if($urunbilgisi[0]["kdvoran"]==1){$sepetkdvtutar1=($sepetkdvtutar1+$kdvtutari);}
								$sepetkdvharictutar=($sepetkdvharictutar+$kdvsizfiyat);
								$sepetTutar=($sepetTutar+$kdvlifiyat);
							}
							else
							{
								/*KDV Hariç Fiyat*/
								$oran=$urunbilgisi[0]["kdvoran"];
								$kdvsizfiyat=$toplamtutar;
								$kdvtutari=(($kdvsizfiyat*$oran)/100);
								$kdvlifiyat=($kdvsizfiyat+$kdvtutari);
								if($urunbilgisi[0]["kdvoran"]==18){$sepetkdvtutar18=($sepetkdvtutar18+$kdvtutari);}
								if($urunbilgisi[0]["kdvoran"]==8){$sepetkdvtutar8=($sepetkdvtutar8+$kdvtutari);}
								if($urunbilgisi[0]["kdvoran"]==6){$sepetkdvtutar6=($sepetkdvtutar6+$kdvtutari);}
								if($urunbilgisi[0]["kdvoran"]==1){$sepetkdvtutar1=($sepetkdvtutar1+$kdvtutari);}
								$sepetkdvharictutar=($sepetkdvharictutar+$kdvsizfiyat);
								$sepetTutar=($sepetTutar+$kdvlifiyat);
							}
										




							}

							
						}
					}
										}
										else
										{
										if(!empty($urunbilgisi[0]["indirimlifiyat"]))
							{
								$fiyat=$urunbilgisi[0]["indirimlifiyat"].".".$urunbilgisi[0]["indirimlikurus"];
							}
							else
							{
								$fiyat=$urunbilgisi[0]["fiyat"].".".$urunbilgisi[0]["kurus"];
							}
							
							if($urunbilgisi[0]["kdvdurum"]==1)
								{
									if($urunbilgisi[0]["kdvoran"]>9)
									{
										$oran="1.".$urunbilgisi[0]["kdvoran"];
									}
									else
									{
										$oran="1.0".$urunbilgisi[0]["kdvoran"];
									}
									$kdvsizBirimfiyat=($fiyat/$oran);/*kdvsiz hali*/
								}
								else
								{
									$kdvsizBirimfiyat=$fiyat;
								}
							
											$toplamtutar=($fiyat*$bilgi["adet"]);
											if($urunbilgisi[0]["kdvdurum"]==1)
								{
									if($urunbilgisi[0]["kdvoran"]>9)
									{
										$oran="1.".$urunbilgisi[0]["kdvoran"];
									}
									else
									{
										$oran="1.0".$urunbilgisi[0]["kdvoran"];
									}
									$kdvsizToplamTutar=($fiyat/$oran);/*kdvsiz hali*/
								}
								else
								{
									$kdvsizToplamTutar=$fiyat;
								}
								$kdvsizToplamTutar=($kdvsizToplamTutar*$bilgi["adet"]);

											if($urunbilgisi[0]["kdvdurum"]==1)
							{
								/*KDV li fiyat*/
								if($urunbilgisi[0]["kdvoran"]>9)
								{
									$oran="1.".$urunbilgisi[0]["kdvoran"];
								}
								else
								{
									$oran="1.0".$urunbilgisi[0]["kdvoran"];
								}
								$kdvlifiyat=$toplamtutar;
								$kdvsizfiyat=($toplamtutar/$oran);/*kdvsiz hali*/
								$kdvtutari=($toplamtutar-$kdvsizfiyat);/*KDV Fiyatı*/
								if($urunbilgisi[0]["kdvoran"]==18){$sepetkdvtutar18=($sepetkdvtutar18+$kdvtutari);}
								if($urunbilgisi[0]["kdvoran"]==8){$sepetkdvtutar8=($sepetkdvtutar8+$kdvtutari);}
								if($urunbilgisi[0]["kdvoran"]==6){$sepetkdvtutar6=($sepetkdvtutar6+$kdvtutari);}
								if($urunbilgisi[0]["kdvoran"]==1){$sepetkdvtutar1=($sepetkdvtutar1+$kdvtutari);}
								$sepetkdvharictutar=($sepetkdvharictutar+$kdvsizfiyat);
								$sepetTutar=($sepetTutar+$kdvlifiyat);
							}
							else
							{
								/*KDV Hariç Fiyat*/
								$oran=$urunbilgisi[0]["kdvoran"];
								$kdvsizfiyat=$toplamtutar;
								$kdvtutari=(($kdvsizfiyat*$oran)/100);
								$kdvlifiyat=($kdvsizfiyat+$kdvtutari);
								if($urunbilgisi[0]["kdvoran"]==18){$sepetkdvtutar18=($sepetkdvtutar18+$kdvtutari);}
								if($urunbilgisi[0]["kdvoran"]==8){$sepetkdvtutar8=($sepetkdvtutar8+$kdvtutari);}
								if($urunbilgisi[0]["kdvoran"]==6){$sepetkdvtutar6=($sepetkdvtutar6+$kdvtutari);}
								if($urunbilgisi[0]["kdvoran"]==1){$sepetkdvtutar1=($sepetkdvtutar1+$kdvtutari);}
								$sepetkdvharictutar=($sepetkdvharictutar+$kdvsizfiyat);
								$sepetTutar=($sepetTutar+$kdvlifiyat);
							}

											
											
										}

									
									}
								}
												/**********************/
											?>
											<?php
				if($sepetkdvtutar1>0)
				{
					?>
					<div class="clearfix"><strong>
					KDV Tutar (%1)</strong><span><?=number_format(($sepetkdvtutar1),2,",",".")?> TL</span> 
				</div>
					<?php
				}
				if($sepetkdvtutar6>0)
				{
					?>
					<div class="clearfix"><strong>
					KDV Tutar (%6)</strong><span><?=number_format(($sepetkdvtutar6),2,",",".")?> TL</span>
				</div>
					<?php
				}
				if($sepetkdvtutar8>0)
				{
					?>
					<div class="clearfix"><strong>
					KDV Tutar (%8) </strong><span><?=number_format(($sepetkdvtutar8),2,",",".")?> TL</span>
				</div>
					<?php
				}
				if($sepetkdvtutar18>0)
				{
					?>
					<div class="clearfix"><strong>
					KDV Tutar (%18)</strong><span> <?=number_format(($sepetkdvtutar18),2,",",".")?> TL</span>
				</div>
					<?php
				}
				?>
											<div class="clearfix"><strong>Toplam</strong><span><?=number_format(($sepetTutar),2,",",".")?> TL</span></div>
											<a href="<?=SITE?>sepet" class="btn_1 outline">Sepete Git</a><a href="<?=SITE?>odeme-tipi" class="btn_1">Hemen Al</a>
										</div>
										<?php
									}
										?>
									</div>
								</div>
								<!-- /dropdown-cart-->
							</li>
							<?php
							}
							else
							{
								?>
								<li>
									<a href="<?=SITE?>sepet" class="cart_bt" onclick="javascript:location.href='<?=SITE?>sepet'"></a>
							</li>
								<?php
							}
							?>
							<li>
								<a href="<?=SITE?>favorilerim" class="wishlist"><span>Wishlist</span></a>
							</li>
							<li>
								<div class="dropdown dropdown-access">
									<a href="<?=SITE?>uyelik" class="access_link"><span>Account</span></a>
									<div class="dropdown-menu">
										<?php
										if(!empty($_SESSION["uyeID"]))
										{
											echo "Hoşgeldiniz ".$_SESSION["uyeAdi"];
										}
										else
										{
											?>
											<a href="<?=SITE?>uyelik" class="btn_1">Giriş Yap Veya Üye Ol</a>
											<?php
										}
										?>
										
										<ul>
											<li>
												<a href="<?=SITE?>siparis-takip"><i class="ti-truck"></i>Sipariş Takibi</a>
											</li>
											<?php
											if(!empty($_SESSION["uyeID"]))
										{
											?>
											<li>
												<a href="<?=SITE?>siparislerim"><i class="ti-package"></i>Siparişlerim</a>
											</li>
											<li>
												<a href="<?=SITE?>hesabim"><i class="ti-user"></i>Hesabım</a>
											</li>
											<li>
												<a href="<?=SITE?>cikis-yap"><i class="ti-power-off"></i>Çıkış Yap</a>
											</li>
											<?php
										}
											?>
											
										</ul>
									</div>
								</div>
								<!-- /dropdown-access-->
							</li>
							<li>
								<a href="javascript:void(0);" class="btn_search_mob"><span>Search</span></a>
							</li>
							<li>
								<a href="#menu" class="btn_cat_mob">
									<div class="hamburger hamburger--spin" id="hamburger">
										<div class="hamburger-box">
											<div class="hamburger-inner"></div>
										</div>
									</div>
									Categories
								</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<div class="search_mob_wp">
				<input type="text" class="form-control" placeholder="Search over 10.000 products">
				<input type="submit" class="btn_1 full-width" value="Search">
			</div>
			<!-- /search_mobile -->
		</div>
		<!-- /main_nav -->
	</header>
	<!-- /header -->