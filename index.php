<?php

require('vendor/autoload.php');

use App\TopSoil;

$topSoil = new TopSoil();
$topSoil->setLengthWidthMeasurementUnit('metres');
$topSoil->setDepthMeasurementUnit('centimetres');
$topSoil->setDimensions(10, 11, 2.5);
$topSoil->calculateBagsNeeded();
$topSoil->calculateTotalBagCost();
echo "<pre>bagsNeeded : ";
print_r($topSoil->getBagsNeeded());
echo "</pre>";

echo "<pre>bagCost : ";
print_r($topSoil->getTotalBagCostWithCurrency());
echo "</pre>";

