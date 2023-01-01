<?php

class WorkerDaoImpl
{
   public function fetchWorkerIdAndPassword($id, $password)
   {
      $link = PDOUtil::createConnection();

      $query = "SELECT nik, name, worker_id, role AS worker_role FROM worker WHERE worker_id= ? AND password= ?";
      $stmt = $link->prepare($query);
      $stmt->bindParam(1, $id);
      $stmt->bindParam(2, $password);
      $stmt->setFetchMode(PDO::FETCH_OBJ);
      $stmt->execute();

      $link = null;
      return $stmt->fetchObject('Worker');
   }

   public function fetchWorkerIdAndNikAndRole(Worker $worker)
   {
      $link = PDOUtil::createConnection();

      $query = "SELECT name FROM worker WHERE worker_id= ? AND nik= ? AND role='manager'";
      $stmt = $link->prepare($query);
      $stmt->bindValue(1, $worker->getWorkerId());
      $stmt->bindValue(2, $worker->getNik());
      $stmt->setFetchMode(PDO::FETCH_OBJ);
      $stmt->execute();

      $link = null;
      return $stmt->fetchObject('Worker');
   }

   public function fetchAllWorkerList()
   {
      $link = PDOUtil::createConnection();

      $query = "SELECT worker_id, name FROM worker ORDER BY name ASC";
      $stmt = $link->prepare($query);
      $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Worker');
      $stmt->execute();

      $link = null;
      return $stmt->fetchAll();
   }

   public function fetchWorker(Worker $worker)
   {
      $link = PDOUtil::createConnection();

      $query = "SELECT * FROM worker WHERE worker_id= ? AND name= ? AND nik= ?";
      $stmt = $link->prepare($query);
      $stmt->bindValue(1, $worker->getWorkerId());
      $stmt->bindValue(2, $worker->getName());
      $stmt->bindValue(3, $worker->getNik());
      $stmt->setFetchMode(PDO::FETCH_OBJ);
      $stmt->execute();

      $link = null;
      return $stmt->fetchObject('Worker');
   }

   public function fetchWorkerWorkerId($id)
   {
      $link = PDOUtil::createConnection();

      $query = "SELECT * FROM worker WHERE worker_id= ?";
      $stmt = $link->prepare($query);
      $stmt->bindParam(1, $id);
      $stmt->setFetchMode(PDO::FETCH_OBJ);
      $stmt->execute();

      $link = null;
      return $stmt->fetchObject('Worker');
   }

   public function updateWorker(Worker $worker)
   {
      $status = 0;
      $link = PDOUtil::createConnection();

      $query = "UPDATE worker SET name= ? ,address= ? ,country= ?, city= ? WHERE nik= ? AND worker_id= ?";
      $stmt = $link->prepare($query);
      $stmt->bindValue(1, $worker->getName());
      $stmt->bindValue(2, $worker->getAddress());
      $stmt->bindValue(3, $worker->getCountry());
      $stmt->bindValue(4, $worker->getCity());
      $stmt->bindValue(5, $worker->getNik());
      $stmt->bindValue(6, $worker->getWorkerId());

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
