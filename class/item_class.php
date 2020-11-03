<?php
class Item {
  private $id;
  private $name;
  private $price;
  private $image;
  private $orderCount = 0;
  private static $count = 0;

  public function __construct($id, $name, $price, $image) {
    $this->id = $id;
    $this->name = $name;
    $this->price = $price;
    $this->image = $image;
    self::$count++;
  }

  public function getId() {
    return $this->id;
  }

  public function getName() {
    return $this->name;
  }

  public function getPrice(){
    return $this->price;
  }

  public function getImage() {
    return $this->image;
  }

  public function getOrderCount() {
    return $this->orderCount;
  }

  public function setOrderCount($orderCount) {
    $this->orderCount = $orderCount;
  }

  public function getTaxIncludedPrice() {
    return floor($this->price * 1.1);
  }

  public function getTotalPrice() {
    return $this->getTaxIncludedPrice() * $this->orderCount;
  }

  public function getReviews($reviews) {
    $reviewsForMenu = array();
    foreach ($reviews as $review) {
      if ($review->getMenuName() == $this->name) {
        $reviewsForMenu[] = $review;
      }
    }
    return $reviewsForMenu;
  }


  public static function getCount() {
    return self::$count;
  }

  public static function findByName($items, $name) {
    foreach ($items as $item) {
      if ($item->getName() == $name) {
        return $item;
      }
    }
  }


  public static function findById($items, $itemId) {
    foreach ($items as $item) {
      if ($item->getId() == $itemId) {
        return $item;
      }
    }
  }

}
?>
