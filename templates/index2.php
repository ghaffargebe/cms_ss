<?php

    $beranda="active";
    $tentang="";
    $atlet="";
    $sport="";
    $berita="";
    $pengumuman="";
                    

include TEMPLATE_PATH."/include_front/head.php"
?>

<div class="break">
</div>

    <!-- Carousel
    ================================================== -->
    <div class="container">
        <div class="row">
            <div class="col-md-8">
        	    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        	      <!-- Indicators -->

        	      <!-- <ol class="carousel-indicators">
        	        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        	        <li data-target="#myCarousel" data-slide-to="1"></li>
        	        <li data-target="#myCarousel" data-slide-to="2"></li> 
        	      </ol> -->
        	      <div class="carousel-inner" role="listbox">
        	        <div class="item active">
        	          <img class="img-responsive" src="theme_front/img/header1.jpg" alt="First slide">
        	          <div class="container">
        	            <div class="trans-box carousel-caption">
        	              <a href="#"> <h1>Sport Medicine</h1> </a>
        	              <p>Its About Sport Medicine. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. </p>
        	            </div>
        	          </div>
        	        </div>
        	        <div class="item">
        	          <img class="second-slide" src="theme_front/img/header2.jpg" alt="Second slide">
        	          <div class="container">
        	            <div class="carousel-caption">
        	              <a href="#"> <h1>Sport Rehabilitation</h1> </a>
        	              <p>Its About Sport Rehabilitation. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
        	            </div>
        	          </div>
        	        </div>
        	        <div class="item">
        	          <img class="third-slide" src="theme_front/img/header3.jpg" alt="Third slide">
        	          <div class="container">
        	            <div class="carousel-caption">
        	              <a href="#"> <h1>Sport Physiology</h1> </a>
        	              <p>Its About Sport Physiology. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
        	            </div>
        	          </div>
        	        </div>

        	      </div>
        	      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        	        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        	        <span class="sr-only">Previous</span>
        	      </a>
        	      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        	        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        	        <span class="sr-only">Next</span>
        	      </a>
        	    </div>
            </div>
            <div class="col-md-4">
                <section> 
                    <h2> HIGHLIGHT </h2>
                    <hr>
                    <div class="row">
                        <div class="col-md-9">
                            <h3> <b> Lorem Ipsum </b> </h3>
                            <p> Istri dari pangeran William yaitu Kate Middleton adalah salah satu wanita paling berpengaruh di Inggris.Kabar kehamilan </p>
                        </div>
                        <div class="col-md-3">
                            <img class="img-responsive" src="theme_front/img/menu/01.png">
                        </div>
                        <div class="col-md-9">
                            <h3> <b> Lorem Ipsum </b> </h3>
                            <p> Istri dari pangeran William yaitu Kate Middleton adalah salah satu wanita paling berpengaruh di Inggris.Kabar kehamilan </p>
                        </div>
                        <div class="col-md-3">
                            <img class="img-responsive" src="theme_front/img/menu/01.png">
                        </div>
                        
                </section>

            </div>
        </div>
    </div>

    <div class="break">
    </div>

    <div id="wrapper" class="container container-sport">
        <div class="row">
            <div class="col-md-12">
                <h2> Sport Science Highlight</h2>
                <?php for ($i=1; $i <= 4; $i++) { ?>
                <div class="col-md-3">
                    <img src="theme_front/img/menu-icon/<?php echo $gambar[$i];?>" class="img-menu img-responsive">
                    <h2> <?php echo $kategori[$i];?> </h2>
                    <h6 class="disabled"> author | 11-1-2015 </h6> 
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                    </p>
                    <p><a href="#" class="btn btn-default">Selengkapnya</a></p>
                </div>
                <?php }?>
            </div>
        </div>

        <div class="break">
        </div>


        <div class="row">
            <?php for ($i=5; $i <= 8; $i++) { ?>
            <div class="col-md-3">
                <img src="theme_front/img/menu-icon/<?php echo $gambar[$i];?>" class="img-menu img-responsive">
                <h2> <?php echo $kategori[$i];?> </h2>
                <h6 class="disabled"> author | 11-1-2015 </h6> 
                <p> Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                </p>
                <p><a href="#" class="btn btn-default">Selengkapnya</a></p>
            </div>
            <?php }?>
        </div>
    </div>

    <div class="break">
    </div>

    <div class="container container-sport">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6">
                    <h2> BERITA TERKINI </h2>
                    <?php for ($i=0; $i < count($listberita); $i++) { ?>
                    <div class="col-md-6">
                        <img src="<?php echo UPLOAD_PATH.$listberita[$i]->gambar;?>" class="img-feature img-responsive">
                        <h2> <?php echo $listberita[$i]->judul;?> </h2>
                        <h6 class="disabled"> <?php echo $listberita[$i]->username." | ".$listberita[$i]->tanggal;?> </h6> 
                        <p> <?php echo substr($listberita[$i]->isi, 0, 100)."...";?>
                        </p>
                        <p><a href="#" class="btn btn-default">Selengkapnya</a></p>
                    </div>
                    <?php } ?>
                    <!-- <div class="col-md-6">
                        <img src="theme_front/img/header1.jpg" class="img-feature img-responsive">
                        <h2> Kejuaraan Angkat Besi 2012 </h2>
                        <h6 class="disabled"> author | 11-1-2015 </h6> 
                        <p> Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                        </p>
                        <p><a href="#" class="btn btn-default">Selengkapnya</a></p>
                    </div>
                    <div class="col-md-6">
                        <img src="theme_front/img/header2.jpg" class=" img-feature img-responsive">
                        <h2> Atletik menumbuhkan Jiwa Sportifitas </h2>
                        <h6 class="disabled"> author | 11-1-2015 </h6> 
                        <p> Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                        </p>
                        <p><a href="#" class="btn btn-default">Selengkapnya</a></p>
                    </div> -->
                </div>
                <div class="col-md-6">
                    <h2> PENGUMUMAN </h2>
                    <?php for ($i=0; $i < count($listpengumuman); $i++) { ?>
                    <div class="col-md-6">
                        <img src="<?php echo UPLOAD_PATH.$listpengumuman[$i]->gambar;?>" class="img-feature img-responsive">
                        <h2> <?php echo $listpengumuman[$i]->judul;?> </h2>
                        <h6 class="disabled"> <?php echo $listpengumuman[$i]->username." | ".$listpengumuman[$i]->tanggal;?> </h6> 
                        <p>  <?php echo substr($listpengumuman[$i]->isi, 0, 100)."...";?>
                        </p>
                        <p><a href="#" class="btn btn-default">Selengkapnya</a></p>
                    </div>
                    <?php }?>
                   <!--  <div class="col-md-6">
                        <img src="theme_front/img/header3.jpg" class="img-feature img-responsive">
                        <h2> Reqruitment Volunteer Sea Games </h2>
                        <h6 class="disabled"> author | 11-1-2015 </h6> 
                        <p> Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                        </p>
                        <p><a href="#" class="btn btn-default">Selengkapnya</a></p>
                    </div>
                    <div class="col-md-6">
                        <img src="theme_front/img/header4.jpg" class="img-feature img-responsive">
                        <h2> Boxing Training Center </h2>
                        <h6 class="disabled"> author | 11-1-2015 </h6> 
                        <p> Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                        </p>
                        <p><a href="#" class="btn btn-default">Selengkapnya</a></p>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

    <div class="break">
    </div>

    <div class="container container-sport">
        <div class="row">
            <div class="col-md-12">
                <div id="wrapper"  class="col-md-8">
                    <h2> ATLET </h2>
                    <div class="row">
                        <div class="col-md-4">
                            <img src="theme_front/img/atlet1.jpg" class="img-feature img-responsive">
                        </div>
                        <div class="col-md-8">
                            <h2> Cara Taufiq menjaga stamina tubuh </h2>
                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                            <p><a href="#" class="btn btn-default">Selengkapnya</a></p>
                        </div>
                    </div>
                    <div class="break">
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <img src="theme_front/img/atlet1.jpg" class="img-feature img-responsive">
                        </div>
                        <div class="col-md-8">
                            <h2> Cara Taufiq menjaga stamina tubuh </h2>
                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                            <p><a href="#" class="btn btn-default">Selengkapnya</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3" style="float:right">
                    <div class="row">
                        <h2 style="float: right"> VIDEO </h2>
                    </div>
                    <div class="list-unstyled video-list-thumbs row">
                        <a href="#" title="Claudio Bravo, antes su debut con el Barça en la Liga">
                            <img src="img/header1.jpg" alt="Barca" class="img-responsive" height="130px" />
                            <h2>Claudio Bravo, antes su debut con el Barça en la Liga</h2>
                            <span class="glyphicon glyphicon-play-circle"></span>
                            <span class="duration">03:15</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="break">
    </div>

        <script type="text/javascript">
        $(document).ready(function() {
            $('#carouselv').jsCarousel({ 
                onthumbnailclick: function(id) {
                    $('.sport-menu').hide();
                    $('#'+id).show();
                    //console.log(id);
                }, 
                autoscroll: false, 
                masked: false, 
                itemstodisplay: 3, 
                orientation: 'v' 
            });

            //$('#carouselh').jsCarousel({ onthumbnailclick: function(src) { alert(src); }, autoscroll: false, masked: false, itemstodisplay: 5, orientation: 'h' });
            $('#carouselhAuto').jsCarousel({ onthumbnailclick: function(src) { alert(src); }, autoscroll: true, masked: true, itemstodisplay: 5, orientation: 'h' });
        });       
    </script>

<?php
include TEMPLATE_PATH."/include_front/footer.php"
?>
   
</body>
</html>
