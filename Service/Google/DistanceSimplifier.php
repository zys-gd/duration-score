<?php


namespace ZYS\DurationScoreBundle\Service\Google;


use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class DistanceSimplifier
{
    /**
     * @param string $data
     *
     * @return float[]|int[]
     */
    public function convert(string $data)
    {
        try {
            $data     = json_decode($data);
            $time     = 0;
            $distance = 0;

            foreach ($data->rows[0]->elements as $road) {
                $time     += $road->duration->value;
                $distance += $road->distance->value;
            }

            return [
                'time'     => $time / 60, // minutes
                'distance' => $distance / 1000 // km
            ];
        } catch (\Throwable $e) {
            throw new BadRequestException();
        }
    }
}