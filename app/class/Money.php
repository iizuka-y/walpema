<?php
require_once(dirname(__FILE__).'/Model.php');
require_once(dirname(__FILE__).'/User.php');

class Money extends Model{

    protected static $table = 'money';

    public $id;
    public $user_id;
    public $transaction;
    public $created_at;
    public $updated_at;

    public function __construct(
        $id,
        $user_id,
        $transaction,
        $created_at,
        $updated_at
    ) {
        
        $this->id = $id;
        $this->user_id = $user_id;
        $this->transaction = $transaction;
        $this->created_at;
        $this->updated_at;

    }

}

?>