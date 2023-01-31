<?php

class ResultController
{
   private $resultDaoImpl;

   public function __construct()
   {
      $this->resultDaoImpl = new ResultDaoImpl();
   }

   public function index()
   {
      $staffId = filter_input(INPUT_GET, 'staff');
      if (isset($staffId) and $staffId === $_SESSION['worker-id'] and $_SESSION['worker-role'] === 'manager') :

         $resultId = filter_input(INPUT_GET, 'res'); // result Id
         if (isset($resultId)) {

            $detailResult = $this->resultDaoImpl->fetchDetailResult($resultId);

            include_once "./views/result-detail-view.php";
         } else {
            $result = $this->resultDaoImpl->fetchAllResult();
            include_once "./views/result-view.php";
         }
      else :
         header('Location: index.php');
      endif;
   }
}
