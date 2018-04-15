<?php
/**
 * Created by PhpStorm.
 * User: eyurkin
 * Date: 14.04.2018
 * Time: 15:29
 */

namespace App\Http\Services\Rbc\Query\ResponseParser;


abstract class AbstractResponseParser
{

    protected $response;

    public function __construct($response)
    {
        $this->response = $response;
        $this->parseResponse();
    }

    abstract protected function parseResponse();

    abstract public function getResult();

    protected function decodeResponse()
    {
        $decodedResponse = json_decode($this->response, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            $decodedResponse = [];
        }
        $this->response = $decodedResponse;
    }
}