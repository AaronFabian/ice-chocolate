<?php

include_once "../utils/PDOUtil.php";
include_once "../dao/FoodDaoImpl.php";
include_once "../dao/TableConfigDaoImpl.php";
include_once "../models/Category.php";
include_once "../models/Food.php";
include_once "../models/TableConfig.php";


class Ajax
{
   private $foodDaoImpl;
   private $tableConfigDaoImpl;

   public function __construct()
   {
      $this->foodDaoImpl = new FoodDaoImpl();
      $this->tableConfigDaoImpl = new TableConfigDaoImpl();
   }

   public function fetchFood()
   {
      $request = filter_input(INPUT_GET, 'request');

      if (isset($request)) return $this->foodDaoImpl->fetchFoodPerCategory($request);
      return 'no data :(';
   }

   public function fetchFloor()
   {
      $floor = filter_input(INPUT_GET, 'floor');

      if (isset($floor)) return $this->tableConfigDaoImpl->fetchTableConfig($floor);
      return 'no data :(';
   }
}
