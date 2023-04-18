<?php

namespace Banking\Services\ApiRequest;

use Exception;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Banking\Services\Auth\BaasSignature;
use GuzzleHttp\Exception\ClientException;
use Banking\Services\Contracts\BaasableCommunication;


class BaasCommunication implements BaasableCommunication
{

    private $base_url = 'https://baas-pilot.choicebankapi.com';

    protected BaasSignature $baasSignature; // HTTP client object
    protected Client $client; // HTTP client object
    protected $url; // API endpoint URL
    protected $reqBody; // Request body data
    protected $response; // Response object
    protected $is_valid_reponse; // Response object


    public function __construct()
    {
        if (strcasecmp(config('baas.env_baas', 'sandbox'), 'production') == 0) {
            $this->base_url = 'https://baas.choicedigitalbank.com';
        }
        // Initialize HTTP client with base URI and timeout options
        $this->client = new Client([
            'base_uri' => $this->base_url,
            'timeout'  => 2.0,
        ]);
        $this->baasSignature = new BaasSignature();
    }

    /**
     * Sets the request body for the API call.
     *
     * @param mixed $body The request body data.
     */
    public function setBody($transactionId, $param)
    {
        $this->reqBody = $this->baasSignature->signedBody($transactionId, $param);
        return $this;
    }
    /**
     * Sets the URL for the API call.
     *
     * @param string $url The API endpoint URL.
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * Executes the API call with the specified parameters.
     *
     * @param string $method The HTTP method to use (default is POST).
     * @return mixed The response from the API call or an error message.
     */
    public function execute($method = 'POST')
    {
        try {
            // Make the API call using the HTTP client with JSON data and content type header
            $apiResponse = $this->client->request(
                $method,
                $this->url,
                [
                    'headers' => [
                        'Content-Type' => 'application/json',
                    ], 'json' => $this->reqBody,
                ]
            );
            $this->response = $apiResponse->getBody();
            $responData = json_decode($this->response);
            $isValid = $this->baasSignature->isValidateSignature($this->response);
            if ($responData->code != '00000') {
                $this->exception($responData->msg);
                return false;
            } else {
                return $this->responseBody();
            }
        } catch (ClientException $xe) {
            Log::info('Hhhh 4' . $isValid);
            // Handle exceptions and return false
            $this->exception($xe->getMessage());
            return false;
        }
    }

    /**
     * Returns the response body from the API call.
     *
     * @return mixed The response body from the API call.
     */
    public function responseBody()
    {
        return $this->response;
    }


    /**
     * Throws an exception with the error message from the API call.
     *
     * @param Exception $ex The exception object.
     */
    public function exception(string $message)
    {
        throw new Exception($message);
    }
}
