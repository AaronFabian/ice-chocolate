<?php


namespace MyApp;

include_once "./utils/PDOUtil.php";
include_once "./utils/Broadcast.php";

include_once "./controller/TableController.php";
include_once "./controller/PrinterController.php";
include_once "./controller/StaffController.php";
include_once "./dao/TableDaoImpl.php";
include_once "./dao/DocumentDaoImpl.php";
include_once "./dao/WorkerDaoImpl.php";
include_once "./dao/FoodDaoImpl.php";
include_once "./dao/TableConfigDaoImpl.php";
include_once "./models/Table.php";
include_once "./models/TableConfig.php";
include_once "./models/Document.php";
include_once "./models/Worker.php";

use Broadcast;
use PrinterController;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use StaffController;
use TableController;

class Chat implements MessageComponentInterface
{
   protected $user;
   protected $table;
   protected $staff;
   protected $printer;

   public function __construct()
   {
      $this->user = [];
      $this->table = [];
      $this->staff = [];
      $this->printer = [];
      echo "listening on port 8081...\n";
   }

   public function onOpen(ConnectionInterface $conn)
   {
      // Store the new connection to send messages to later
      $this->user[$conn->resourceId] = $conn;

      echo "New connection! ({$conn->resourceId})\n";
   }

   public function onMessage(ConnectionInterface $from, $msg)
   {
      $numRecv = count($this->user) - 1;
      echo "Connection $from->resourceId connected with $numRecv connection\n";
      $json = json_decode($msg);
      $data = $json->data;
      [$type, $user, $category] = explode('-', $json->request);

      /////////////////////////////////////
      ////// Routes
      if ($type === 'get') :
         switch ($category) {
            case 'connection':
               $this->table[$from->resourceId] = $from; // assign
               $tableController = new TableController();
               $tableController->routeTableConnection($data, $from->resourceId);
               Broadcast::personalCast($from, 'ok');
               break;
            case 'staffconnection':
               $this->staff[$from->resourceId] = $from;
               $staffController = new StaffController();
               $staffController->confirmConnection($data);
               Broadcast::personalCast($from, 'ok');
               break;
            case 'printerconnection':
               $this->printer[$from->resourceId] = $from;
               Broadcast::personalCast($from, 'ok');
               break;
            default:
               echo 'Route Err : category <on get>';
               break;
         }
      elseif ($type === 'post') :
         switch ($category) {
            case 'orderfood':
               $tableController = new TableController();
               $status = $tableController->postFood($data, $from->resourceId);
               if ($status)
                  Broadcast::tellStaff($this->printer, $data);
               else
                  echo "orderfood fail :( <on post>";
               break;
            case 'stafforderfood':
               $tableController = new TableController();
               $status = $tableController->staffPostFood($data, $from->resourceId);
               if ($status) {
                  Broadcast::tellStaff($this->printer, $data);
                  Broadcast::isOk($from);
               } else {
                  Broadcast::errorPersonalCast($from, 'err-number');
                  echo "orderfood fail :( <on post>\n";
               }
               break;
            default:
               echo "Route Err : category <on post>\n";
               break;
         }
      elseif ($type === 'update') :
         switch ($category) {
            case 'opentable':
               $tableController = new TableController();
               $status = $tableController->updateOpenTable($data, $from->resourceId);
               if ($status) {
                  Broadcast::castTo($this->table, $status);
                  Broadcast::isTableOk($from);
               } else {
                  Broadcast::errorTablePersonalCast($from, 'table not online');
               }
               break;
            default:
               echo "Route Err : Category <on update>\n";
               break;
         }
      else :
         echo "error : type\n";
      endif;
   }

   public function onClose(ConnectionInterface $conn)
   {
      $id = $conn->resourceId;

      if (isset($this->table[$id])) {
         $tableController = new TableController();
         $tableController->disconnectTable($id);
         unset($this->table[$id]);
      }

      if (isset($this->staff[$id])) {
         unset($this->table[$id]);
      }

      if (isset($this->printer[$id])) {
         $printerController = new PrinterController();
         $printerController->disconnectPrinter($id);
         unset($this->table[$id]);
      }

      unset($this->user[$id]);
      echo "Connection {$id} has disconnected\n";
   }

   public function onError(ConnectionInterface $conn, \Exception $e)
   {
      echo "An error has occurred: {$e->getMessage()}\n";

      $conn->close();
   }
}
