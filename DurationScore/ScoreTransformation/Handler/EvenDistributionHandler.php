<?php


namespace ZYS\DurationScoreBundle\DurationScore\ScoreTransformation\Handler;


use ZYS\DurationScoreBundle\DurationScore\ScoreTransformation\ScoreTransformationInterface;
use ZYS\DurationScoreBundle\DurationScore\ScoreTransformation\ScoreTransformationMethod;

class EvenDistributionHandler implements ScoreTransformationInterface
{

    public function canHandle(string $method): bool
    {
        return $method === ScoreTransformationMethod::EVEN_DISTRIBUTION;
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