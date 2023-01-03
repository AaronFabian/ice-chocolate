<?php

class ClientController
{
   private $foodDaoImpl;

   public function __construct()
   {
      $this->foodDaoImpl = new FoodDaoImpl();
   }

   public function index()
   {
      $tableNumber = filter_input(INPUT_POST, 'tableNumber');

      $dataCategory = [];
      $loadCategory = $this->foodDaoImpl->fetchCategory();
      foreach ($loadCategory as $category)
         $dataCategory[] = $category->getCategory()->getFoodCategory();

      $dataMenu = [];
      $loadMenu = $this->foodDaoImpl->fetchAllFoods();
      foreach ($loadMenu as $menu) {
         $category = $menu->getCategory()->getFoodCategory();
         $value = $menu->getFoodName();
         $foodImg = $menu->getImage();


         if (isset($dataMenu[$category])) {
            array_push($dataMenu[$category], [
               "foodName" => $value,
               "image" => $foodImg
            ]);
         } else {
            $dataMenu[$category] = [["foodName" => $value, "image" => $foodImg]];
         }
      }

      $loadJson = json_encode([
         "status" => "success",
         "data" => [
            "categories" => $dataCategory,
            "allMenu" => $dataMenu
         ]
      ]);

      include_once "./views/client-view.php";
   }
}
