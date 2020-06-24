<?php


namespace ZYS\DurationScoreBundle\DurationScore\ScoreTransformation\Handler;


use ZYS\DurationScoreBundle\DurationScore\ScoreTransformation\ScoreTransformationInterface;

class LogBaseHandler implements ScoreTransformationInterface
{
    const LOG_WITH_BASE = 'log_with_base';

    public function canHandle(string $method): bool
    {
        return $method === static::LOG_WITH_BASE;
    }

    /**
     * @param int $minutes
     *
     * @return int
     */
    public function transform(int $minutes): int
    {
        if ($minutes >= 1) {
            return log($minutes, 2);
        }
        return 0;
    }
}