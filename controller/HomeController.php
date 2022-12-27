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

// $inpTableNumber = filter_input(INPUT_POST, "tableNumber");
// $inpPrinterNumber = filter_input(INPUT_POST, "printerNumber");

// if ($btnConfirm === "staff-view") {
//    header("Location: index.php?menu=staff-view&staff=$inpStaffNumber");
// } else if ($btnConfirm === 'client-view') {
//    header("Location: index.php?menu=client-view&table=$inpTableNumber");
// } else if ($btnConfirm === "printer-view") {
//    header("Location: index.php?menu=printer-view&printer=$inpPrinterNumber");
// } else if ($btnConfirm === "result-view" || $btnConfirm === "setting-view") {
//    $worker = new Worker();
//    $worker->setNik($_SESSION['nik']);
//    $worker->setWorkerId($_SESSION['worker-id']);

//    $validStaff = $this->workerDaoImpl->fetchWorkerIdAndNikAndRole($worker);
//    if ($validStaff) header("Location: index.php?menu=$btnConfirm");
//    exit;
// }