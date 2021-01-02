<?php
require_once(dirname(__FILE__).'/Model.php');
require_once(dirname(__FILE__).'/User.php');

class Notification extends Model{
    
    protected static $table = 'notification';

    public $id;
    public $user_id;
    public $notified_id;
    public $item_id;
    public $read;
    public $notified_type;
    public $created_at;
    public $updated_at;


    public function __construct($id, $user_id, $notified_id, $item_id, $read, $notified_type, $created_at, $updated_at) {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->notified_id = $notified_id;
        $this->item_id = $item_id;
        $this->read = $read;
        $this->notified_type = $notified_type;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    public function notified_user(){

        $notified_user = User::findById($this->notified_id);

        return $notified_user;

    }

}

?>