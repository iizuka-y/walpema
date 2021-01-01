<?php
require_once(dirname(__FILE__).'/Model.php');
require_once(dirname(__FILE__).'/User.php');
require_once(dirname(__FILE__).'/../controller/before_view.php');

class Chat extends Model{

    protected static $table = 'chat';

    public $id;
    public $chatting_id;
    public $chatted_id;
    public $content;
    public $read;
    public $room;
    public $created_at;
    public $updated_at;


    public function __construct($id, $chatting_id, $chatted_id, $content, $read, $chat_room, $created_at, $updated_at) {
        $this->id = $id;
        $this->chatting_id = $chatting_id;
        $this->chatted_id = $chatted_id;
        $this->content = $content;
        $this->read = $read;
        $this->room = $chat_room;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }


    public function opponent_user(){
        global $current_user;
        
        if($this->chatting_id === $current_user->id){
            $opponent_user = User::findById($this->chatted_id);
        }else{
            $opponent_user = User::findById($this->chatting_id);
        }

        return $opponent_user;

    }

}

?>