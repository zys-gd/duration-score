<?php


namespace ZYS\DurationScoreBundle\DurationScore;


use ZYS\DurationScoreBundle\DurationScore\ScoreTransformation\ScoreTransformationInterface;
use ZYS\DurationScoreBundle\DurationScore\TimeCalculation\TimeCalculationInterface;

/**
 * Class DurationScore
 * @package ZYS\DurationScoreBundle\DurationScore
 */
class DurationScore implements DurationScoreInterface
{

    /**
     * @var ScoreTransformationInterface
     */
    private $scoreTransformation;
    /**
     * @var TimeCalculationInterface
     */
    private $timeCalculation;

    /**
     * DurationScore constructor.
     *
     * @param ScoreTransformationInterface $scoreTransformation
     * @param TimeCalculationInterface     $timeCalculation
     */
    public function __construct(
        ScoreTransformationInterface $scoreTransformation,
        TimeCalculationInterface $timeCalculation
    )
    {
        $this->scoreTransformation = $scoreTransformation;
        $this->timeCalculation     = $timeCalculation;
    }

    /**
     * @param string $homeCoordinates
     * @param string $workCoordinates
     * @param string $algorithm
     * @param string $transformationMethod
     *
     * @return int
     */
    public function calculate(
        string $homeCoordinates,
        string $workCoordinates,
        string $algorithm = 'straight',
        string $transformationMethod = ''
    ): int
    {
        // TODO: Implement calculate() method.
    }
}