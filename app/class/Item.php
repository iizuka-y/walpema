<?php
require_once(dirname(__FILE__).'/Model.php');

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


  public function __construct($id, $name, $user_id, $price, $explanation, $image, $created_at, $updated_at) {
    $this->id = $id;
    $this->name = $name;
    $this->user_id = $user_id;
    $this->price = $price;
    $this->explanation = $explanation;
    $this->image = $image;
    $this->created_at = $created_at;
    $this->updated_at = $updated_at;

  }

  public function user(){
    $params = [
      'id' => $this->user_id
    ];
    
    return User::find($params);
  }

}
?>
