<?php


namespace ZYS\DurationScoreBundle\DurationScore\TimeCalculation;


interface TimeCalculationInterface
{
    /**
     * @param string $algorithm
     *
     * @return bool
     */
    public function canHandle(string $algorithm): bool;

    /**
     * @param string $homeCoordinates
     * @param string $workCoordinates
     *
     * @return int
     */
    public function calculate(
        string $homeCoordinates,
        string $workCoordinates
    ): int;
}