<?php

class TableController
{

   private $tableDaoImpl;

   public function __construct()
   {
      $this->tableDaoImpl = new TableDaoImpl();
   }

   public function routeTableConnection(stdClass $data, $userId)
   {
      $newTable = new Table();
      $newTable->setNumber($data->table);
      $newTable->setFloor($data->table[0]);
      $newTable->setConnectionId($userId);

      $status = $this->tableDaoImpl->addTableNumber($newTable);
      echo $status ? "connection ok\n" : "connection failed\n";
      return $status;
   }

   public function disconnectTable($id)
   {
      $status = $this->tableDaoImpl->deleteTable($id);
      echo $status ? "table : $id disconnect\n" : "table : $id : error\n";
   }
}
