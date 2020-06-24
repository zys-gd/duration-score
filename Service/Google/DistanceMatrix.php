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
    public function __construct(string $googleEndpoint, string $googleApiKey)
    {
        $this->googleApiKey   = $googleApiKey;
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
        $query  = "origins=$origins&destinations=$destinations&language=en-EN&key=$this->googleApiKey";
        $client = HttpClient::createForBaseUri($this->googleEndpoint . "?$query");
        $data   = $client->request('GET', $this->googleEndpoint . "?$query");

        return $data->getContent();
    }
}