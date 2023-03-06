<?php

namespace Banking\Services\Contracts;

/**
 * The BaasableWallet interface defines the methods for managing wallets in a BaaS system.
 */
interface BaasableWallet
{
    /**
     * Creates a new wallet with the specified parameters.
     *
     * @param array $param An array of parameters required for creating the wallet.
     * @return mixed The created wallet object or an error message.
     */
    public function create($param = []);

    /**
     * Verifies the authenticity of a wallet using the specified parameters.
     *
     * @param array $param An array of parameters required for verifying the wallet.
     * @return mixed The verification status of the wallet or an error message.
     */
    public function resendOtp($param = []);

    /**
     * Verifies the authenticity of a wallet using the specified parameters.
     *
     * @param array $param An array of parameters required for verifying the wallet.
     * @return mixed The verification status of the wallet or an error message.
     */
    public function verify($param = []);

    /**
     * Upgrades a wallet with the specified parameters.
     *
     * @param array $param An array of parameters required for upgrading the wallet.
     * @return mixed The upgraded wallet object or an error message.
     */
    public function upgrade($param = []);

    /**
     * Cancels a wallet with the specified parameters.
     *
     * @param array $param An array of parameters required for canceling the wallet.
     * @return mixed The cancellation status of the wallet or an error message.
     */
    public function cancel($param = []);

    /**
     * Retrieves a wallet with the specified parameters.
     *
     * @param array $param An array of parameters required for retrieving the wallet.
     * @return mixed The retrieved wallet object or an error message.
     */
    public function retrieve($param = []);

    /**
     * getAccountStatus a wallet with the specified parameters.
     *
     * @param array $param An array of parameters required for retrieving the wallet.
     * @return mixed The getAccountStatus wallet object or an error message.
     */
    public function onboardingStatus($param);
}
