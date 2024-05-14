<link href="<?=SITE?>css/contact.css" rel="stylesheet">
<main class="bg_gray">
	
			<div class="container margin_60">
				<div class="main_title">
					<h2>Bize Ulaşın</h2>
					<p>Soru ve talepleriniz için bizimle iletişime geçebilirsiniz.</p>
				</div>
				<div class="row justify-content-center">
					<div class="col-lg-4">
						<div class="box_contacts">
							<i class="ti-headphone"></i>
							<h2>Telefon</h2>
							<a href="tel:<?=$sitetelefon?>" target="_blank"><?=$sitetelefon?></a><br />
                            <?php
							if(!empty($sitetelefon2)){?><a href="tel:<?=$sitetelefon?>" target="_blank"><?=$sitetelefon2?></a><br /><?php }
							?>
                            <a href="fax:<?=$sitefax?>" target="_blank"><?=$sitefax?></a>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="box_contacts">
							<i class="ti-map-alt"></i>
							<h2>Adres</h2>
							<div><?=$siteadres?></div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="box_contacts">
							<i class="ti-email"></i>
							<h2>E-Mail</h2>
							<a href="mailto:<?=$sitemail?>" target="_blank"><?=$sitemail?></a>
                            <?php
							if(!empty($sitemail2)){?><br /><a href="mailto:<?=$sitemail2?>" target="_blank"><?=$sitemail2?></a><?php }
							?>
						</div>
					</div>
				</div>
				<!-- /row -->				
			</div>
			<!-- /container -->
		<div class="bg_white">
			<div class="container margin_60_35">
				<h4 class="pb-3">İletişim Formu</h4>
				<div class="row">
					<div class="col-lg-4 col-md-6 add_bottom_25">
                    <?php
					if($_POST)
					{
						if(!empty($_POST["adsoyad"]) && !empty($_POST["mail"]) && !empty($_POST["mesaj"]) && !empty($_POST["telefon"]))
						{
							$adsoyad=$VT->filter($_POST["adsoyad"]);
							$mail=$VT->filter($_POST["mail"]);
							$telefon=$VT->filter($_POST["telefon"]);
							$mesaj=$VT->filter($_POST["mesaj"]);
							$mesajdetay="Ad Soyad : ".$adsoyad."<br>
							E-Mail : ".$mail."<br>
							Telefon : ".$telefon."<br>
							Mesaj : ".$mesaj."";
							$kaydet=$VT->SorguCalistir("INSERT INTO mesajlar","SET adsoyad=?, mail=?, telefon=?, metin=?, durum=?, tarih=?",array($adsoyad,$mail,$telefon,$mesaj,1,date("Y-m-d")));
							$mailgonder=$VT->MailGonder($sitemail,"Websitenizden Yeni Mesaj Var!",$mesajdetay);
							?>
                            <div class="alert alert-success">Mesajınız başarıyla gönderilmiştir.</div>
                            <?php
						}
						else
						{
							?>
                            <div class="alert alert-danger">Boş bıraktığınız alanları doldurunuz.</div>
                            <?php
						}
					}
					?>
                    <form action="#" method="post">
						<div class="form-group">
							<input class="form-control" type="text" placeholder="Adı Soyadı *" name="adsoyad" required="required">
						</div>
						<div class="form-group">
							<input class="form-control" type="email" placeholder="Email *" name="mail" required="required">
						</div>
                        <div class="form-group">
							<input class="form-control" type="text" placeholder="Telefon *" name="telefon" required="required">
						</div>
						<div class="form-group">
							<textarea class="form-control" style="height: 150px;" placeholder="Mesajınız *" name="mesaj"></textarea>
						</div>
						<div class="form-group">
							<input class="btn_1 full-width" type="submit" value="Gönder">
						</div>
                        </form>
					</div>
					<div class="col-lg-8 col-md-6 add_bottom_25">
					<iframe class="map_contact" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d56050.339548947275!2d29.01063997847854!3d41.01897027122958!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1str!2str!4v1593971552343!5m2!1str!2str" style="border: 0" allowfullscreen></iframe>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /bg_white -->
	</main>