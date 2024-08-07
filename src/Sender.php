<?php

namespace fernandoebert\avisaApp;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

/**
 *
 */
abstract class Sender
{
    /**
     * @var string
     */
    protected string $token;
    /**
     * @var Client|null
     */
    protected \GuzzleHttp\Client $client;

    /**
     * @var string
     */
    protected string $baseUrl;

    private ?array $options;

    /**
     * @param string $token
     * @param array|null $options
     * @param Client|null $client
     */
    public function __construct(string $token, array $options = null, \GuzzleHttp\Client $client = null)
    {
        if (!$client instanceof \GuzzleHttp\Client){
            $client = new Client();
        }
        $this->client = $client;
        $this->token = $token;
        $this->options = $options;

        $version = 2;
        if (isset($this->options['version'])){
            $version = $this->options['version'];
        }
        $version = $this->version($version);

        $this->baseUrl = "https://www.avisaapp.com.br/api{$version}";
    }

    /**
     * @param string $endpoint
     * @param array|null $headers
     * @return object|mixed
     * @throws Exception
     */
    public function get(
        string $endpoint,
        ?array $headers = []
    ): ?object
    {
        try {

            $headers = array_merge(["Authorization" => "Bearer {$this->token}"], $headers);

            if (filter_var($endpoint, FILTER_VALIDATE_URL)){
                throw new Exception('Your variable $endpoint is URL');
            }

            $response = $this->client->request( "GET", "{$this->baseUrl}/{$endpoint}", [
                "headers" => $headers
            ]);

            return json_decode($response->getBody()->getContents());

        } catch (GuzzleException $e){

            $response = json_decode($e->getResponse()->getBody()->getContents());
            throw new Exception($response->error);

        } catch (Exception $e){

            throw new Exception($e->getMessage());

        }

    }

    /**
     * @param string $endpoint
     * @param array|null $content
     * @param array|null $headers
     * @return object|mixed
     * @throws Exception
     */
    public function post(
        string $endpoint,
        ?array $content,
        ?array $headers = []
    ): ?object
    {
        try {

            $headers = array_merge([
                "Authorization" => "Bearer {$this->token}",
                "Content-Type" => "application/json",
            ], $headers);

            $content = json_encode($content);

            $response = $this->client->request( "POST", "{$this->baseUrl}/{$endpoint}", [
                "headers" => $headers,
                "body" => $content
            ]);

            return json_decode($response->getBody()->getContents());

        } catch (GuzzleException $e){

            $response = json_decode($e->getResponse()->getBody()->getContents());
            throw new Exception($response->error);

        } catch (Exception $e){

            throw new Exception($e->getMessage());

        }

    }

    protected function version(int $version = 2): string
    {
        if (!isset(AvisaApp::AVISAAPP_VERSION[$version])){
            return AvisaApp::AVISAAPP_VERSION[2];
        } else {
            return AvisaApp::AVISAAPP_VERSION[$version];
        }
    }

}
