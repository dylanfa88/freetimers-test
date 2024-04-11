<?php

declare(strict_types=1);

namespace App;

use Exception;

class TopSoil
{
    private string $lengthWidthMeasurementUnit, $depthMeasurementUnit;
    private float $length, $width, $depth, $bagsNeeded, $totalBagCost;
    private float $topSoilBagCost = 72;
    private string $currency = '£';
    private array $validLengthWidthMeasurements = ['metres', 'feet', 'yards'];
    private array $validDepthMeasurements = ['centimetres', 'inches'];

    /**
     * Set the length measurement
     *
     * @param string $unit
     * @throws Exception
     */
    public function setLengthWidthMeasurementUnit(string $unit): void
    {
        if (!in_array($unit, $this->validLengthWidthMeasurements)) {
            throw new Exception('Invalid length/width measurement unit.');
        }
        $this->lengthWidthMeasurementUnit = $unit;
    }

    /**
     * Set the depth measurement
     *
     * @param string $unit
     * @throws Exception
     */
    public function setDepthMeasurementUnit(string $unit): void
    {
        if (!in_array($unit, $this->validDepthMeasurements)) {
            throw new Exception('Invalid depth measurement unit.');
        }
        $this->depthMeasurementUnit = $unit;
    }

    /**
     * Set the dimensions
     *
     * @param float $length
     * @param float $width
     * @param float $depth
     */
    public function setDimensions(float $length, float $width, float $depth): void
    {
        $this->length = $this->convertLengthWidthToMeters($length);
        $this->width  = $this->convertLengthWidthToMeters($width);
        $this->depth  = $this->convertDepthToMeters($depth);
    }

    public function calculateBagsNeeded(): void
    {
        $volume           = $this->calculateVolume();
        $this->bagsNeeded = ceil($volume * 1.4);
    }

    public function calculateTotalBagCost(): void
    {
        $this->totalBagCost = round($this->bagsNeeded * $this->topSoilBagCost, 2);
    }

    public function saveToDb()
    {

    }

    public function getLengthInMetres(): float
    {
        return $this->length;
    }

    public function getWidthInMetres(): float
    {
        return $this->width;
    }

    public function getDepthInMetres(): float
    {
        return $this->depth;
    }

    public function getBagsNeeded(): float
    {
        return $this->bagsNeeded;
    }

    public function getTotalBagCost(): float
    {
        return $this->totalBagCost;
    }

    public function getTotalBagCostWithCurrency(): string
    {
        return $this->currency . $this->totalBagCost;
    }

    private function convertLengthWidthToMeters(float $measurement): float
    {
        if ($this->lengthWidthMeasurementUnit === 'feet') {
            return $measurement * 0.3048;
        } elseif ($this->lengthWidthMeasurementUnit === 'yards') {
            return $measurement * 0.9144;
        }
        return $measurement;
    }

    private function convertDepthToMeters(float $measurement): float
    {
        if ($this->depthMeasurementUnit === 'centimetres') {
            return $measurement * 0.01;
        } elseif ($this->depthMeasurementUnit === 'inches') {
            return $measurement * 0.0254;
        }
        return $measurement;
    }

    private function calculateVolume(): float
    {
        return $this->length * $this->width * $this->depth;
    }

}
