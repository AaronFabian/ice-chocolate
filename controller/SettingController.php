<?php

class SettingController
{

   private $workerDaoImpl;

   public function __construct()
   {
      $this->workerDaoImpl = new WorkerDaoImpl();;
   }

   public function index()
   {
      $staffId = filter_input(INPUT_GET, 'staff');
      if (isset($staffId) and $staffId === $_SESSION['worker-id'] and $_SESSION['worker-role'] === 'manager') {

         $workerList = $this->workerDaoImpl->fetchAllWorkerList();

         include_once "./views/setting-view.php";
      } else {

         $worker = new Worker();
         $worker->setName($_SESSION['name']);
         $worker->setNik($_SESSION['nik']);
         $worker->setWorkerId($_SESSION['worker-id']);

         $profile = $this->workerDaoImpl->fetchWorker($worker);

         include_once "./views/bio-view.php";
      }
   }
}
