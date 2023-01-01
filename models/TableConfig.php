<?php

class TableConfig
{
   private $floor;
   private $total_row;
   private $total_column;

   public function getFloor()
   {
      return $this->floor;
   }

   public function setFloor($floor)
   {
      $this->floor = $floor;
   }

   public function getTotalRow()
   {
      return $this->total_row;
   }

   public function setTotalRow($total_row)
   {
      $this->total_row = $total_row;
   }

   public function getTotalColumn()
   {
      return $this->total_column;
   }

   public function setTotalColumn($total_column)
   {
      $this->total_column = $total_column;
   }
}
