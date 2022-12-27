<?php

class StaffController
{
   private $workerDaoImpl;
   private $foodDaoImpl;

   public function __construct()
   {
      $this->workerDaoImpl = new WorkerDaoImpl();
      $this->foodDaoImpl = new FoodDaoImpl();
   }

   public function index()
   {
      $staffNumber = filter_input(INPUT_GET, 'staff');
      if ($staffNumber and $staffNumber == $_SESSION['worker-id']) :

         $category = $this->foodDaoImpl->fetchCategory();
         $defaultMenu = $this->foodDaoImpl->fetchFoodPerCategory('whisky');

         include_once "./views/staff-view.php";
      else :
         header('Location: index.php?menu=home');
         exit;
      endif;
   }
}
