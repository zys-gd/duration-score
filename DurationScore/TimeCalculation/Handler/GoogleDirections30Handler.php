<?php


namespace ZYS\DurationScoreBundle\DurationScore\TimeCalculation\Handler;


use ZYS\DurationScoreBundle\DurationScore\TimeCalculation\TimeCalculationInterface;
use ZYS\DurationScoreBundle\Service\Google\DistanceMatrix;
use ZYS\DurationScoreBundle\Service\Google\DistanceSimplifier;

class GoogleDirections30Handler implements TimeCalculationInterface
{
    const GOOGLE_DIRECTIONS_30 = 'google_directions_30';
    const SPEED                = 30;

    /**
     * @var DistanceMatrix
     */
    private $distanceMatrix;
    /**
     * @var DistanceSimplifier
     */
    private $distanceSimplifier;

    /**
     * GoogleDirectionsHandler constructor.
     *
     * @param DistanceMatrix     $distanceMatrix
     * @param DistanceSimplifier $distanceSimplifier
     */
    public function __construct(DistanceMatrix $distanceMatrix, DistanceSimplifier $distanceSimplifier)
    {
        $this->distanceMatrix     = $distanceMatrix;
        $this->distanceSimplifier = $distanceSimplifier;
    }

    public function canHandle(string $algorithm): bool
    {
        return $algorithm === static::GOOGLE_DIRECTIONS_30;
    }

    public function calculate(string $homeCoordinates, string $workCoordinates): int
    {
        $distanceMatrix = $this->distanceMatrix->getDistance($homeCoordinates, $workCoordinates);
        $data           = $this->distanceSimplifier->convert($distanceMatrix);

        return round($data['distance'] / static::SPEED);
    }
}