<?php


namespace ZYS\DurationScoreBundle\DurationScore\TimeCalculation\Handler;


use ZYS\DurationScoreBundle\DurationScore\TimeCalculation\TimeCalculationInterface;

class StraightAlgorithmHandler implements TimeCalculationInterface
{
    const STRAIGHT = 'straight';

    public function canHandle(string $algorithm): bool
    {
        return $algorithm === static::STRAIGHT;
    }

    public function calculate(string $homeCoordinates, string $workCoordinates): int
    {
        // TODO: Implement calculate() method.
    }
}