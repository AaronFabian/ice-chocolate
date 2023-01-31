<?php

class ResultDaoImpl
{
   public function fetchAllResult()
   {
      $link = PDOUtil::createConnection();

      // TODO: pagination and category feauture not yet working !
      $query = "SELECT id_result, total_price, client_in_at, client_out_at, table_number,(SELECT SUM(total_price) FROM result) AS result FROM japan_restaurant.result ORDER BY client_out_at DESC LIMIT 10 OFFSET 0;";
      $stmt = $link->prepare($query);
      $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Result');
      $stmt->execute();

      $link = null;
      return $stmt->fetchAll();
   }

   public function fetchDetailResult($id)
   {
      $link = PDOUtil::createConnection();

      $query = "SELECT * FROM japan_restaurant.result WHERE id_result= ?";
      $stmt = $link->prepare($query);
      $stmt->bindParam(1, $id);
      $stmt->setFetchMode(PDO::FETCH_OBJ);
      $stmt->execute();

      $link = null;
      return $stmt->fetchObject('Result');
   }

   public function insertNewResult(Result $result)
   {
      $link = PDOUtil::createConnection();

      $query = "INSERT INTO japan_restaurant.result (id_result, total_price, client_in_at, table_number, all_food, timeline) VALUES (?,?,?,?,?,?);";

      $stmt = $link->prepare($query);
      $stmt->bindValue(1, $result->getIdResult());
      $stmt->bindValue(2, $result->getTotalPrice());
      $stmt->bindValue(3, $result->getClientInAt());
      $stmt->bindValue(4, $result->getTableNumber());
      $stmt->bindValue(5, $result->getAllFood());
      $stmt->bindValue(6, $result->getTimeline());

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
