<?php
require_once(dirname(__FILE__).'/Model.php');
require_once(dirname(__FILE__).'/User.php');

class Purchase_history extends Model{

    protected static $table = 'purchase_history';

    public $id;
    public $user_id;
    public $item_id;
    public $seller_id;
    public $created_at;
    public $updated_at;

    public function __construct(
        $id,
        $user_id,
        $item_id,
        $seller_id,
        $created_at,
        $updated_at
    ) {
        
        $this->id = $id;
        $this->user_id = $user_id;
        $this->item_id = $item_id;
        $this->seller_id = $seller_id;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;

    }


    public function user(){

        return User::findById($this->user_id);
    
    }
    
    public function item(){
    
        return Item::findById($this->item_id);
    
    }

}

?>