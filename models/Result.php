<?php

class Result
{
   private $id_result;
   private $total_price;
   private $client_in_at;
   private $client_out_at;
   private $table_number;
   private $all_food; // will containt large string of ordered food (JSON)
   private $timeline;
   private $dayname;

   private $year;
   private $month;
   private $date;
   private $day;

   private $result;

   public function getResult()
   {
      return $this->result;
   }

   public function setResult($result)
   {
      $this->result = $result;
   }

   public function getDayname()
   {
      return $this->dayname;
   }

   public function setDayname($dayname)
   {
      $this->dayname = $dayname;
   }

   public function getDay()
   {
      return $this->day;
   }

   public function setDay($day)
   {
      $this->day = $day;
   }

   public function getDate()
   {
      return $this->date;
   }

   public function setDate($date)
   {
      $this->date = $date;
   }

   public function getMonth()
   {
      return $this->month;
   }

   public function setMonth($month)
   {
      $this->month = $month;
   }

   public function getYear()
   {
      return $this->year;
   }

   public function setYear($year)
   {
      $this->year = $year;
   }

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

   public function getTimeline()
   {
      return $this->timeline;
   }

   public function setTimeline($timeline)
   {
      $this->timeline = $timeline;
   }
}
