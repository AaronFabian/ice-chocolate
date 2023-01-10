<?php

class Document
{
   private $document_id;
   private $date_created;
   private $food_name;
   private $table_connection_id;
   private $worker_id;
   private $quantities;

   private $table;

   private $quantity_out;
   private $total_price;
   private $appear;

   public function getDocumentId()
   {
      return $this->document_id;
   }

   public function setDocumentId($document_id)
   {
      $this->document_id = $document_id;
   }

   public function getDateCreated()
   {
      return $this->date_created;
   }

   public function setDateCreated($date_created)
   {
      $this->date_created = $date_created;
   }

   public function getFoodName()
   {
      return $this->food_name;
   }

   public function setFoodName($food_name)
   {
      $this->food_name = $food_name;
   }

   public function getTableConnectionId()
   {
      return $this->table_connection_id;
   }

   public function setTableConnectionId($table_connection_id)
   {
      $this->table_connection_id = $table_connection_id;
   }

   public function getWorkerId()
   {
      return $this->worker_id;
   }

   public function setWorkerId($worker_id)
   {
      $this->worker_id = $worker_id;
   }

   public function getQuantities()
   {
      return $this->quantities;
   }

   public function setQuantities($quantities)
   {
      $this->quantities = $quantities;
   }

   public function getNumber()
   {
      if (!isset($this->table)) {
         $this->table = new Table();
      }

      return $this->table;
   }

   public function setNumber($table)
   {
      $this->table = $table;
   }

   public function getClientInAt()
   {
      if (!isset($this->table)) {
         $this->table = new Table();
      }

      return $this->table;
   }

   public function setClientInAt($table)
   {
      $this->table = $table;
   }

   public function getQuantityOut()
   {
      return $this->quantity_out;
   }

   public function setQuantityOut($quantity_out)
   {
      $this->quantity_out = $quantity_out;
   }

   public function getTotalPrice()
   {
      return $this->total_price;
   }

   public function setTotalPrice($total_price)
   {
      $this->total_price = $total_price;
   }

   public function getAppear()
   {
      return $this->appear;
   }

   public function setAppear($appear)
   {
      $this->appear = $appear;
   }

   public function getTable()
   {
      return $this->table;
   }

   public function setTable($table)
   {
      $this->table = $table;
   }

   public function __set($name, $value)
   {
      if (!isset($this->table)) {
         $this->table = new Table();
      }

      switch ($name) {
         case 'number':
            $this->table->setNumber($value);
            break;
         case 'client_in_at':
            $this->table->setClientInAt($value);
            break;
      }
   }
}
