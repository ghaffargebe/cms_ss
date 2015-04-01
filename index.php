<?php
 
require( "config.php" );
$action = isset( $_GET['action'] ) ? $_GET['action'] : "";
 
switch ( $action ) {
  case 'organisasi':
    organisasi();
    break;
  case 'atlet':
    atlet();
    break;
  case 'berita':
    berita();
    break;
  case 'ppitkon':
    ppitkon();
    break;
  case 'pengumuman':
    pengumuman();
    break;
  default:
    homepage();
}

function homepage() {
  $results = array();
  $listberita = Article::getListPublish(2);  // berita diambil di class Article dengan fungsi getListPublish yang paramaternya itu adalah limit dari berita yang ditampilkan
  $listpengumuman = Article::getListByKategori(10,2); // pengumuman diambil di class Article dengan fungsi getListByKategori yang paramaternya itu adalah id_kategori dari pengumuman dan limit dari pengumuman yang ditampilkan
  $data = Article::getKategori();  // kategori diambil dari fungsi getkategori di class article

  $kategori = $data['kategori'];
  $gambar = $data['gambar'];
  // print_r($listberita);die;
  // $results['pageTitle'] = "";
  require( TEMPLATE_PATH . "/index2.php" );
}

function organisasi(){
  require( TEMPLATE_PATH . "/organisasi.php" );
}

function atlet(){
  require( TEMPLATE_PATH . "/atlet.php" );
}

function berita(){
  require( TEMPLATE_PATH . "/berita.php" );
}

function ppitkon(){
  require( TEMPLATE_PATH . "/ppitkon.php" );
}

function pengumuman(){
  require( TEMPLATE_PATH . "/pengumuman.php" );
}
 
 
function archive() {
  $results = array();
  $data = Article::getList();
  $results['articles'] = $data['results'];
  $results['totalRows'] = $data['totalRows'];
  $results['pageTitle'] = "Article Archive | Widget News";
  require( TEMPLATE_PATH . "/archive.php" );
}
 
function viewArticle() {
  if ( !isset($_GET["articleId"]) || !$_GET["articleId"] ) {
    homepage();
    return;
  }
 
  $results = array();
  $results['article'] = Article::getById( (int)$_GET["articleId"] );
  $results['pageTitle'] = $results['article']->title . " | Widget News";
  require( TEMPLATE_PATH . "/viewArticle.php" );
}
 

 
?>