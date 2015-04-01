<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Sport Science Kemenpora Indonesia</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    
	<link href="theme_front/css/bootstrap.css" rel="stylesheet" type="text/css" media="screen" />
	<link href="theme_front/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="screen" /> 
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="theme_front/css/styles.css" rel="stylesheet" type="text/css" media="screen" />	
    <link href="theme_front/css/jsCarousel.css" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>

    <script src="theme_front/js/jquery-1.11.2.min.js" type="text/javascript"></script>
    <script src="theme_front/js/jsCarousel.js" type="text/javascript"></script>
    <script src="theme_front/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="theme_front/js/bootstrap.js" type="text/javascript"></script>

</head>
<body>
    <div class="container container-sport"> <!-- header logo -->
        <div class="row">
            <div class="col-md-12">
              <img src="theme_front/img/Logo_Kemenpora.jpg" style="height: 150px">
              <img src="theme_front/img/SS11.png" style="width: 150px; height: 150px">
              <img src="theme_front/img/header-caption1.png">
              <img src="theme_front/img/header.png" style="float: right">
          </div>
        </div>
        <div class="break">
        </div>
        <div class="row">
            <div class="col-md-9">
                <ul class="nav nav-pills">
                    <li><a href="index.php" class="btn-menu <?=$beranda?>" role="presentation"> Beranda </a> </li>
                    <li><a href="index.php?action=organisasi" class="btn-menu <?=$tentang?>" role="presentation"> Organisasi PPITKON </a></li>
                    <li><a href="index.php?action=atlet" class="btn-menu <?=$atlet?>" role="presentation"> Sport Science Atlet </a></li>
                    <li><a href="index.php?action=berita" class="btn-menu <?=$sport?>" role="presentation"> Berita Sport Science </a> </li>
                    <li><a href="index.php?action=ppitkon" class="btn-menu <?=$berita?>" role="presentation"> Berita PPITKON</a></li>
                    <li><a href="index.php?action=pengumuman" class="btn-menu <?=$pengumuman?>" role="presentation"> Pengumuman </a></li>
                </ul>
            </div> 
              <div class="col-md-3" style="float: right">
                <div id="costum-search-input">
                    <div class="input-group col-md-12">
                        <input type="text" class="form-control input-md" placeholder="Cari" />
                        <span class="input-group-btn">
                            <button class="btn btn-info btn-md" type="button">
                                <i class="glyphicon glyphicon-search"> </i>
                            </button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
