<?php

namespace fernandoebert\avisaApp;

use GuzzleHttp\Client;

/**
 *
 */
class AvisaApp
{
    /**
     * @var string
     */
    protected string $token;
    /**
     * @var string
     */
    protected string $version;

    /**
     * @param string $token
     * @param string $version
     */
    public function __construct(string $token, string $version = '')
    {
        $this->token = $token;
        $this->version = $version;
    }

    public function instance(): Instance
    {
        return new Instance($this->token, $this->version);
    }

    public function message(): Message
    {
        return new Message($this->token, $this->version);
    }

}
