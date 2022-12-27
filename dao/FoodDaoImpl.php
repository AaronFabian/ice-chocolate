<?php

class FoodDaoImpl
{
   public function fetchCategory()
   {
      $link = PDOUtil::createConnection();

      $query = "SELECT COUNT(food_name) AS total_food, food_category FROM food GROUP BY food_category DESC";
      $stmt = $link->prepare($query);
      $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Food');
      $stmt->execute();

      $link = null;
      return $stmt->fetchAll();
   }

   public function fetchWhisky()
   {
      $link = PDOUtil::createConnection();

      $query = "SELECT food_name FROM food WHERE food_category= 'whisky' ORDER BY food_name ASC";
      $stmt = $link->prepare($query);
      $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Food');
      $stmt->execute();

      $link = null;
      return $stmt->fetchAll();
   }

   public function fetchFoodPerCategory($category)
   {
      $link = PDOUtil::createConnection();

      $query = "SELECT food_name FROM food WHERE food_category= ? ORDER BY food_name ASC";
      $stmt = $link->prepare($query);
      $stmt->bindParam(1, $category);
      $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Food');
      $stmt->execute();

      $link = null;
      return $stmt->fetchAll();
   }
}
