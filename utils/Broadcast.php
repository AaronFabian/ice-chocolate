<?php

class Broadcast
{
   public static function personalCast($from, $msg)
   {
      $from->send(json_encode(['connection' => $msg]));
   }

   public static function broadcastTable($from, $tableArr, $msg)
   {
      $from->send(json_encode(['ok' => $msg]));
      foreach ($tableArr as $table) {
         if ($table !== $from) {
            $table->send(['ok' => $msg]);
         }
      }
   }

   public static function tellStaff($printerArr, $msg)
   {
      foreach ($printerArr as $printer)
         $printer->send(json_encode(['menu' => $msg, 'ok' => true]));
   }

   public static function errorPersonalCast($from, $msg)
   {
      $from->send(json_encode(['error' => $msg]));
   }

   public static function isOk($from)
   {
      $from->send(json_encode(['success' => true]));
   }
}
