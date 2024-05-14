<footer class="revealed">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<h3 data-target="#collapse_1">Hızlı Menü</h3>
					<div class="collapse dont-collapse-sm links" id="collapse_1">
						<ul>
							<?php
										$gizlilikvekullanim=$VT->VeriGetir("gizlilikpolitikasi","WHERE durum=?",array(1),"ORDER BY sirano ASC",4);
										if($gizlilikvekullanim!=false)
										{
											for ($i=0; $i <count($gizlilikvekullanim) ; $i++) { 
												?>
											<li><a href="<?=SITE?>gizlilik-politikasi/<?=$gizlilikvekullanim[$i]["seflink"]?>"><?=stripslashes($gizlilikvekullanim[$i]["baslik"])?></a></li>
												<?php
											}
										}
										?>
                            <li><a href="<?=SITE?>hesap-numaramiz">Hesap Numaralarımız</a></li>
							<li><a href="<?=SITE?>iletisim">İletişim</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3 data-target="#collapse_2">Kategoriler</h3>
					<div class="collapse dont-collapse-sm links" id="collapse_2">
						<ul>
                        <?php
									$kategoriler=$VT->VeriGetir("kategoriler","WHERE durum=? AND tablo=?",array(1,"urunler"),"ORDER BY sirano ASC",6);
									if($kategoriler!=false)
									{
										for ($i=0; $i < count($kategoriler) ; $i++) {

											?>
										<li><a href="<?=SITE?>kategori/<?=$kategoriler[$i]["seflink"]?>"><?=stripslashes($kategoriler[$i]["baslik"])?></a></li>
											<?php

										}
									}
									?>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
						<h3 data-target="#collapse_3">Bize Ulaşın</h3>
					<div class="collapse dont-collapse-sm contacts" id="collapse_3">
						<ul>
							<li><i class="ti-home"></i><?=$siteadres?></li>
							<li><i class="ti-headphone-alt"></i><?=$sitetelefon?></li>
							<li><i class="ti-email"></i><a href="mailto:<?=$sitemail?>"><?=$sitemail?></a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
						<h3 data-target="#collapse_4">Sipariş Kodu</h3>
					<div class="collapse dont-collapse-sm" id="collapse_4">
						<div id="newsletter">
						    <div class="form-group">
						        <input type="text" name="email_newsletter" id="email_newsletter" class="form-control" placeholder="Sipariş kodunuz">
						        <button type="submit" id="submit-newsletter"><i class="ti-angle-double-right"></i></button>
						    </div>
						</div>
						<div class="follow_us">
							<h5>Sosyal Medya</h5>
							<ul>
								<li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?=SITE?>img/twitter_icon.svg" alt="" class="lazy"></a></li>
								<li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?=SITE?>img/facebook_icon.svg" alt="" class="lazy"></a></li>
								<li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?=SITE?>img/instagram_icon.svg" alt="" class="lazy"></a></li>
								<li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?=SITE?>img/youtube_icon.svg" alt="" class="lazy"></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- /row-->
			<hr>
			<div class="row add_bottom_25">
				<div class="col-lg-6">
					<ul class="footer-selector clearfix">
						<li>
							<div class="styled-select lang-selector">
								<select>
									<option value="Türkçe" selected>Türkçe</option>
								</select>
							</div>
						</li>
						
						<li><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?=SITE?>img/cards_all.svg" alt="" width="198" height="30" class="lazy"></li>
					</ul>
				</div>
				<div class="col-lg-6">
					<ul class="additional_links">
						<li><span>PHP TÜRKİYE</span></li>
						<li><span>© <?=date("Y")?> Tüm hakları saklıdır.</span></li>
                        <li><span>Tasarım</span> <a href="http://phpturkiye.net" target="_blank" rel="dofollow">phpturkiye.net</a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>