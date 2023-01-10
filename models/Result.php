<?php

class Result
{
   private $id_result;
   private $total_price;
   private $client_in_at;
   private $client_out_at;
   private $table_number;
   private $all_food; // will containt large string of ordered food

   public function getIdResult()
   {
      return $this->id_result;
   }

   public function setIdResult($id_result)
   {
      $this->id_result = $id_result;
   }

   public function getTotalPrice()
   {
      return $this->total_price;
   }

   public function setTotalPrice($total_price)
   {
      $this->total_price = $total_price;
   }

   public function getClientInAt()
   {
      return $this->client_in_at;
   }

   public function setClientInAt($client_in_at)
   {
      $this->client_in_at = $client_in_at;
   }

   public function getClientOutAt()
   {
      return $this->client_out_at;
   }

   public function setClientOutAt($client_out_at)
   {
      $this->client_out_at = $client_out_at;
   }

   public function getTableNumber()
   {
      return $this->table_number;
   }

   public function setTableNumber($table_number)
   {
      $this->table_number = $table_number;
   }

   public function getAllFood()
   {
      return $this->all_food;
   }

   public function setAllFood($all_food)
   {
      $this->all_food = $all_food;
   }
}
