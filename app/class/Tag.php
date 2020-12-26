<?php
require_once(dirname(__FILE__).'/Model.php');
require_once(dirname(__FILE__).'/User.php');

class Tag extends Model{

  protected static $table = 'tag';

  public $id;
  public $item_id;
  public $name;
  public $created_at;
  public $updated_at;


  public function __construct($id, $item_id, $tag_name, $created_at, $updated_at) {
    $this->id = $id;
    $this->item_id = $item_id;
    $this->name = $tag_name;
    $this->created_at = $created_at;
    $this->updated_at = $updated_at;
  }
}
?>