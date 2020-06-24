<?php


namespace ZYS\DurationScoreBundle\DurationScore\TimeCalculation\Handler;


use ZYS\DurationScoreBundle\DurationScore\TimeCalculation\TimeCalculationInterface;
use ZYS\DurationScoreBundle\Service\StraightDistance;

class StraightAlgorithmHandler implements TimeCalculationInterface
{
    const STRAIGHT = 'straight';
    const SPEED    = 30;

    /**
     * @var StraightDistance
     */
    private $straightDistance;

    public function __construct(StraightDistance $straightDistance)
    {
        $this->straightDistance = $straightDistance;
    }

    public function canHandle(string $algorithm): bool
    {
        return $algorithm === static::STRAIGHT;
    }

    public function calculate(string $homeCoordinates, string $workCoordinates): int
    {
        [$lat1, $lon1] = explode(',', $homeCoordinates);
        [$lat2, $lon2] = explode(',', $workCoordinates);
        $distance = $this->straightDistance->distance($lat1, $lon1, $lat2, $lon2);

        return round($distance / static::SPEED);
    }
}