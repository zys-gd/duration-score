<?php


namespace ZYS\DurationScoreBundle\DurationScore\ScoreTransformation\Handler;


use ZYS\DurationScoreBundle\DurationScore\ScoreTransformation\ScoreTransformationInterface;

class EvenDistributionHandler implements ScoreTransformationInterface
{
    const EVEN_DISTRIBUTION = 'even_distribution';
    const GROUND_ZERO       = 30; // minutes

    public function canHandle(string $method): bool
    {
        return $method === static::EVEN_DISTRIBUTION;
    }

    /**
     * @param int $minutes
     *
     * @return int
     */
    public function transform(int $minutes): int
    {
        if ($minutes >= static::GROUND_ZERO) {
            return 100;
        }

        return round(($minutes / static::GROUND_ZERO) * 100);
    }
}