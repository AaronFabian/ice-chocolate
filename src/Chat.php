<?php


namespace MyApp;

include_once "./utils/PDOUtil.php";
include_once "./utils/Broadcast.php";

include_once "./controller/TableController.php";
include_once "./dao/TableDaoImpl.php";
include_once "./models/Table.php";
include_once "./models/TableConfig.php";

use Broadcast;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use TableController;

class Chat implements MessageComponentInterface
{
   private $tableController;


   protected $user;
   protected $table;

   public function __construct()
   {
      $this->user = [];
      $this->table = [];
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
      echo sprintf(
         'Connection %d sending message "%s" to %d other connection%s' . "\n",
         $from->resourceId,
         $msg,
         $numRecv,
         $numRecv == 1 ? '' : 's'
      );
      $json = json_decode($msg);
      $data = $json->data;
      [$type, $user, $category] = explode('-', $json->request);

      /////////////////////////////////////
      ////// Routes
      if ($type === 'request') :
         switch ($category) {
            case 'connection':
               $this->table[$from->resourceId] = $from;
               $tableController = new TableController();
               $tableController->routeTableConnection($data, $from->resourceId);
               Broadcast::broadcastTable($from, $this->table, $msg);
               break;
            default:
               echo 'Error : category <on request>';
               break;
         }
      elseif ($type === 'post') :

      elseif ($type === 'update') :

      elseif ($type === 'delete') :

      else :
         echo "error : type\n";
      endif;
   }

   public function onClose(ConnectionInterface $conn)
   {
      // The connection is closed, remove it, as we can no longer send it messages
      if (isset($this->table[$conn->resourceId])) {
         $tableController = new TableController();
         $tableController->disconnectTable($conn->resourceId);
      }

      unset($this->user[$conn->resourceId]);

      echo "Connection {$conn->resourceId} has disconnected\n";
   }

   public function onError(ConnectionInterface $conn, \Exception $e)
   {
      echo "An error has occurred: {$e->getMessage()}\n";

      $conn->close();
   }
}
