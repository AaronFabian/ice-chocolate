<?php

include_once "../utils/Ajax.php";

function getTableConfiguration() {
   $tableObj = new Ajax();
   $tableObj = $tableObj->fetchFloor();

   if (!$tableObj) return false;

   $tableData = [
      "floor" => $tableObj->getFloor(),
      "row" => $tableObj->getTotalRow(),
      "column" => $tableObj->getTotalColumn()
   ];

   return $tableData;
}

echo json_encode(getTableConfiguration());
