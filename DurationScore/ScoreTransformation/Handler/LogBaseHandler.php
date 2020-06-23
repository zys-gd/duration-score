<?php


namespace ZYS\DurationScoreBundle\DurationScore\ScoreTransformation\Handler;


use ZYS\DurationScoreBundle\DurationScore\ScoreTransformation\ScoreTransformationInterface;
use ZYS\DurationScoreBundle\DurationScore\ScoreTransformation\ScoreTransformationMethod;

class LogBaseHandler implements ScoreTransformationInterface
{
    public function canHandle(string $method): bool
    {
        return $method === ScoreTransformationMethod::LOG_WITH_BASE;
    }

    /**
     * @param int $minutes
     *
     * @return int
     */
    public function transform(int $minutes): int
    {
        // TODO: Implement transform() method.
    }
}