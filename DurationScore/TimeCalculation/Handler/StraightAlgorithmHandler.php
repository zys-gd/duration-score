<?php


namespace ZYS\DurationScoreBundle\DurationScore\TimeCalculation\Handler;


use ZYS\DurationScoreBundle\DurationScore\TimeCalculation\TimeCalculationAlgorithm;
use ZYS\DurationScoreBundle\DurationScore\TimeCalculation\TimeCalculationInterface;

class StraightAlgorithmHandler implements TimeCalculationInterface
{

    public function canHandle(string $algorithm): bool
    {
        return $algorithm === TimeCalculationAlgorithm::STRAIGHT;
    }

    public function calculate(string $homeCoordinates, string $workCoordinates): int
    {
        // TODO: Implement calculate() method.
    }
}