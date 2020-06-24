<?php


namespace ZYS\DurationScoreBundle\Service\Google;


use Symfony\Component\HttpClient\HttpClient;

class DistanceMatrix
{
    /**
     * @var string
     */
    private $googleApiKey;
    /**
     * @var HttpClient
     */
    private $client;
    /**
     * @var string
     */
    private $googleEndpoint;

    /**
     * DistanceMatrix constructor.
     *
     * @param string     $googleEndpoint
     * @param string     $googleApiKey
     * @param HttpClient $client
     */
    public function __construct(string $googleEndpoint, string $googleApiKey, HttpClient $client)
    {
        $this->googleApiKey   = $googleApiKey;
        $this->client         = $client;
        $this->googleEndpoint = $googleEndpoint;
    }

    /**
     * @param string $origins
     * @param string $destinations
     *
     * @return mixed
     */
    public function getDistance(string $origins, string $destinations)
    {
        $query = "origins=$origins&destinations=$destinations&language=en-EN&key=$this->googleApiKey";
        $data  = $this->client->createForBaseUri($this->googleEndpoint . "?$query");

        return $data = json_decode($data);
    }
}