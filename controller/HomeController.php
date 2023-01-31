<?php

class HomeController
{
   private $workerDaoImpl;

   public function __construct()
   {
      $this->workerDaoImpl = new WorkerDaoImpl();
   }

   public function index()
   {
      include_once "./views/home-view.php";
   }
}
