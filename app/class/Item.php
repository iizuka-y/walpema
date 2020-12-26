<?php
require_once(dirname(__FILE__).'/Model.php');
require_once(dirname(__FILE__).'/User.php');

class Item extends Model{

  protected static $table = 'item';

  public $id;
  public $name;
  public $user_id;
  public $price;
  public $explanation;
  public $image;
  public $created_at;
  public $updated_at;
  public $sale;


  public function __construct($id, $name, $user_id, $price, $explanation, $image, $created_at, $updated_at, $sale) {
    $this->id = $id;
    $this->name = $name;
    $this->user_id = $user_id;
    $this->price = $price;
    $this->explanation = $explanation;
    $this->image = $image;
    $this->created_at = $created_at;
    $this->updated_at = $updated_at;
    $this->sale = $sale;

  }

  public function user(){
    
    return User::findById($this->user_id);

  }

}
?>
