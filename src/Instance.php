<?php

namespace fernandoebert\avisaApp;

use GuzzleHttp\Exception\GuzzleException;
use \Exception;

/**
 *
 */
class Instance extends Sender
{

    /**
     * @param string $token
     */
    public function __construct(string $token)
    {
        parent::__construct($token);
    }

    /**
     * @throws Exception
     */
    public function info()
    {
        try {
            return $this->get("instance/status");
        } catch (\Exception $e){
            throw new Exception($e->getMessage());
        } catch (GuzzleException $e) {
            throw new Exception($e->getMessage());
        }

    }

}