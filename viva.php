       <div class="col-md-12">
                <div class="panel panel-default">
				  <div class="panel-heading">
				  	<center>
				  	<a href="http://www.viva.co.id/">
				  		<img src="http://cdn-media.viva.id/appaux/portal/img/element/logo.png" alt="Logo">
				  	</a>
				  	</center>
				  </div>
				  <div class="panel-body"><?php
					foreach($htmlviv->find('a') as $linkjudul)
					{ 	
						$link=str_replace("/", "", $linkjudul->href);
						$linkambil=preg_match("/viva.co.idnews/", $link);
						if ($linkambil)
						{
							
							$urlnya=$linkjudul->href;
							$pecah=explode('/',$urlnya);
							$judul=substr(str_replace("-"," ",$pecah[5]),6);
							$judulketemu=preg_match("/".$qcari."/i", $judul); 
							if($judulketemu){
								$v++;
								
								echo "<br>";
								echo "<center>";
								echo "<h4><p class='uppercase'>".$judul."</p></h4>";
								echo "</center>";
								echo "<a href='".$urlnya."'target='_blank'>".$urlnya."</a><br><br>";

								$htmlviv->load_file($urlnya);
							foreach($htmlviv->find('span') as $linkisi)
							{
								if ($linkisi->itemprop=="description")
								{	
									$beritanya=str_replace("'","-",(strip_tags($linkisi)));
									echo "Isi Berita :<br>".$beritanya."<br>";
									

								}
							}break;
							}

						}
					}
					?>
				  </div>
				  <div class="panel-footer">
				  <?php echo "<center> banyak berita Viva: ".$v."</center>"; ?>
				  </div>
				</div>
                    
       </div><!--end col-6 -->