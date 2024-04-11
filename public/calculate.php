<?php

require '../vendor/autoload.php';

use App\TopSoil;

// request parameters
$lengthWidthUnit = $_REQUEST['length_width_unit'];
$depthUnit = $_REQUEST['depth_unit'];
$length = $_REQUEST['length'];
$width = $_REQUEST['width'];
$depth = $_REQUEST['depth'];

// calculate
$topSoil = new TopSoil();
$topSoil->setLengthWidthMeasurementUnit($lengthWidthUnit);
$topSoil->setDepthMeasurementUnit($depthUnit);
$topSoil->setDimensions($length, $width, $depth);
$topSoil->calculateBagsNeeded();
$topSoil->calculateTotalBagCost();
//$topSoil->saveToDb();

$data = [
    'status' => 'ok',
    'data' => [
        'bags_needed' => $topSoil->getBagsNeeded(),
        'cost' => $topSoil->getTotalBagCost(),
        'cost_with_currency' => $topSoil->getTotalBagCostWithCurrency(),
    ]
];

header('Content-type: application/json');
echo json_encode($data);