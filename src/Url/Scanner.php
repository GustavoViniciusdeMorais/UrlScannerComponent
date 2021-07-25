<?php
namespace Gustavo\Morais\Url;

class Scanner
{
    /**
     * @var array An array of URLs
     */
    protected $urls;

    /**
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * Constructor
     * @param array $urls An array of URLs to scan
     */
    public function __construct(array $urls)
    {
        $this->urls = $urls;
        $this->client = new \GuzzleHttp\Client();
    }

    /**
     * Get invalid URLs
     * @return array
     */
    public function validateUrls()
    {
        $invalidUrls = [];
        $statusCode = 200;

        foreach ($this->urls as $url) {
            try{
                $statusCode = $this->getStatusCodeFromUrl($url);
            } catch (\Exception $e){
                $statusCode = 500;
            }

            if($statusCode >= 400){
                array_push($invalidUrls, [
                    'url' => $url,
                    'status' => $statusCode
                ]);
            }
        }

        return $invalidUrls;
    }

    /**
     * Get HTTP Status from url
     * @param string $url The remote URL
     * @return int The HTTP status code
     */
    public function getStatusCodeFromUrl($url)
    {
        $response = $this->client->options($url);

        return $response->getStatusCode();
    }
}