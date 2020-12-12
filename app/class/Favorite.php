<?php
require_once(dirname(__FILE__).'/Model.php');
require_once(dirname(__FILE__).'/User.php');

class Favorite extends Model{


    protected static $table = 'favorite';

    public $id;
    public $user_id;
    public $item_id;
    public $created_at;
    public $updated_at;

    public function __construct(
        $id,
        $user_id,
        $item_id,
        $created_at,
        $updated_at
    ) {
        
        $this->id = $id;
        $this->user_id = $user_id;
        $this->item_id = $item_id;
        $this->created_at;
        $this->updated_at;

    }
}

?>