<?php

namespace fernandoebert\avisaApp;

use fernandoebert\avisaApp\Sender;
use GuzzleHttp\Exception\GuzzleException;
use Exception;

/**
 *
 */
class Message extends Sender
{

    /**
     * @type int
     */
    const NOT_WHATSAPP = 100;
    /**
     * @type int
     */

    const EMPTY_MESSAGE = 102;

    /**
     * @type int
     */
    const NOT_SEND_MESSAGE = 103;

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
    public function send(
        string $number,
        string $message
    ): bool
    {
        try {

            $number = $this->checkNumber($number);
            if (!$number->success){
                throw new Exception("Number not use whatsapp", $this::NOT_WHATSAPP);
            }

        } catch (Exception $e){
            throw new Exception("Number not use whatsapp", $this::NOT_WHATSAPP);
        }

        $number = $number->numero_formatado;
        
        if (empty($message)){
            throw new Exception("Message is empty, please check your message", $this::EMPTY_MESSAGE);
        }
        
        $send = $this->post("actions/sendMessage", [
            "numero" => $number,
            "mensagem" => $message
        ]);

        if (isset($send->error)){
            throw new Exception($send->error, $this::NOT_SEND_MESSAGE);
        }

        return true;
    }


    /**
     * @param string $number
     * @return mixed|object
     * @throws Exception
     */
    protected function checkNumber(string $number)
    {
        try {
            return $this->post("actions/checknumber", [
                "numero" => $number
            ]);
        } catch (Exception $e){
            throw new Exception($e->getMessage());
        } catch (GuzzleException $e) {
            throw new Exception($e->getMessage());
        }
    }
    
}