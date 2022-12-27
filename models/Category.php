<?php

class Category
{
   private $food_category;

   private $total_food;

   public function getfoodCategory()
   {
      return $this->food_category;
   }

   public function setfoodCategory($food_category)
   {
      $this->food_category = $food_category;
   }

   public function getTotalFood()
   {
      return $this->total_food;
   }

   public function setTotalFood($total_food)
   {
      $this->total_food = $total_food;
   }
}
