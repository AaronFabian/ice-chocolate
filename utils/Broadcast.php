<?php

class Broadcast
{
   public static function broadcastTable($from, array $tablesArr, $msg)
   {
      $from->send(json_encode(['ok' => $msg]));
      foreach ($tablesArr as $table) {
         if ($table !== $from) {
            $table->send(['ok' => $msg]);
         }
      }
   }
}
