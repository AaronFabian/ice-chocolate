<?php

class PrinterController
{
   public function __construct()
   {
   }

   public function index()
   {
      $btnConfirm = filter_input(INPUT_POST, 'btnConfirm');
      $printerId = filter_input(INPUT_POST, 'printerNumber');
      if ($printerId) {
         include_once "./views/printer-view.php";
      } else {
         header("Refresh: 0; url=index.php?printererror");
      }
   }

   public function disconnectPrinter($id)
   {
      echo "printer id : $id disconnected ok \xe2\x9c\xa8\n";
   }
}
