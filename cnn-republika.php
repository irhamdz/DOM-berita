<div class="col-md-6">
                <div class="panel panel-default">
				  <div class="panel-heading">
				  	<center>
				  	<a href="http://www.cnnindonesia.com/">
				  		<img src="//www.cnnindonesia.com/assets/image/logo_new.png" width="100" height="100">
				  	</a>
				  	</center>
				  </div>
				  <div class="panel-body">
				  	<?php
						foreach($htmlcnn->find('a') as $linkjudul)
						{ 
							if (substr("'".$linkjudul->href."'",1,24)=="http://cnnindonesia.com/")
							{
								
								$urlnya=$linkjudul->href;
								$pecah=explode('/',$urlnya);
								$judul=str_replace("-"," ",$pecah[5]);
								$judulketemu=preg_match("/".$qcari."/i", $judul); 
								if($judulketemu){
									$c++;
									/*echo "==============================================================================================<br>";*/
									/*echo " Berita <b> CNN </b> dengan kata kunci: <b>".$qcari."</b>";*/
									echo "<br>";
									echo "<center>";
									echo "<h4><p class='uppercase'>".$judul."</p></h4>";
									echo "</center>";
									echo "<a href='".$urlnya."'target='_blank'>".$urlnya."</a><br><br>";

									$htmlcnn->load_file($urlnya);
								foreach($htmlcnn->find('div') as $linkisi)
								{
									if ($linkisi->class=="text_detail")
									{	
										$beritanya=str_replace("'","-",(strip_tags($linkisi)));
										echo "Isi Berita :<br>".$beritanya."<br>";
										/*echo "==============================================================================================<br>";*/

									}
								}break;
								}//if
								/*else if($judulketemu == FALSE)
								{
									echo "tidak ada berita";
									
								}break;*/

							}
						}	
						?>
				  </div>
				  <div class="panel-footer">
				  	<?php echo "<center> banyak berita CNN: ".$c."</center>"; ?>
				  </div>
				</div>
                    
       </div><!--end col-6 -->

       <div class="col-md-6">
                <div class="panel panel-default">
				  <div class="panel-heading">
				  	<center>
				  	<a href="http://www.republika.co.id/">
				  	<img src="http://www.republika.co.id/files/images/1republika.co.id_03.png" >
					</a>
					</center>
				  </div>
				  <div class="panel-body">
				  	<?php
					foreach($htmlrep->find('a') as $linkjudul)
					{ 	
						$link=str_replace("/", "", $linkjudul->href);
						$linkambil=preg_match("/republika.co.idberita/", $link);
						if ($linkambil)
						{
							
							$urlnya=$linkjudul->href;
							$pecah=explode('/',$urlnya);
							$judul=substr(str_replace("-"," ",$pecah[9]),9);
							$judulketemu=preg_match("/".$qcari."/i", $judul); 
							if($judulketemu){
								$r++;
								
								echo "<br>";
								echo "<center>";
								echo "<h4><p class='uppercase'>".$judul."</p></h4>";
								echo "</center>";
								echo "<a href='".$urlnya."'target='_blank'>".$urlnya."</a><br><br>";

								$htmlrep->load_file($urlnya);
							foreach($htmlrep->find('div') as $linkisi)
							{
								if ($linkisi->class=="content-detail")
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
				  		<?php echo "<center> banyak berita Republika: ".$r."</center>"; ?>
				  </div>
				</div>
                    
       </div><!--end col-6 -->