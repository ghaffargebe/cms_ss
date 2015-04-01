<?php
 
/**
 * Class to handle users
 */
 
class Users
{
 
  // Properties
 
  /**
  * @var int The users ID from the database
  */
  public $id = null;
 
  /**
  * @var string full name from the database
  */
  public $nama = null;
 
  /**
  * @var string username from the database
  */
  public $username = null;
 
  /**
  * @var string group from the database
  */
  public $group = null;

  public $password = null;
 
 
  /**
  * Sets the object's properties using the values in the supplied array
  *
  * @param assoc The property values
  */
 
  public function __construct( $data=array() ) {
    if ( isset( $data['id'] ) ) $this->id = (int) $data['id'];
    if ( isset( $data['nama'] ) ) $this->nama = $data['nama'];
    if ( isset( $data['username'] ) ) $this->username = $data['username'];
    if ( isset( $data['password'] ) ) $this->password = $data['password'];
    if ( isset( $data['group'] ) ) $this->group = $data['group'];
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
    if ( isset($params['password']) ) {
      $this->password = md5($params['password']);
    }
  }
 
 
  /**
  * Returns an Article object matching the given article ID
  *
  * @param int The article ID
  * @return Article|false The article object, or false if the record was not found or there was a problem
  */
 
  public static function getById( $id ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT * FROM users WHERE id = :id and status_delete = '0'";
    $st = $conn->prepare( $sql );
    $st->bindValue( ":id", $id, PDO::PARAM_INT );
    $st->execute();
    $row = $st->fetch();
    $conn = null;
    if ($row){
      return new Users($row);
    } 
  }
 
 
  /**
  * Returns all (or a range of) Article objects in the DB
  *
  * @param int Optional The number of rows to return (default=all)
  * @param string Optional column by which to order the articles (default="publicationDate DESC")
  * @return Array|false A two-element array : results => array, a list of Article objects; totalRows => Total number of articles
  */
 
  public static function getList( $numRows=1000000, $order="id DESC" ) {
    //$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM users where status_delete = 0
            ORDER BY ".$order." LIMIT $numRows";
    $query = mysql_query($sql);
    $list = array();
    
    while ( $row = mysql_fetch_object($query) ) {
      $list[] = $row;
    }
    $total = mysql_num_rows($query);
    return ( array ( "results" => $list, 
                      //"group" => $group ,
                      "total" => $total
            ) );
  }

  public static function getGroup() {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT * FROM user_group";
    $st = $conn->prepare ( $sql );
    $st->execute();
    while ($row = $st->fetch(PDO::FETCH_OBJ)) {
      $group[$row->id]=$row->nama_group;
    }
    $conn = null;
    return $group;
  }

  public function insert() {
 
    // Does the Article object already have an ID?
    //if ( !is_null( $this->id ) ) trigger_error ( "Article::insert(): Attempt to insert an Article object that already has its ID property set (to $this->id).", E_USER_ERROR );

    // Insert the Article
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "INSERT INTO users 
                    (nama,username,password,id_group,status,change_by) 
              VALUES
                    (:nama,:username,:password,:group,:status, :change_by)";
    $status = '1';
    $st = $conn->prepare ( $sql );
    $st->bindParam( ":nama", $this->nama);
    $st->bindParam( ":username", $this->username);
    $st->bindParam( ":password", $this->password);
    $st->bindParam( ":group", $this->group);
    $st->bindParam( ":status", $status);
    $st->bindParam( ":change_by", $_SESSION['username']);
    $st->execute();

    # LOG HISTORY #

    $sql = "INSERT INTO users_log
               (nama,username,password,id_group,status,change_by) 
              VALUES 
                (:nama,:username,:password,:group,:status, :change_by)";
    
    $st = $conn->prepare ( $sql );
    $st->bindParam( ":nama", $this->nama);
    $st->bindParam( ":username", $this->username);
    $st->bindParam( ":password", $this->password);
    $st->bindParam( ":group", $this->group);
    $st->bindParam( ":status", $status);
    $st->bindParam( ":change_by", $_SESSION['username']);
    $st->execute();
    $id_log = $conn->lastInsertId();

    $activity = "Insert data to tabel : users. Detail : ( nama = ".$this->nama.", username = ".$this->username.", group = ".$this->group.", status = ".$status.", username = ".$_SESSION['username'].")";
    $kategori_log = "Add User";
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

  public function activate($id) {
 
    // Does the User object have an ID?
    if ( is_null( $id ) ) trigger_error ( "Users::activate(): Attempt to delete an Users object that does not have its ID property set.", E_USER_ERROR );
 
    // Delete the User
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $st = $conn->prepare ( "UPDATE users SET status = '1', change_by = :change_by WHERE id = :id LIMIT 1" );
    $st->bindValue( ":id", $id, PDO::PARAM_INT );
    $st->bindParam( ":change_by", $_SESSION['username']);
    $st->execute();

    # LOG HISTORY #

    $sql = "SELECT * FROM users WHERE id = :id ";
    $st = $conn->prepare( $sql );
    $st->bindValue( ":id", $id, PDO::PARAM_INT );
    $st->execute();
    $hasil = $st->fetch(PDO::FETCH_OBJ);

    $query = "INSERT INTO users_log
               (nama,username,password,id_group,status,change_by) 
              VALUES 
                (:nama,:username,:password,:group,:status, :change_by)";
    
    $st2 = $conn->prepare ( $query );
    $st2->bindParam( ":nama", $hasil->nama);
    $st2->bindParam( ":username", $hasil->username);
    $st2->bindParam( ":password", $hasil->password);
    $st2->bindParam( ":group", $hasil->id_group);
    $st2->bindParam( ":status", $hasil->status);
    $st2->bindParam( ":change_by", $_SESSION['username']);
    $st2->execute();
    $id_log = $conn->lastInsertId();

    $activity = "Update data on tabel : users where id = ".$id.". Detail : ( status = 1)";
    $kategori_log = "Activate User";
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

  public function deactivate($id) {
 
    // Does the User object have an ID?
    if ( is_null( $id ) ) trigger_error ( "Users::deactivate(): Attempt to delete an Users object that does not have its ID property set.", E_USER_ERROR );
 
    // Delete the User
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $st = $conn->prepare ( "UPDATE users SET status = '0', change_by = :change_by WHERE id = :id LIMIT 1" );
    $st->bindValue( ":id", $id, PDO::PARAM_INT );
    $st2->bindParam( ":change_by", $_SESSION['username']);
    $st->execute();

    # LOG HISTORY #

    $sql = "SELECT * FROM users WHERE id = :id ";
    $st = $conn->prepare( $sql );
    $st->bindValue( ":id", $id, PDO::PARAM_INT );
    $st->execute();
    $hasil = $st->fetch(PDO::FETCH_OBJ);

    $query = "INSERT INTO users_log
               (nama,username,password,id_group,status,change_by) 
              VALUES 
                (:nama,:username,:password,:group,:status, :change_by)";
    
    $st2 = $conn->prepare ( $query );
    $st2->bindParam( ":nama", $hasil->nama);
    $st2->bindParam( ":username", $hasil->username);
    $st2->bindParam( ":password", $hasil->password);
    $st2->bindParam( ":group", $hasil->id_group);
    $st2->bindParam( ":status", $hasil->status);
    $st2->bindParam( ":change_by", $_SESSION['username']);
    $st2->execute();
    $id_log = $conn->lastInsertId();

    $activity = "Update data on tabel : users where id = ".$id.". Detail : ( status = 0)";
    $kategori_log = "Deactivate User";
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
 
  public function delete($id) {
 
    // Does the User object have an ID?
    if ( is_null( $id ) ) trigger_error ( "Users::delete(): Attempt to delete an Users object that does not have its ID property set.", E_USER_ERROR );
 
    // Delete the User
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $st = $conn->prepare ( "UPDATE users SET status_delete = '1' WHERE id = :id LIMIT 1" );
    $st->bindValue( ":id", $id, PDO::PARAM_INT );
    $st->execute();

    # LOG HISTORY #

    $sql = "SELECT * FROM users WHERE id = :id ";
    $st = $conn->prepare( $sql );
    $st->bindValue( ":id", $id, PDO::PARAM_INT );
    $st->execute();
    $hasil = $st->fetch(PDO::FETCH_OBJ);

    $query = "INSERT INTO users_log
               (nama,username,password,id_group,status,change_by,status_delete) 
              VALUES 
                (:nama,:username,:password,:group,:status,:change_by,:status_delete)";
    
    $st2 = $conn->prepare ( $query );
    $st2->bindParam( ":nama", $hasil->nama);
    $st2->bindParam( ":username", $hasil->username);
    $st2->bindParam( ":password", $hasil->password);
    $st2->bindParam( ":group", $hasil->id_group);
    $st2->bindParam( ":status", $hasil->status);
    $st2->bindParam( ":status_delete", $hasil->status_delete);
    $st2->bindParam( ":change_by", $_SESSION['username']);
    $st2->execute();
    $id_log = $conn->lastInsertId();

    $activity = "Delete data on tabel : users where id = ".$id.". Detail : ( status_delete = 1)";
    $kategori_log = "Delete User";
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
 
}
 
?>