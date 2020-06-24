<?php


namespace ZYS\DurationScoreBundle\DurationScore\TimeCalculation\Handler;


use ZYS\DurationScoreBundle\DurationScore\TimeCalculation\TimeCalculationInterface;

class GoogleDirectionsHandler implements TimeCalculationInterface
{
    const GOOGLE_DIRECTIONS = 'google_directions';

    public function canHandle(string $algorithm): bool
    {
        return $algorithm === static::GOOGLE_DIRECTIONS;
    }

    public function calculate(string $homeCoordinates, string $workCoordinates): int
    {
        // TODO: Implement calculate() method.
    }
}