<?php

class Table
{
   private $number;
   private $max_person;
   private $row;
   private $column;
   private $floor;
   private $connected_at;
   private $client_in_at;
   private $connection_id;

   public function getNumber()
   {
      return $this->number;
   }

   public function setNumber($number)
   {
      $this->number = $number;
   }

   public function getMaxPerson()
   {
      return $this->max_person;
   }

   public function setMaxPerson($max_person)
   {
      $this->max_person = $max_person;
   }

   public function getRow()
   {
      return $this->row;
   }

   public function setRow($row_p)
   {
      $this->row = $row_p;
   }

   public function getColumn()
   {
      return $this->column;
   }

   public function setColumn($column_p)
   {
      $this->column = $column_p;
   }

   public function getFloor()
   {
      if (!isset($this->floor)) {
         $this->floor = new TableConfig();
      }

      return $this->floor;
   }

   public function setFloor($floor)
   {
      $this->floor = $floor;
   }

   public function getConnectedAt()
   {
      return $this->connected_at;
   }

   public function setConnectedAt($connected_at)
   {
      $this->connected_at = $connected_at;
   }

   public function getClientInAt()
   {
      return $this->client_in_at;
   }

   public function setClientInAt($client_in_at)
   {
      $this->client_in_at = $client_in_at;
   }

   public function getConnectionId()
   {
      return $this->connection_id;
   }

   public function setConnectionId($connection_id)
   {
      $this->connection_id = $connection_id;
   }

   public function __set($name, $value)
   {

      if (!isset($this->floor)) {
         $this->floor = new TableConfig();
      }

      switch ($name) {
         case 'floor':
            $this->floor->setFloor($value);
      }
   }
}
