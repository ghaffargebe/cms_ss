<?php
 
/**
 * Class to handle articles
 */
 
class Article
{
 
  // Properties
 
  /**
  * @var int The article ID from the database
  */
  public $id = null;
 
  /**
  * @var int When the article was published
  */
  public $tanggal = null;
 
  /**
  * @var string Full title of the article
  */
  public $judul = null;
 
  /**
  * @var string A short summary of the article
  */
  public $isi = null;
 
  /**
  * @var string The HTML content of the article
  */
  public $id_kategori = null;

  public $gambar = null;

  public $status = null;
 
 
  /**
  * Sets the object's properties using the values in the supplied array
  *
  * @param assoc The property values
  */
 
  public function __construct( $data=array() ) {
    if ( isset( $data['id'] ) ) $this->id = (int) $data['id'];
    if ( isset( $data['tanggal'] ) ) $this->tanggal = $data['tanggal'];
    if ( isset( $data['judul'] ) ) $this->judul = $data['judul'];
    if ( isset( $data['isi'] ) ) $this->isi = $data['isi'];
    if ( isset( $data['id_kategori'] ) ) $this->id_kategori = $data['id_kategori'];
    if ( isset( $data['gambar'] ) ) $this->gambar = $data['gambar'];
    if ( isset( $data['status'] ) ) $this->status = $data['status'];
  }
 
 
  /**
  * Sets the object's properties using the edit form post values in the supplied array
  *
  * @param assoc The form post values
  */
 
  public function storeFormValues ( $params ) {
 
    // Store all the parameters
    $this->__construct( $params );
 
    // Parse and store the publication date
    if ( isset($params['tanggal']) ) {
      $pecah = explode ( '/', $params['tanggal'] );
      $this->tanggal = $pecah[2]."-".$pecah[1]."-".$pecah[0];
    }
    //return $this->tanggal;
  }
 
 
  /**
  * Returns an Article object matching the given article ID
  *
  * @param int The article ID
  * @return Article|false The article object, or false if the record was not found or there was a problem
  */
 
  public static function getById( $id ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT * FROM berita WHERE id = :id and status_delete = '0'";
    $st = $conn->prepare( $sql );
    $st->bindValue( ":id", $id, PDO::PARAM_INT );
    $st->execute();
    $row = $st->fetch();
    $conn = null;
    if ($row){
      return new Article($row);
    } 
  }

  public static function getKategori(){
    $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
    $sql = "SELECT * FROM kategori";
    $st = $conn->prepare($sql);
    $st->execute();
    //$row = $st->fetch();
    while ($row = $st->fetch(PDO::FETCH_OBJ)) {
      $kategori[$row->id] = $row->nama_kategori;
      $gambar[$row->id]=$row->gambar;
    }
    $conn = null;
    if ($kategori) {
      return array('kategori' => $kategori, 
                   'gambar' => $gambar); 
    }
  }
 
 
  /**
  * Returns all (or a range of) Article objects in the DB
  *
  * @param int Optional The number of rows to return (default=all)
  * @param string Optional column by which to order the articles (default="publicationDate DESC")
  * @return Array|false A two-element array : results => array, a list of Article objects; totalRows => Total number of articles
  */
 
  public static function getList( $numRows=1000000, $order="tanggal DESC" ) {
    //ambil semua berita, termasuk yang belum publish
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM berita WHERE status_delete = '0'
            ORDER BY ".$order." LIMIT $numRows";
    $query = $conn->prepare($sql);
    $query->execute();
    $list = array();
    
    while ( $row = $query->fetch(PDO::FETCH_OBJ) ) {
      //$article = new Article( $row );
      $list[] = $row;
    }
    $total = $query->rowCount();
    return ( array ( "results" => $list, 
                      "total" => $total
            ) );
  }

  public static function getListPublish( $numRows=1000000, $order="tanggal DESC" ) {
    //berita ini diambil dengan status 1, yaitu sudah publish. 
    //kemudian id_kategori diambil yang selain 9, 10, dan 11, yaitu atlet, pengumuman, dan kegiatan PPITKON
    //status_delete 0 adalah belum di delete
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM berita WHERE id_kategori NOT IN ('9','10','11') AND status = '1' AND status_delete = '0'
            ORDER BY ".$order." LIMIT $numRows";
    $query = $conn->prepare($sql);
    $query->execute();
    $list = array();
    
    while ( $row = $query->fetch(PDO::FETCH_OBJ) ) {
      //$article = new Article( $row );
      $list[] = $row;
    }
    return $list;
  }

  public static function getListByKategori( $id, $numRows=1000000, $order="tanggal DESC" ) {
    //fungsi ini ambil data dari tabel berita sesuai kategori yang diinginkan.
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT * FROM berita WHERE id_kategori = :id AND status = '1' AND status_delete = '0'
            ORDER BY ".$order." LIMIT $numRows";
    $query = $conn->prepare($sql);
    $query->bindValue( ":id", $id, PDO::PARAM_INT );
    $query->execute();
    $list = array();
    
    while ( $row = $query->fetch(PDO::FETCH_OBJ) ) {
      //$article = new Article( $row );
      $list[] = $row;
    }
    return $list;
  }
 
 
  /**
  * Inserts the current Article object into the database, and sets its ID property.
  */
 
  public function insert($filename, $status) {
 
    // Does the Article object already have an ID?
    if ( !is_null( $this->id ) ) trigger_error ( "Article::insert(): Attempt to insert an Article object that already has its ID property set (to $this->id).", E_USER_ERROR );

    // Insert the Article
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "INSERT INTO berita 
                ( tanggal, judul, isi, id_kategori, username, gambar, status ) 
              VALUES 
                (:tanggal, :judul, :isi, :id_kategori, :username, :gambar, :status)";
    
    $st = $conn->prepare ( $sql );
    $st->bindParam( ":tanggal", $this->tanggal);
    $st->bindParam( ":judul", $this->judul);
    $st->bindParam( ":isi", $this->isi);
    $st->bindParam( ":id_kategori", $this->id_kategori);
    $st->bindParam( ":username", $_SESSION['username']);
    $st->bindParam( ":gambar", $filename);
    $st->bindParam( ":status", $status);
    $st->execute();

    # LOG HISTORY #

    $sql = "INSERT INTO berita_log 
                ( tanggal, judul, isi, id_kategori, username, gambar, status ) 
              VALUES 
                (:tanggal, :judul, :isi, :id_kategori, :username, :gambar, :status)";
    
    $st = $conn->prepare ( $sql );
    $st->bindParam( ":tanggal", $this->tanggal);
    $st->bindParam( ":judul", $this->judul);
    $st->bindParam( ":isi", $this->isi);
    $st->bindParam( ":id_kategori", $this->id_kategori);
    $st->bindParam( ":username", $_SESSION['username']);
    $st->bindParam( ":gambar", $filename);
    $st->bindParam( ":status", $status);
    $st->execute();
    $id_log = $conn->lastInsertId();

    $activity = "Insert data to tabel : berita. Detail : ( tanggal = ".$this->tanggal.", judul = ".$this->judul.", isi = ".$this->isi.", id_kategori = ".$this->id_kategori.", username = ".$_SESSION['username'].", gambar = ".$filename.", status = ".$status.")";
    $kategori_log = "Insert Berita";
    $sql_log = "INSERT INTO log_history
                      (id_log, username, activity, kategori_log)
                  VALUES
                      (:id_log, :username, :activity, :kategori_log)";
    $stlog = $conn->prepare($sql_log);
    $stlog->bindParam(':username', $_SESSION['username']);
    $stlog->bindParam(':activity', $activity);
    $stlog->bindParam(':kategori_log', $kategori_log);
    $stlog->bindParam(':id_log', $id_log);
    $stlog->execute();
    $conn = null;

    # END LOG HISTORY #
  }
 
  public function update() {
 
    // Does the Article object have an ID?
    if ( is_null( $this->id ) ) trigger_error ( "Article::update(): Attempt to update an Article object that does not have its ID property set.", E_USER_ERROR );
    
    // Update the Article
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "UPDATE berita SET judul=:judul, isi=:isi, tanggal=:tanggal, id_kategori=:id_kategori WHERE id = :id";
    $st = $conn->prepare ( $sql );
    $st->bindValue( ":judul", $this->judul, PDO::PARAM_STR );
    $st->bindValue( ":isi", $this->isi, PDO::PARAM_STR );
    $st->bindValue( ":id_kategori", $this->id_kategori, PDO::PARAM_STR );
    $st->bindValue( ":tanggal", $this->tanggal, PDO::PARAM_STR );
    $st->bindValue( ":id", $this->id, PDO::PARAM_INT );
    $st->execute();

    # LOG HISTORY #

    $sql = "SELECT * FROM berita WHERE id = :id ";
    $st = $conn->prepare( $sql );
    $st->bindValue( ":id", $this->id, PDO::PARAM_INT );
    $st->execute();
    $hasil = $st->fetch(PDO::FETCH_OBJ);

    $query = "INSERT INTO berita_log 
                ( tanggal, judul, isi, id_kategori, username, status ) 
              VALUES 
                (:tanggal, :judul, :isi, :id_kategori, :username, :status)";
    
    $st2 = $conn->prepare ( $query );
    $st2->bindParam( ":tanggal", $this->tanggal);
    $st2->bindParam( ":judul", $this->judul);
    $st2->bindParam( ":isi", $this->isi);
    $st2->bindParam( ":id_kategori", $this->id_kategori);
    $st2->bindParam( ":username", $_SESSION['username']);
    $st2->bindParam( ":status", $hasil->status);
    $st2->execute();
    $id_log = $conn->lastInsertId();

    $activity = "Update data on tabel : berita where id = ".$this->id.". Detail : ( tanggal = ".$this->tanggal.", judul = ".$this->judul.", isi = ".$this->isi.", id_kategori = ".$this->id_kategori.")";
    $kategori_log = "Update Berita";
    $sql_log = "INSERT INTO log_history
                      (username, activity, kategori_log, id_log)
                  VALUES
                      (:username, :activity, :kategori_log, :id_log)";
    $stlog = $conn->prepare($sql_log);
    $stlog->bindParam(':username', $_SESSION['username']);
    $stlog->bindParam(':activity', $activity);
    $stlog->bindParam(':kategori_log', $kategori_log);
    $stlog->bindParam(':id_log', $id_log);
    $stlog->execute();
    $conn = null;

    # END LOG HISTORY #
  }

  public function update_publish() {
 
    // Does the Article object have an ID?
    if ( is_null( $this->id ) ) trigger_error ( "Article::update(): Attempt to update an Article object that does not have its ID property set.", E_USER_ERROR );
    
    // Update the Article
    $status = '1';
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "UPDATE berita SET judul=:judul, isi=:isi, tanggal=:tanggal, id_kategori=:id_kategori, status=:status WHERE id = :id";
    $st = $conn->prepare ( $sql );
    $st->bindValue( ":judul", $this->judul, PDO::PARAM_STR );
    $st->bindValue( ":isi", $this->isi, PDO::PARAM_STR );
    $st->bindValue( ":id_kategori", $this->id_kategori, PDO::PARAM_STR );
    $st->bindValue( ":tanggal", $this->tanggal, PDO::PARAM_STR );
    $st->bindValue( ":status", $status, PDO::PARAM_STR );
    $st->bindValue( ":id", $this->id, PDO::PARAM_INT );
    $st->execute();

     # LOG HISTORY #

    $sql = "SELECT * FROM berita WHERE id = :id ";
    $st = $conn->prepare( $sql );
    $st->bindValue( ":id", $this->id, PDO::PARAM_INT );
    $st->execute();
    $hasil = $st->fetch(PDO::FETCH_OBJ);

    $query = "INSERT INTO berita_log 
                ( tanggal, judul, isi, id_kategori, username, status ) 
              VALUES 
                (:tanggal, :judul, :isi, :id_kategori, :username, :status)";
    
    $st2 = $conn->prepare ( $query );
    $st2->bindParam( ":tanggal", $this->tanggal);
    $st2->bindParam( ":judul", $this->judul);
    $st2->bindParam( ":isi", $this->isi);
    $st2->bindParam( ":id_kategori", $this->id_kategori);
    $st2->bindParam( ":username", $_SESSION['username']);
    $st2->bindParam( ":status", $hasil->status);
    $st2->execute();
    $id_log = $conn->lastInsertId();

    $activity = "Update data on tabel : berita where id = ".$this->id.". Detail : ( tanggal = ".$this->tanggal.", judul = ".$this->judul.", isi = ".$this->isi.", id_kategori = ".$this->id_kategori.", status = 1)";
    $kategori_log = "Update Berita (Publish)";
    $sql_log = "INSERT INTO log_history
                      (username, activity, kategori_log, id_log)
                  VALUES
                      (:username, :activity, :kategori_log, :id_log)";
    $stlog = $conn->prepare($sql_log);
    $stlog->bindParam(':username', $_SESSION['username']);
    $stlog->bindParam(':activity', $activity);
    $stlog->bindParam(':kategori_log', $kategori_log);
    $stlog->bindParam(':id_log', $id_log);
    $stlog->execute();
    $conn = null;

    # END LOG HISTORY #
  }

  public function update_gambar($filename){
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "UPDATE berita SET gambar=:gambar WHERE id = :id";
    $st = $conn->prepare ( $sql );
    $st->bindValue( ":gambar", $filename, PDO::PARAM_STR );
    $st->bindValue( ":id", $this->id, PDO::PARAM_INT );
    $st->execute();
    
    # LOG HISTORY #

    $sql = "SELECT * FROM berita WHERE id = :id ";
    $st = $conn->prepare( $sql );
    $st->bindValue( ":id", $this->id, PDO::PARAM_INT );
    $st->execute();
    $hasil = $st->fetch(PDO::FETCH_OBJ);

    $query = "INSERT INTO berita_log 
                ( tanggal, judul, isi, id_kategori, username, status, gambar ) 
              VALUES 
                (:tanggal, :judul, :isi, :id_kategori, :username, :status, :gambar)";
    
    $st2 = $conn->prepare ( $query );
    $st2->bindParam( ":tanggal", $hasil->tanggal);
    $st2->bindParam( ":judul", $hasil->judul);
    $st2->bindParam( ":isi", $hasil->isi);
    $st2->bindParam( ":id_kategori", $hasil->id_kategori);
    $st2->bindParam( ":username", $_SESSION['username']);
    $st2->bindParam( ":status", $hasil->status);
    $st2->bindParam( ":gambar", $hasil->gambar);
    $st2->execute();
    $id_log = $conn->lastInsertId();

    $activity = "Update data on tabel : berita where id = ".$this->id.". Detail : ( gambar = ".$filename.")";
    $kategori_log = "Update Berita (Gambar)";
    $sql_log = "INSERT INTO log_history
                      (username, activity, kategori_log, id_log)
                  VALUES
                      (:username, :activity, :kategori_log, :id_log)";
    $stlog = $conn->prepare($sql_log);
    $stlog->bindParam(':username', $_SESSION['username']);
    $stlog->bindParam(':activity', $activity);
    $stlog->bindParam(':kategori_log', $kategori_log);
    $stlog->bindParam(':id_log', $id_log);
    $stlog->execute();
    $conn = null;

    # END LOG HISTORY #
  }

  public function publish($id) {
    // Update the Article
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "UPDATE berita SET status='1' WHERE id = :id";
    $st = $conn->prepare ( $sql );
    $st->bindValue( ":id", $id, PDO::PARAM_INT );
    $st->execute();

     # LOG HISTORY #

    $sql = "SELECT * FROM berita WHERE id = :id ";
    $st = $conn->prepare( $sql );
    $st->bindValue( ":id", $id, PDO::PARAM_INT );
    $st->execute();
    $hasil = $st->fetch(PDO::FETCH_OBJ);

    $query = "INSERT INTO berita_log 
                ( tanggal, judul, isi, id_kategori, username, status, gambar ) 
              VALUES 
                (:tanggal, :judul, :isi, :id_kategori, :username, :status, :gambar)";
    
    $st2 = $conn->prepare ( $query );
    $st2->bindParam( ":tanggal", $hasil->tanggal);
    $st2->bindParam( ":judul", $hasil->judul);
    $st2->bindParam( ":isi", $hasil->isi);
    $st2->bindParam( ":id_kategori", $hasil->id_kategori);
    $st2->bindParam( ":username", $_SESSION['username']);
    $st2->bindParam( ":status", $hasil->status);
    $st2->bindParam( ":gambar", $hasil->gambar);
    $st2->execute();
    $id_log = $conn->lastInsertId();

    $activity = "Update data on tabel : berita where id = ".$id.". Detail : ( status = 1)";
    $kategori_log = "Publish Berita";
    $sql_log = "INSERT INTO log_history
                      (username, activity, kategori_log, id_log)
                  VALUES
                      (:username, :activity, :kategori_log, :id_log)";
    $stlog = $conn->prepare($sql_log);
    $stlog->bindParam(':username', $_SESSION['username']);
    $stlog->bindParam(':activity', $activity);
    $stlog->bindParam(':kategori_log', $kategori_log);
    $stlog->bindParam(':id_log', $id_log);
    $stlog->execute();
    $conn = null;

    # END LOG HISTORY #
  }


 
 
  /**
  * Deletes the current Article object from the database.
  */
 
  public function delete($id) {
 
    // Does the Article object have an ID?
    if ( is_null( $id ) ) trigger_error ( "Article::delete(): Attempt to delete an Article object that does not have its ID property set.", E_USER_ERROR );
 
    // Delete the Article
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $st = $conn->prepare ( "UPDATE berita SET status_delete = '1' WHERE id = :id LIMIT 1" );
    $st->bindValue( ":id", $id, PDO::PARAM_INT );
    $st->execute();

     # LOG HISTORY #

    $sql = "SELECT * FROM berita WHERE id = :id ";
    $st = $conn->prepare( $sql );
    $st->bindValue( ":id", $id, PDO::PARAM_INT );
    $st->execute();
    $hasil = $st->fetch(PDO::FETCH_OBJ);

    $query = "INSERT INTO berita_log 
                ( tanggal, judul, isi, id_kategori, username, status, gambar, status_delete ) 
              VALUES 
                (:tanggal, :judul, :isi, :id_kategori, :username, :status, :gambar, :status_delete)";
    
    $st2 = $conn->prepare ( $query );
    $st2->bindParam( ":tanggal", $hasil->tanggal);
    $st2->bindParam( ":judul", $hasil->judul);
    $st2->bindParam( ":isi", $hasil->isi);
    $st2->bindParam( ":id_kategori", $hasil->id_kategori);
    $st2->bindParam( ":username", $_SESSION['username']);
    $st2->bindParam( ":status", $hasil->status);
    $st2->bindParam( ":gambar", $hasil->gambar);
    $st2->bindParam( ":status_delete", $hasil->status_delete);
    $st2->execute();
    $id_log = $conn->lastInsertId();

    $activity = "Delete data on tabel : berita where id = ".$id.". Detail : ( status_delete = 1)";
    $kategori_log = "Delete Berita";
    $sql_log = "INSERT INTO log_history
                      (username, activity, kategori_log, id_log)
                  VALUES
                      (:username, :activity, :kategori_log, :id_log)";
    $stlog = $conn->prepare($sql_log);
    $stlog->bindParam(':username', $_SESSION['username']);
    $stlog->bindParam(':activity', $activity);
    $stlog->bindParam(':kategori_log', $kategori_log);
    $stlog->bindParam(':id_log', $id_log);
    $stlog->execute();
    $conn = null;
  }
 
}
 
?>