<?php

class TableController
{

   private $documentDaoImpl;
   private $tableDaoImpl;
   private $resultDaoImpl;

   public function __construct()
   {
      $this->documentDaoImpl = new DocumentDaoImpl();
      $this->tableDaoImpl = new TableDaoImpl();
      $this->resultDaoImpl = new ResultDaoImpl();
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
      $containerData = [];
      $summaryReceipt = $this->documentDaoImpl->fetchSummary($id);
      $resultStatus = false;
      if ($summaryReceipt) {
         foreach ($summaryReceipt as $i => $s) {
            if ($i === 0) {
               $containerData['clientInAt'] = $s->getTable()->getClientInAt();
               $containerData['number'] = $s->getTable()->getNumber();
            }

            $containerData['foodCollection'][] = [
               'date' => $s->getDateCreated(),
               'foodName' => $s->getFoodName(),
               'quantityOut' => $s->getQuantityOut(),
               'appear' => $s->getAppear(),
               'price' => $s->getTotalPrice(),
            ];

            if (!isset($containerData['sumAllPrice'])) $containerData['sumAllPrice'] = 0;
            $containerData['sumAllPrice'] += $s->getTotalPrice();
         }

         $newResult = new Result();
         $newResult->setidResult(uniqid());
         $newResult->setTotalPrice($containerData['sumAllPrice']);
         $newResult->setClientInAt($containerData['clientInAt']);
         $newResult->setTableNumber($containerData['number']);
         $newResult->setAllFood(json_encode($containerData['foodCollection']));
         $resultStatus = $this->resultDaoImpl->insertNewResult($newResult);
      }

      $deleteDocument = $this->documentDaoImpl->deleteDocument($id);
      $status = $this->tableDaoImpl->deleteTable($id);

      // logs
      echo $summaryReceipt ? "table id : $id summary ok\xe2\x9c\xa8\n" : "table id : $id summary error or data not found\n";
      echo $resultStatus ? "table id : $id result ok\xe2\x9c\xa8\n" : "table id : $id result error will not create result summary\n";
      echo $deleteDocument ? "table id : $id delete document ok\xe2\x9c\xa8\n" : "table id : $id delete error\n";
      echo $status ? "table id : $id disconnected ok\xe2\x9c\xa8\n" : "table id : $id : disconnect error\n";

      return $summaryReceipt;
   }

   public function postFood(stdClass $data, $tableId)
   {
      $status = 0;
      $counter = 0;
      $seat = $data->seat;
      $newDocument = new Document();
      $newDocument->setWorkerId($data->connectedId);
      $newDocument->setTableConnectionId($tableId);

      foreach ($data->menuList as $key => [$quantity, $src]) {
         $newDocument->setFoodName($key);
         $newDocument->setQuantities($quantity);
         $insertStatus = $this->documentDaoImpl->insertNewDocument($newDocument);

         if ($insertStatus) {
            $status = 1;
            $counter++;
         } else {
            break;
         }
      }

      // logs
      echo $status ? "table No : $seat all($counter) document inserted ok \xe2\x9c\xa8\n" : "table No : $seat insert document error at counter -> $counter\n";

      return $status;
   }

   public function staffPostFood(stdClass $data, $staffId)
   {
      // check if table availble
      $table = new Table();
      $table->setNumber($data->seat);

      $isTable = $this->tableDaoImpl->fetchTableInfo($table);

      // if available use id from checked table to insert the ordered food
      if ($isTable) {
         $tableId = $isTable->getConnectionId();
         return $this->postFood($data, $tableId);
      } else {
         echo "fail to insert document. table not found !\n";
         return 0;
      }
   }

   public function updateOpenTable(stdClass $data)
   {
      $table = new Table();
      $table->setNumber($data->seat);

      $isTableOnline = $this->tableDaoImpl->fetchTableInfo($table);

      if ($isTableOnline) return $isTableOnline->getConnectionId();
      else return 0;
   }

   public function checkout(stdClass $data)
   {
      return $this->updateOpenTable($data);
   }
}
