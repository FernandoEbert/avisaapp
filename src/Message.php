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
     * @param array|null $options
     */
    public function __construct(string $token, array $options = null)
    {
        parent::__construct($token, $options);
    }

    /**
     * @throws Exception
     */
    public function send(
        string $number,
        string $message,
        array $file = null
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

        $dataSend = [
            "numero" => $number,
            "mensagem" => $message
        ];
        $endpoint = "actions/sendMessage";

        if ($file){
            $dataSend['urlFile']    = $file['urlFile'];
            $dataSend['type']       = $file['type'];
            $dataSend['fileName']   = $file['fileName'];
            $endpoint = "actions/sendMedia";
        }

        $send = $this->post($endpoint, $dataSend);

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