<?php
require_once(dirname(__FILE__).'/Model.php');

class User extends Model{

  protected static $table = 'user';

  public $id;
  public $name;
  public $email;
  public $password;
  public $image;
  public $self_introduction;
  public $credit_card_num;
  public $created_at;
  public $updated_at;
  public $admin;

  public function __construct(
    $id,
    $user_name,
    $email,
    $password,
    $image,
    $self_introduction,
    $credit_card_num,
    $created_at,
    $updated_at,
    $admin
    ) {
    
    $this->id = $id;
    $this->name = $user_name;
    $this->email = $email;
    $this->password = $password;
    $this->image = $image;
    $this->self_introduction = $self_introduction;
    $this->credit_card_num = $credit_card_num;
    $this->created_at = $created_at;
    $this->updated_at = $updated_at;
    $this->admin = $admin;

  }

}

?>
