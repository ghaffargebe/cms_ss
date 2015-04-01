<?php

    $beranda="active";
    $tentang="";
    $atlet="";
    $sport="";
    $berita="";
    $pengumuman="";

include "include/head.php"
?>

<div class="break">
</div>

    <!-- Carousel
    ================================================== -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
        	    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        	      <!-- Indicators -->

        	      <ol class="carousel-indicators">
        	        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        	        <li data-target="#myCarousel" data-slide-to="1"></li>
        	        <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
        	      </ol>
        	      <div class="carousel-inner" role="listbox">
        	        <div class="item active">
        	          <img class="img-responsive" style="height: 100%" src="img/header1.jpg" alt="First slide">
        	          <div class="container">
        	            <div class="carousel-caption">
        	              <h1>Example headline.</h1>
        	              <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
        	              <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
        	            </div>
        	          </div>
        	        </div>
        	        <div class="item">
        	          <img class="second-slide" src="img/header2.jpg" alt="Second slide">
        	          <div class="container">
        	            <div class="carousel-caption">
        	              <h1>Another example headline.</h1>
        	              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
        	              <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
        	            </div>
        	          </div>
        	        </div>
        	        <div class="item">
        	          <img class="third-slide" src="img/header3.jpg" alt="Third slide">
        	          <div class="container">
        	            <div class="carousel-caption">
        	              <h1>One more for good measure.</h1>
        	              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
        	              <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
        	            </div>
        	          </div>
        	        </div>
                    <div class="item">
                      <img class="third-slide" src="img/header4.jpg" alt="Forth slide">
                      <div class="container">
                        <div class="carousel-caption">
                          <h1>One more for good measure.</h1>
                          <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                          <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
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
            <!--
            <div class="col-md-3">
                <div class="row">
                    <h2> VIDEO </h2>
                </div>

                <div class="list-unstyled video-list-thumbs row">
                    <a href="#" title="Claudio Bravo, antes su debut con el Barça en la Liga">
                        <img src="http://i.ytimg.com/vi/ZKOtE9DOwGE/mqdefault.jpg" alt="Barca" class="img-responsive" height="130px" />
                        <h2>Claudio Bravo, antes su debut con el Barça en la Liga</h2>
                        <span class="glyphicon glyphicon-play-circle"></span>
                        <span class="duration">03:15</span>
                    </a>
                </div>
            </div> -->
        </div>
    </div>
    <!-- /.carousel -->
<!--
    <div class="container container-sport">
        <div class="row">
            <div class="col-md-3">
                <img src="img/atlet1.jpg" class="img-responsive">
                <h2> Lorem Ipsum </h2>
                <h6> author | 11-1-2015 </h6> 
                <p> Velit, odit, eius, libero unde impedit quaerat dolorem assumenda alias consequuntur optio quae maiores ratione tempore sit aliquid architecto eligendi pariatur ab soluta doloremque dicta aspernatur labore quibusdam dolore corrupti quod inventore. Maiores, repellat, consequuntur eius repellendus eos aliquid molestiae ea laborum ex quibusdam laudantium voluptates placeat consectetur quam aliquam!
                </p>
            </div>
        </div>
    </div> -->

    <div class="container container-sport">
        <div class="row">
    	    <div class="col-md-2">
    			<div id="vWrapper">
                    <div id="carouselv">
                        <div>
                            <img alt="" src="img/menu/01.png" data-div="div1" /><br />
                            <span class="thumbnail-text">Image Text</span></div>
                        <div>
                            <img alt="" src="img/menu/02.png" data-div="div2" /><br />
                            <span class="thumbnail-text">Image Text</span></div>
                        <div>
                            <img alt="" src="img/menu/03.png" data-div="div3" /><br />
                            <span class="thumbnail-text">Image Text</span></div>
                        <div>
                            <img alt="" src="img/menu/04.png" data-div="div4" /><br />
                            <span class="thumbnail-text">Image Text</span></div>
                        <div>
                            <img alt="" src="img/menu/05.png" data-div="div15" /><br />
                            <span class="thumbnail-text">Image Text</span></div>
                        <div>
                            <img alt="" src="img/menu/06.png" data-div="div6" /><br />
                            <span class="thumbnail-text">Image Text</span></div>
                        <div>
                            <img alt="" src="img/menu/07.png" data-div="div7" /><br />
                            <span class="thumbnail-text">Image Text</span></div>
                        <div>
                            <img alt="" src="img/menu/08.png" data-div="div8" /><br />
                            <span class="thumbnail-text">Image Text</span></div>
                    </div>
                </div>
    	    </div>

            <div class="col-md-10">
                <div class="row">
                    <div class="thumbnail sport-menu" id="div1">
                        <img src="img/sport-medicine.jpg" alt="thumbnail image">
                        <div class="caption">
                            <h3 style="color:#000000"> Sport Medicine </h3>
                            <p> Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit. </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="thumbnail sport-menu" id="div2" style="display:none;">
                        <img src="img/sport-physiology.jpeg" alt="thumbnail image">
                        <div class="caption">
                            <h3 style="color:#000000"> Sport Physiology </h3>
                            <p> Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit. </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="thumbnail sport-menu" id="div3" style="display:none;">
                        <img src="img/sport-biomechanics.jpeg" alt="thumbnail image">
                        <div class="caption">
                            <h3 style="color:#000000"> Sport Biomechanics </h3>
                            <p> Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit. </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="thumbnail sport-menu" id="div4" style="display:none;">
                        <img src="img/sport-psychology.jpeg" alt="thumbnail image">
                        <div class="caption">
                            <h3 style="color:#000000"> Sport Psychology </h3>
                            <p> Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit. </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="thumbnail sport-menu" id="div5" style="display:none;">
                        <img src="img/sport-nutrition.jpeg" alt="thumbnail image">
                        <div class="caption">
                            <h3 style="color:#000000"> Sport Nutrition and Anthropometry </h3>
                            <p> Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit. </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="thumbnail sport-menu" id="div6" style="display:none;">
                        <img src="img/header1.jpg" alt="thumbnail image">
                        <div class="caption">
                            <h3 style="color:#000000"> Sport Intelligent </h3>
                            <p> Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit. </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="thumbnail sport-menu" id="div7" style="display:none;">
                        <img src="img/header1.jpg" alt="thumbnail image">
                        <div class="caption">
                            <h3 style="color:#000000"> Riset </h3>
                            <p> Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit. </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="thumbnail sport-menu" id="div8" style="display:none;">
                        <img src="img/header1.jpg" alt="thumbnail image">
                        <div class="caption">
                            <h3 style="color:#000000"> Kepelatihan </h3>
                            <p> Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit. </p>
                        </div>
                    </div>
                </div>
            </div>


    	    <div class="col-md-3">
    	    </div>
    	</div>
    </div>

    <div class="container container-sport"> <!-- sub menu sport science -->
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6">
                    <div class="row">
                        <h3 style="float: left; color: #0d7f2a;"> BERITA TERKINI </h3>
                    </div>
                    <div class="panel with-nav-tabs panel-default">
                        <div class="panel-heading">
                            <ul class="nav nav-tabs" id="nav-tabs-sport">
                                <li role="presentation" class="active"> <a href="#news" data-toggle="tab"> Berita Terkini </a></li>
                                <li role="presentation"> <a href="#popular-news" data-toggle="tab"> <span class="glyphicon glyphicon-star" aria-hidden="true"></span> Popular </a></li>
                            </ul>
                        </div>
                        <div class="panel-body">
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="news"> 
                                    <div class="row">
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="img/menu/01.png" style="width:30px; height: 30px;" alt="media object">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading"> JUDUL BERITA </h4>
                                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="row">
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="img/menu/01.png" style="width:30px; height: 30px;" alt="media object">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading"> JUDUL BERITA </h4>
                                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="img/menu/01.png" style="width:30px; height: 30px;" alt="media object">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading"> JUDUL BERITA </h4>
                                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="popular-news">
                                    <div class="row">
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="img/menu/01.png" style="width:30px; height: 30px;" alt="media object">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading"> JUDUL BERITA POPULAR </h4>
                                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="row">
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="img/menu/01.png" style="width:30px; height: 30px;" alt="media object">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading"> JUDUL BERITA POPULAR</h4>
                                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="img/menu/01.png" style="width:30px; height: 30px;" alt="media object">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading"> JUDUL BERITA POPULAR </h4>
                                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverr turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div> 
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row">
                        <h3 style="float: left; color: #0d7f2a;"style="float: left; color: #0d7f2a;"> PENGUMUMAN </h3>
                    </div>
                    <div class="panel with-nav-tabs panel-default">
                        <div class="panel-heading">
                            <ul class="nav nav-tabs">
                                <li role="presentation" class="active"> <a href="#announce" data-toggle="tab"> Pengumuman </a></li>
                                <li role="presentation"> <a href="#popular-announce" data-toggle="tab"> <span class="glyphicon glyphicon-star" aria-hidden="true"></span> Popular </a></li>
                            </ul>
                        </div>

                        <div class="panel-body">
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="announce"> 
                                    <div class="row">
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="img/menu/01.png" style="width:30px; height: 30px;" alt="media object">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading"> JUDUL PENGUMUMAN </h4>
                                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="row">
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="img/menu/01.png" style="width:30px; height: 30px;" alt="media object">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading"> JUDUL PENGUMUMAN </h4>
                                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="img/menu/01.png" style="width:30px; height: 30px;" alt="media object">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading"> JUDUL PENGUMUMAN </h4>
                                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="popular-announce">
                                      <div class="row">
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="img/menu/01.png" style="width:30px; height: 30px;" alt="media object">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading"> JUDUL PENGUMUMAN POPULAR </h4>
                                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="row">
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="img/menu/01.png" style="width:30px; height: 30px;" alt="media object">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading"> JUDUL PENGUMUMAN POPULAR</h4>
                                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="img/menu/01.png" style="width:30px; height: 30px;" alt="media object">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading"> JUDUL PENGUMUMAN POPULAR </h4>
                                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverr turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                            </div>
                                        </div>
                                    </div>
                                </div> <!--tab pane closed-->

                            </div>
                        </div> <!--panel body closed -->

                    </div>
        		</div>
            </div> <!-- div Berita & Pengumuman closed -->

        </div>
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
include "include/footer.php"
?>
   
</body>
</html>