<?php
require_once(dirname(__FILE__).'/Model.php');

class User extends Model{

  protected static $table = 'user';

  // ユーザー登録のときにすでに登録されたemailでは登録できなくする
  public static function uniqueness($email){
    $sql = implode(' ', [
      'SELECT * FROM',
      static::$table,
      'WHERE email = ?'
    ]);

    $dbh = db_connect()->prepare($sql);
    $dbh->bindValue(1,$email,PDO::PARAM_STR);
    $dbh->execute();
    $dbh->fetchAll();

    // emailの重複があればfalseを返す
    if($dbh->rowCount() > 0){
      return false;
    }

    return true;

  }

  // ログインチェック
  public static function find($email, $password){
    $sql = implode(' ', [
      'SELECT * FROM',
      static::$table,
      'WHERE email = ?',
      'AND password = ?'
    ]);

    $dbh = db_connect()->prepare($sql);
    $dbh->bindValue(1,$email,PDO::PARAM_STR);
    $dbh->bindValue(2,$password,PDO::PARAM_STR);
    $dbh->execute();
    return $dbh->fetch();

  }

}

?>
