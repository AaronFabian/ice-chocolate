<?php

class TableController
{

   private $documentDaoImpl;
   private $tableDaoImpl;

   public function __construct()
   {
      $this->documentDaoImpl = new DocumentDaoImpl();
      $this->tableDaoImpl = new TableDaoImpl();
   }

   public function routeTableConnection(stdClass $data, $tableId)
   {
      $newTable = new Table();
      $newTable->setNumber($data->table);
      $newTable->setFloor($data->table[0]);
      $newTable->setColumn($data->table[1]);
      $newTable->setRow($data->table[2]);
      $newTable->setConnectionId($tableId);
      $newTable->setClientInAt(date("Y M d H:i:s"));

      $status = $this->tableDaoImpl->addTableNumber($newTable);
      echo $status ? "table id : $tableId connection ok\n" : "$tableId connection failed\n";
      return $status;
   }

   public function disconnectTable($id)
   {
      // TODO: summary status nonfunction
      $summaryStatus = $this->documentDaoImpl->fetchSummary($id);
      var_dump($summaryStatus);
      $deleteDocument = $this->documentDaoImpl->deleteDocument($id);
      $status = $this->tableDaoImpl->deleteTable($id);

      // logs
      echo $summaryStatus ? "table id : $id summary ok\xe2\x9c\xa8\n" : "table id : $id summary error or data not found\n";
      echo $deleteDocument ? "table id : $id delete document ok\xe2\x9c\xa8\n" : "table id : $id delete error\n";
      echo $status ? "table id : $id disconnected ok\xe2\x9c\xa8\n" : "table id : $id : disconnect error\n";

      return $summaryStatus;
   }

   public function postFood(stdClass $data, $tableId)
   {
      $status = 0;
      $counter = 0;
      $seat = $data->seat;
      $newDocument = new Document();
      $newDocument->setWorkerId($data->connectedId);
      $newDocument->setTableConnectionId($tableId);
      foreach ($data->menuList as $key => $quantity) {
         $newDocument->setFoodName($key);
         $newDocument->setQuantities($quantity);
         $insertStatus = $this->documentDaoImpl->insertNewDocument($newDocument);
         if ($insertStatus) {
            $status = 1;
            ++$counter;
         } else {
            break;
         }
      }

      // logs
      echo $status ? "table No : $seat all document inserted ok \xe2\x9c\xa8\n" : "table No : $seat insert document error at counter -> $counter";

      return $status;
   }
}
