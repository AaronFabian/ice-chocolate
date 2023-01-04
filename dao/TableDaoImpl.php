<?php

class TableDaoImpl
{
   public function addTableNumber(Table $table)
   {
      $status = 0;
      $link = PDOUtil::createConnection();
      $query = "INSERT INTO japan_restaurant.table (number, floor, row, connection_id, client_in_at, `column`) VALUES (?, ?, ?, ?, ?, ?)";
      $stmt = $link->prepare($query);
      $stmt->bindValue(1, $table->getNumber());
      $stmt->bindValue(2, $table->getFloor());
      $stmt->bindValue(3, $table->getRow());
      $stmt->bindValue(4, $table->getConnectionId());
      $stmt->bindValue(5, $table->getClientInAt());
      $stmt->bindValue(6, $table->getColumn());

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

   public function deleteTable($id)
   {
      $status = 0;
      $link = PDOUtil::createConnection();

      $query = "DELETE FROM japan_restaurant.table WHERE (connection_id= ?)";
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
         var_dump($error);
         return $status;
      }
   }
}

// TODO:: WEIRD why ``