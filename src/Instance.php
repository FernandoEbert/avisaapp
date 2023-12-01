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
     * @param array|null $options
     */
    public function __construct(string $token, array $options = null)
    {
        parent::__construct($token, $options);
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
