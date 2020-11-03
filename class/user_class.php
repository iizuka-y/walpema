<?php
// require_once('db_read.php')
?>
<?php
class User {
  private $id;
  private $name;
  private $gender;
  private static $count = 0;

  public function __construct($name, $gender) {
    $this->name = $name;
    $this->gender = $gender;
    self::$count++;
    $this->id = self::$count;
  }

  public function getId() {
    return $this->id;
  }

  public function getName() {
    return $this->name;
  }

  public function getGender() {
    return $this->gender;
  }

  // public static function findById($user_id){
  //   $strSQL = "select * from user where user_id = '$user_id'";
  //   $db_result = db_read($strSQL);
  //   $db_row = mysqli_fetch_array($db_result);
  //
  // }
}

?>
