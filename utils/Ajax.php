<?php

include_once "../utils/PDOUtil.php";
include_once "../dao/FoodDaoImpl.php";
include_once "../models/Category.php";
include_once "../models/Food.php";


class Ajax
{
   private $foodDaoImpl;

   public function __construct()
   {
      $this->foodDaoImpl = new FoodDaoImpl();
   }

   public function fetchFood()
   {
      $request = filter_input(INPUT_GET, 'request');

      if (isset($request)) return $this->foodDaoImpl->fetchFoodPerCategory($request);
      return 'no data :( (method : get)';
   }
}
