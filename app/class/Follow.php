<?php
require_once(dirname(__FILE__).'/Model.php');
require_once(dirname(__FILE__).'/User.php');

class Follow extends Model{


    protected static $table = 'follow';

    public $id;
    public $following_id;
    public $followed_id;
    public $created_at;
    public $updated_at;

    public function __construct(
        $id,
        $following_id,
        $followed_id,
        $created_at,
        $updated_at
    ) {
        
        $this->id = $id;
        $this->following_id = $following_id;
        $this->followed_id = $followed_id;
        $this->created_at;
        $this->updated_at;

    }
}

?>