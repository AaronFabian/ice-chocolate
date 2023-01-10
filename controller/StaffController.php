<?php

class StaffController
{
   private $workerDaoImpl;
   private $foodDaoImpl;
   private $tableConfigDaoImpl;

   public function __construct()
   {
      $this->workerDaoImpl = new WorkerDaoImpl();
      $this->foodDaoImpl = new FoodDaoImpl();
      $this->tableConfigDaoImpl = new TableConfigDaoImpl();
   }

   public function index()
   {
      $staffNumber = filter_input(INPUT_GET, 'staff');
      if ($staffNumber and $staffNumber == $_SESSION['worker-id']) :

         $category = $this->foodDaoImpl->fetchCategory();
         $defaultMenu = $this->foodDaoImpl->fetchFoodPerCategory('whisky');
         $defaultTableConfig = $this->tableConfigDaoImpl->fetchTableConfig(1);

         include_once "./views/staff-view.php";
      else :
         header('Location: index.php?menu=home');
         exit;
      endif;
   }

   public function confirmConnection(stdClass $data)
   {
      $staffId = $data->staffId;
      $status = $this->workerDaoImpl->fetchWorkerWorkerId($staffId);

      echo $status ? "staff Id: $staffId confirmed ok \xe2\x9c\xa8\n"  : "staff unknown !\n";
   }
}
