<?php

include_once "../utils/Ajax.php";

$foodData = [];
$foodObj = new Ajax();
foreach ($foodObj->fetchFood() as $food)
   $foodData[] = [$food->getFoodName(), $food->getImage()];

echo json_encode(['status' => 'success', 'data' => $foodData]);
