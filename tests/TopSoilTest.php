<?php

declare(strict_types=1);

use App\TopSoil;
use PHPUnit\Framework\TestCase;

final class TopSoilTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testInvalidLengthWidthMeasurement(): void
    {
        $this->expectExceptionMessage('Invalid length/width measurement unit.');
        (new TopSoil())->setLengthWidthMeasurementUnit('kilometre');
    }

    /**
     * @throws Exception
     */
    public function testInvalidDepthMeasurement(): void
    {
        $this->expectExceptionMessage('Invalid depth measurement unit.');
        (new TopSoil())->setDepthMeasurementUnit('millimetre');
    }

    /**
     * @throws Exception
     */
    public function testSettingValidDimensions(): void
    {
        $topSoilObj = new TopSoil();
        $topSoilObj->setLengthWidthMeasurementUnit('feet');
        $topSoilObj->setDepthMeasurementUnit('centimetres');
        $topSoilObj->setDimensions(10, 20, 2);

        $this->assertSame(3.048, $topSoilObj->getLengthInMetres());
        $this->assertSame(6.096, $topSoilObj->getWidthInMetres());
        $this->assertSame(0.02, $topSoilObj->getDepthInMetres());
    }

    /**
     * @throws Exception
     */
    public function testReturnsValidTopSoilBags(): void
    {
        $topSoilObj = new TopSoil();
        $topSoilObj->setLengthWidthMeasurementUnit('metres');
        $topSoilObj->setDepthMeasurementUnit('centimetres');
        $topSoilObj->setDimensions(10, 11, 2.5);
        $topSoilObj->calculateBagsNeeded();

        $this->assertSame(4.0, $topSoilObj->getBagsNeeded());
    }

    /**
     * @throws Exception
     */
    public function testReturnsValidTopSoilBagCost(): void
    {
        $topSoilObj = new TopSoil();
        $topSoilObj->setLengthWidthMeasurementUnit('metres');
        $topSoilObj->setDepthMeasurementUnit('centimetres');
        $topSoilObj->setDimensions(10, 11, 2.5);
        $topSoilObj->calculateBagsNeeded();
        $topSoilObj->calculateTotalBagCost();

        $this->assertSame(288.0, $topSoilObj->getTotalBagCost());
        $this->assertSame('£288', $topSoilObj->getTotalBagCostWithCurrency());
    }
}
