<?php

class Food
{
   private $food_name;
   private $price;
   private $description;
   private $image;

   private $category;

   public function getfoodName()
   {
      return $this->food_name;
   }

   public function setFoodName($food_name)
   {
      $this->food_name = $food_name;
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
