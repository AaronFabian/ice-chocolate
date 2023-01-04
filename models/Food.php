<?php

class Food
{
   private $name;
   private $price;
   private $description;
   private $image;
   private $imageThumb;
   private $added_at;

   private $category;

   public function getfoodName()
   {
      return $this->name;
   }

   public function setFoodName($name)
   {
      $this->name = $name;
   }

   public function getPrice()
   {
      return $this->price;
   }

   public function setPrice($price)
   {
      $this->price = $price;
   }

   public function getDescription()
   {
      return $this->description;
   }

   public function setDescription($description)
   {
      $this->description = $description;
   }

   public function getImage()
   {
      return $this->image;
   }

   public function setImage($image)
   {
      $this->image = $image;
   }

   public function getImageThumb()
   {
      return $this->imageThumb;
   }

   public function setImageThumb($imageThumb)
   {
      $this->imageThumb = $imageThumb;
   }

   public function getCategory()
   {
      if (!isset($this->category)) {
         $this->category = new Category();
      }

      return $this->category;
   }

   public function setCategory($category)
   {
      if (!isset($category)) {
         $this->category = new Category();
      }

      $this->category = $category;
   }

   public function getAddedAt()
   {
      return $this->added_at;
   }

   public function setAddedAt($added_at)
   {
      $this->added_at = $added_at;
   }



   public function __set($name, $value)
   {
      if (!isset($this->category)) {
         $this->category = new Category();
      }

      switch ($name) {
         case 'food_category':
            $this->category->setfoodCategory($value);
            break;
         case 'total_food':
            $this->category->setTotalFood($value);
      }
   }
}
