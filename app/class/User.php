<?php
require_once(dirname(__FILE__).'/Model.php');
require_once(dirname(__FILE__).'/Item.php');
require_once(dirname(__FILE__).'/Cart.php');
require_once(dirname(__FILE__).'/Purchase_history.php');
require_once(dirname(__FILE__).'/Favorite.php');
require_once(dirname(__FILE__).'/Follow.php');
require_once(dirname(__FILE__).'/Tag.php');
require_once(dirname(__FILE__).'/Tag.php');
require_once(dirname(__FILE__).'/Chat.php');


class User extends Model{

  protected static $table = 'user';

  public $id;
  public $name;
  public $email;
  private $password;
  private $image;
  public $self_introduction;
  private $credit_card_num;
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



  public function items(){

    return Item::where(['user_id' => $this->id]);

  }

  public function cart_items(){

    return Cart::where(['user_id' => $this->id]);
    
  }

  public function bought_items(){
    
    $bought_items = Purchase_history::where(['user_id' => $this->id]);
    $items = [];

    foreach($bought_items as $bought_item){
      $items[] = Item::findById($bought_item->item_id);
    }

    return $items;

  }

  public function following_users(){

    $following_records = Follow::where(['following_id' => $this->id]);
    $following_users = [];

    foreach($following_records as $following_record){
      $following_users[] = User::findById($following_record->followed_id); 
    }

    return $following_users;

  }

  public function follower_users(){

    $followed_records = Follow::where(['followed_id' => $this->id]);
    $follower_users = [];

    foreach($followed_records as $followed_record){
      $follower_users[] = User::findById($followed_record->following_id);
    }

    return $follower_users;

  }

  public function image(){

    if($this->image){
      return $this->image;
    }else{
      return "images/default-user-image.png";
    }

  }

}


?>
