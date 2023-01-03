<?php

class CategoryDaoImpl
{

   public function fetchAllCategory()
   {
      $link = PDOUtil::createConnection();

      $query = "SELECT * FROM japan_restaurant.category";
      $stmt = $link->prepare($query);
      $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Category');
      $stmt->execute();

      $link = null;
      return $stmt->fetchAll();
   }

   public function addNewCategory(Category $category)
   {
      $status = 0;
      $link = PDOUtil::createConnection();

      $query = "INSERT INTO japan_restaurant.category (food_category) VALUES (?)";
      $stmt = $link->prepare($query);
      $stmt->bindValue(1, $category->getfoodCategory());

      $link->beginTransaction();
      if ($stmt->execute()) {
         $status = 1;
         $link->commit();
      } else {
         $status = 0;
      }

      return $status;
   }
}
