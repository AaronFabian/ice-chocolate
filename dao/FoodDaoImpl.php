<?php

class FoodDaoImpl
{
   public function fetchAllFoods($offset = 0, $limitPage = 10, $category = false)
   {
      $link = PDOUtil::createConnection();

      $query = "";
      $stmt = "";
      if ($category) {
         $query = "SELECT * FROM japan_restaurant.food WHERE food_category= ? LIMIT ? OFFSET ?";
         $stmt = $link->prepare($query);
         $query = "SELECT * FROM japan_restaurant.food LIMIT ? OFFSET ?";
         $stmt->bindParam(1, $category);
         $stmt->bindParam(2, $limitPage, PDO::PARAM_INT);
         $stmt->bindParam(3, $offset, PDO::PARAM_INT);
      } else {
         $query = "SELECT * FROM japan_restaurant.food LIMIT ? OFFSET ? ";
         $stmt = $link->prepare($query);
         $stmt->bindParam(1, $limitPage, PDO::PARAM_INT);
         $stmt->bindParam(2, $offset, PDO::PARAM_INT);
      }

      $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Food');
      $stmt->execute();

      $link = null;
      return $stmt->fetchAll();
   }

   public function fetchCategory()
   {
      $link = PDOUtil::createConnection();

      $query = "SELECT COUNT(name) AS total_food, food_category FROM food GROUP BY food_category DESC";
      $stmt = $link->prepare($query);
      $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Food');
      $stmt->execute();

      $link = null;
      return $stmt->fetchAll();
   }

   public function fetchFoodPerCategory($category)
   {
      $link = PDOUtil::createConnection();

      $query = "SELECT name, image FROM food WHERE food_category= ? ORDER BY name ASC";
      $stmt = $link->prepare($query);
      $stmt->bindParam(1, $category);
      $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Food');
      $stmt->execute();

      $link = null;
      return $stmt->fetchAll();
   }

   public function addFood(Food $food)
   {
      $status = 0;
      $link = PDOUtil::createConnection();


      $query = "INSERT INTO japan_restaurant.food (name, food_category, price, description, image) VALUES (?,?,?,?,?)";
      $stmt = $link->prepare($query);
      $stmt->bindValue(1, $food->getfoodName());
      $stmt->bindValue(2, $food->getCategory());
      $stmt->bindValue(3, $food->getPrice());
      $stmt->bindValue(4, $food->getDescription());
      $stmt->bindValue(5, $food->getImage());


      $link->beginTransaction();
      if ($stmt->execute()) {
         $link->commit();
         $status = 1;
      } else {
         $link->rollBack();
      }

      return $status;
   }

   public function updateFood(Food $food, $oldName)
   {
      $status = 0;
      $link = PDOUtil::createConnection();

      $query = "UPDATE japan_restaurant.food SET name= ?,food_category= ?, price= ?, image= ?  ,description= ? WHERE (name = ?)";
      $stmt = $link->prepare($query);
      $stmt->bindValue(1, $food->getfoodName());
      $stmt->bindValue(2, $food->getCategory());
      $stmt->bindValue(3, $food->getPrice());
      $stmt->bindValue(4, $food->getImage());
      $stmt->bindValue(5, $food->getDescription());
      $stmt->bindParam(6, $oldName);

      $link->beginTransaction();
      if ($stmt->execute()) {
         $link->commit();
         $status = 1;
      } else {
         $link->rollBack();
      }

      return $status;
   }
}
      // $query = "INSERT INTO japan_restaurant.food (food_name, food_category, price, description, created_by) VALUES (?,?,?,?)";
