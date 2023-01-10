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

   public static function castTo($tableArr, $msg)
   {
      $tableArr[$msg]->send(json_encode(['table' => 'open confirmed']));
   }

   public static function isOk($from)
   {
      $from->send(json_encode(['success' => true]));
   }

   public static function errorTablePersonalCast($from)
   {
      $from->send(json_encode(['tableErr' => 'error']));
   }

   public static function isTableOk($from)
   {
      $from->send(json_encode(['tableOk' => 'table open success']));
   }
}
