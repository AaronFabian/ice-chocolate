<?php

class DocumentDaoImpl
{
   public function fetchSummary($id)
   {
      $link = PDOUtil::createConnection();
      $query = "SELECT date_created, COUNT(food_name) AS appear, SUM(quantities) AS quantity_out, food_name, SUM(quantities * food.price) AS total_price, japan_restaurant.table.number, japan_restaurant.table.client_in_at FROM document INNER JOIN food ON (food.name = document.food_name) INNER JOIN japan_restaurant.table ON (japan_restaurant.table.connection_id = document.table_connection_id) WHERE table_connection_id= ? GROUP BY food_name";

      $stmt = $link->prepare($query);
      $stmt->bindParam(1, $id);
      $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Document');
      $stmt->execute();

      $link = null;
      return $stmt->fetchAll();
   }

   public function deleteDocument($id)
   {
      $status = 0;
      $link = PDOUtil::createConnection();

      $query = "DELETE FROM document WHERE table_connection_id= ?";
      $stmt = $link->prepare($query);
      $stmt->bindParam(1, $id);

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

   public function insertNewDocument(Document $document)
   {
      $status = 0;
      $link = PDOUtil::createConnection();

      $query = "INSERT INTO japan_restaurant.document (food_name, table_connection_id, worker_id, quantities) VALUES (?,?,?,?)";
      $stmt = $link->prepare($query);
      $stmt->bindValue(1, $document->getFoodName());
      $stmt->bindValue(2, $document->getTableConnectionId());
      $stmt->bindValue(3, $document->getWorkerId());
      $stmt->bindValue(4, $document->getQuantities());

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

   public static function printDocument($id, $data)
   {
      $status = 0;
      $filename = date('YmdHis') . $data[0]->getTable()->getNumber() . '.txt';
      if ($f = fopen($filename, 'wb')) {
         fwrite($f, json_encode($data));
         fclose($f);

         echo "Done";
      }

      return $status;
   }
}
