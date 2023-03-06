<?php

namespace Banking\Services\Contracts;


interface BaasableIPN
{
    /**
     * Method to receive the IPN data
     * 
     * @param array $param The IPN data as an string
     * @return void
     */
    public function receive(string $data);

    /**
     * Method to consume the IPN data
     * 
     * @param array $param The IPN data as an array
     * @return void
     */
    public function consume(string $data);

    /**
     * Method to distribute the IPN data to appropriate recipients
     * 
     * @param array $param The IPN data as an array
     * @return void
     */
    public function distribute(string $data);

    /**
     * Method to verify the authenticity of the IPN data
     * 
     * @param array $param The IPN data as an array
     * @return bool Whether the IPN data is valid or not
     */
    public function verify(string $data);
}
