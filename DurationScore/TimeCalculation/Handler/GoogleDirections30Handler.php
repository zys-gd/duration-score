<?php


namespace ZYS\DurationScoreBundle\DurationScore\TimeCalculation\Handler;


use ZYS\DurationScoreBundle\DurationScore\TimeCalculation\TimeCalculationInterface;

class GoogleDirections30Handler implements TimeCalculationInterface
{
    const GOOGLE_DIRECTIONS_30 = 'google_directions_30';

    public function canHandle(string $algorithm): bool
    {
        return $algorithm === static::GOOGLE_DIRECTIONS_30;
    }

    public function calculate(string $homeCoordinates, string $workCoordinates): int
    {
        // TODO: Implement calculate() method.
    }
}