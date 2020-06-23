<?php


namespace ZYS\DurationScoreBundle\DurationScore\TimeCalculation;


use ZYS\DurationScoreBundle\DurationScore\TimeCalculation\Handler\StraightAlgorithmHandler;

class TimeCalculationHandlerProvider
{
    /**
     * @var TimeCalculationInterface[]
     */
    private $handlers = [];
    /**
     * @var StraightAlgorithmHandler
     */
    private $timeCalculationDefaultHandler;

    /**
     * TimeCalculationHandlerProvider constructor.
     *
     * @param TimeCalculationInterface $timeCalculationDefaultHandler
     */
    public function __construct(TimeCalculationInterface $timeCalculationDefaultHandler)
    {
        $this->timeCalculationDefaultHandler = $timeCalculationDefaultHandler;
    }

    /**
     * @param TimeCalculationInterface $timeCalculationHandler
     */
    public function addHandler(TimeCalculationInterface $timeCalculationHandler): void
    {
        $this->handlers[] = $timeCalculationHandler;
    }

    /**
     * @param string $algorithm
     *
     * @return TimeCalculationInterface|null
     */
    public function get(string $algorithm): ?TimeCalculationInterface
    {
        foreach ($this->handlers as $timeCalculationHandler) {
            if ($timeCalculationHandler->canHandle($algorithm)) {
                return $timeCalculationHandler;
            }
        }

        return $this->timeCalculationDefaultHandler;
    }
}