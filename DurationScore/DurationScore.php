<?php


namespace ZYS\DurationScoreBundle\DurationScore;


use ZYS\DurationScoreBundle\DurationScore\ScoreTransformation\Exception\HandlerNotFountException;
use ZYS\DurationScoreBundle\DurationScore\ScoreTransformation\ScoreTransformationHandlerProvider;
use ZYS\DurationScoreBundle\DurationScore\TimeCalculation\TimeCalculationHandlerProvider;

/**
 * Class DurationScore
 * @package ZYS\DurationScoreBundle\DurationScore
 */
class DurationScore implements DurationScoreInterface
{

    /**
     * @var ScoreTransformationHandlerProvider
     */
    private $scoreTransformation;
    /**
     * @var TimeCalculationHandlerProvider
     */
    private $timeCalculation;

    /**
     * DurationScore constructor.
     *
     * @param ScoreTransformationHandlerProvider $scoreTransformation
     * @param TimeCalculationHandlerProvider     $timeCalculation
     */
    public function __construct(
        ScoreTransformationHandlerProvider $scoreTransformation,
        TimeCalculationHandlerProvider $timeCalculation
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
    public function evaluate(
        string $homeCoordinates,
        string $workCoordinates,
        string $algorithm = '',
        string $transformationMethod = ''
    ): int
    {
        $calculationHandler = $this->timeCalculation->get($algorithm);
        $minutes            = $calculationHandler->calculate($homeCoordinates, $workCoordinates);

        try {
            $methodHandler = $this->scoreTransformation->get($transformationMethod);
            $score         = $methodHandler->transform($minutes);
        } catch (HandlerNotFountException $e) {
            $score = $minutes;
        }

        return $score;
    }
}