<?php

class LoginController
{
   private $workerDaoImpl;

   public function __construct()
   {
      $this->workerDaoImpl = new WorkerDaoImpl();
   }

   public function index()
   {
      $btnLogin  = filter_input(INPUT_POST, "btnLogin");
      if (isset($btnLogin)) {
         $workerId = filter_input(INPUT_POST, "workerId");
         $password = filter_input(INPUT_POST, "password");

         $worker = $this->workerDaoImpl->fetchWorkerIdAndPassword($workerId, md5($password));

         if ($worker) {
            $_SESSION['web-user'] = true;
            $_SESSION['nik'] = $worker->getNik();
            $_SESSION['name'] = $worker->getName();
            $_SESSION['worker-role'] = $worker->getRole()->getWorkerRole();
            $_SESSION['worker-id'] = $worker->getWorkerId();

            header("Refresh:0 ;url=index.php?menu=home");
            exit;
         }
      }

      include_once './views/login-view.php';
   }
}
