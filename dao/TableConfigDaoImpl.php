<?php

class TableConfigDaoImpl
{
   public function fetchTableConfig($floor)
   {
      $link = PDOUtil::createConnection();

      $query = "SELECT * FROM table_config WHERE floor = ?";
      $stmt = $link->prepare($query);
      $stmt->bindParam(1, $floor);
      $stmt->setFetchMode(PDO::FETCH_OBJ);
      $stmt->execute();

      $link = null;
      return $stmt->fetchObject('TableConfig');
   }

   public function saveTableConfig(TableConfig $tableConfig)
   {
      $status = 0;
      $link = PDOUtil::createConnection();

      $query = "INSERT INTO table_config (floor, total_row, total_column) VALUES (?,?,?)";
      $stmt = $link->prepare($query);
      $stmt->bindValue(1, $tableConfig->getFloor());
      $stmt->bindValue(2, $tableConfig->getTotalRow());
      $stmt->bindValue(3, $tableConfig->getTotalColumn());

      try {
         $link->beginTransaction();
         if ($stmt->execute()) {
            $link->commit();
            $status = 1;
         } else {
            $link->rollBack();
         }
         return $status;
      } catch (PDOException $error) {
         if (str_contains('PRIMARY', $error->getMessage()))
            return $status;
      }
   }

   public function updateTableConfig(TableConfig $tableConfig)
   {
      $status = 0;
      $link = PDOUtil::createConnection();

      $query = "UPDATE table_config SET total_row= ?, total_column= ? WHERE (floor= ?);";
      $stmt = $link->prepare($query);
      $stmt->bindValue(1, $tableConfig->getTotalRow());
      $stmt->bindValue(2, $tableConfig->getTotalColumn());
      $stmt->bindValue(3, $tableConfig->getFloor());

      try {
         $link->beginTransaction();
         if ($stmt->execute()) {
            $link->commit();
            $status = 1;
         } else {
            $link->rollBack();
         }
         return $status;
      } catch (PDOException $error) {
         if (str_contains('PRIMARY', $error->getMessage()))
            return $status;
      }
   }
}
