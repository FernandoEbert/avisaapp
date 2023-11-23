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
     * @param string $token
     */
    public function __construct(string $token)
    {
        $this->token = $token;
    }

    public function instance(): Instance
    {
        return new Instance($this->token);
    }

    public function message(): Message
    {
        return new Message($this->token);
    }

}