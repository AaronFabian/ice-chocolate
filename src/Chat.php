<?php


namespace MyApp;

include_once "./utils/PDOUtil.php";
include_once "./utils/Broadcast.php";

include_once "./controller/TableController.php";
include_once "./controller/PrinterController.php";
include_once "./dao/TableDaoImpl.php";
include_once "./dao/DocumentDaoImpl.php";
include_once "./models/Table.php";
include_once "./models/TableConfig.php";
include_once "./models/Document.php";

use Broadcast;
use PrinterController;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use TableController;

class Chat implements MessageComponentInterface
{
   private $tableController;


   protected $user;
   protected $table;
   protected $printer;

   public function __construct()
   {
      $this->user = [];
      $this->table = [];
      $this->printer = [];
      $this->tableController = new TableController();
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
      echo "Connection $from->resourceId connected with $numRecv connection";
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
            default:
               echo 'Route Err : category <on post>';
               break;
         }
      elseif ($type === 'update') :

      elseif ($type === 'delete') :

      else :
         echo "error : type\n";
      endif;
   }

   public function onClose(ConnectionInterface $conn)
   {
      $id = $conn->resourceId;

      if (isset($this->table[$id])) {
         $tableController = new TableController();
         $receipt = $tableController->disconnectTable($id);
         unset($this->table[$id]);
      }

      if (isset($this->printer[$id])) {
         $printerController = new PrinterController();
         $feedback = $printerController->disconnectPrinter($id);
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
