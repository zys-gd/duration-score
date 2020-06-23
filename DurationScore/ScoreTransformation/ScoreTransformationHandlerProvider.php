<?php


namespace ZYS\DurationScoreBundle\DurationScore\ScoreTransformation;


use ZYS\DurationScoreBundle\DurationScore\ScoreTransformation\Exception\HandlerNotFountException;

class ScoreTransformationHandlerProvider
{
    /**
     * @var ScoreTransformationInterface[]
     */
    private $handlers = [];

    /**
     * @param ScoreTransformationInterface $scoreTransformationHandler
     */
    public function addHandler(ScoreTransformationInterface $scoreTransformationHandler): void
    {
        $this->handlers[] = $scoreTransformationHandler;
    }

    /**
     * @param string $method
     *
     * @return ScoreTransformationInterface|null
     */
    public function get(string $method): ?ScoreTransformationInterface
    {
        foreach ($this->handlers as $scoreTransformationHandler) {
            if ($scoreTransformationHandler->canHandle($method)) {
                return $scoreTransformationHandler;
            }
        }

        throw new HandlerNotFountException();
    }
}