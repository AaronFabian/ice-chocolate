<?php

class ResultDaoImpl
{
   public function insertNewResult(Result $result)
   {
      $link = PDOUtil::createConnection();

      $query = "INSERT INTO japan_restaurant.result (id_result, total_price, client_in_at, table_number, all_food) VALUES (?,?,?,?,?)";

      $stmt = $link->prepare($query);
      $stmt->bindValue(1, $result->getIdResult());
      $stmt->bindValue(2, $result->getTotalPrice());
      $stmt->bindValue(3, $result->getClientInAt());
      $stmt->bindValue(4, $result->getTableNumber());
      $stmt->bindValue(5, $result->getAllFood());

      try {
         $link->beginTransaction();
         if ($stmt->execute()) {
            $link->commit();
            $status = 1;
         } else {
            $link->rollBack();
         }

         $link = null;
         return $status;
      } catch (PDOException $error) {
         var_dump($error->errorInfo);
         return $status;
      }
   }
}
