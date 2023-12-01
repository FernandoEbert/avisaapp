<?php

namespace fernandoebert\avisaApp;

use GuzzleHttp\Client;

/**
 *
 */
class AvisaApp
{

    const AVISAAPP_VERSION = [
        1 => "",
        2 => "/v2"
    ];

    /**
     * @var string
     */
    protected string $token;

    private ?array $options;

    /**
     * @param string $token
     * @param array|null $options
     */
    public function __construct(string $token, array $options = null)
    {
        $this->token = $token;
        $this->options = $options;
    }

    public function instance(): Instance
    {
        return new Instance($this->token, $this->options);
    }

    public function message(): Message
    {
        return new Message($this->token, $this->options);
    }

}
