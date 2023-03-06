<?php

namespace Banking\Services\Contracts;


/**
 * The BaasableCommunication interface defines the methods for communicating with a BaaS system.
 */
interface BaasableCommunication
{
    /**
     * Returns the request body for the API call.
     *
     * @return mixed The request body for the API call.
     */
    public function setBody(string $transactionId, string $params);

    /**
     * Returns the response body from the API call.
     *
     * @return mixed The response body from the API call.
     */
    public function responseBody();

    /**
     * Returns the setUrl for the API call.
     *
     * @return mixed The  setUrl for the API call.
     */
    public function setUrl(string $url);
    /**
     * Executes the API call with the specified parameters.
     *
     * @return mixed The response from the API call or an error message.
     */
    public function execute($method = '');

    /**
     * Returns the exception, if any, from the API call.
     *
     * @return mixed The exception from the API call or null if there is no exception.
     */
    public function exception(string $ex);
}
