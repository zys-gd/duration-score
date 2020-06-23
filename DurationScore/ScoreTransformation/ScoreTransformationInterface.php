<?php


namespace ZYS\DurationScoreBundle\DurationScore\ScoreTransformation;


interface ScoreTransformationInterface
{
    public function canHandle(string $method): bool;

    /**
     * @param int $minutes
     */
    public function transform(int $minutes): int;
}