<?php

namespace Banking\Services\Contracts;

/**
 * The BaasDigitalSignature interface defines the methods for performing digital signatures on banking transactions.
 */
interface BaasDigitalSignature
{
    /**
     * Generates a digital signature for a given transaction.
     *
     * @param string $transactionId The ID of the transaction to be signed
     * @param array $params Additional parameters required for signature generation.
     * @return mixed The generated digital signature.
     */
    public function signedBody(string $transactionId, array $params = []);

    /**
     * Validates a digital signature for a given transaction.
     *
     * @param string $transactionId The ID of the transaction to be validated.
     * @param string $sign The digital signature to be validated.
     * @return bool Whether the digital signature is valid or not.
     */
    public function isValidateSignature(string $sign): bool;

    /**
     * Stores a digital signature for a given transaction.
     *
     * @param string $transactionId The ID of the transaction to be stored.
     * @return bool Whether the digital signature was successfully stored or not.
     */
    public function store(string $transactionId): bool;

    /**
     * Retrieves a digital signature for a given transaction.
     *
     * @param string $transactionId The ID of the transaction to retrieve the signature for.
     * @return string The digital signature for the given transaction.
     */
    public function retrieve(string $transactionId): string|null;
}
