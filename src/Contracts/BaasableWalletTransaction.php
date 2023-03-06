<?php

namespace Banking\Services\Contracts;

/**
 * This is the interface for a Baasable wallet transaction. 
 * Any class implementing this interface must provide implementations for all the defined methods.
 */
interface BaasableWalletTransaction
{

    /**
     * Deposit funds into the wallet.
     * 
     * @param mixed $param A parameter used in the deposit process.
     * @return void
     */
    public function deposit($param);

    /**
     * Withdraw funds from the wallet.
     * 
     * @param mixed $param A parameter used in the payout process.
     * @return void
     */
    public function payout($param);

    /**
     * Make a purchase using funds from the wallet.
     * 
     * @param mixed $param A parameter used in the purchase process.
     * @return void
     */
    public function purchase($param);

    /**
     * Make a purchase using funds from the wallet.
     * 
     * @param mixed $param A parameter used in the transfer process.
     * @return void
     */
    public function transfer($param);

    /**
     * Verify a transaction.
     * 
     * @param mixed $param A parameter used in the transaction verification process.
     * @return void
     */
    public function approveTxn($param);

    /**
     * Get the status of a transaction.
     * 
     * @param mixed $param A parameter used in the transaction status process.
     * @return void
     */
    public function transactionStatus($param);

    /**
     * Query transactions.
     * 
     * @param mixed $param A parameter used in the transaction query process.
     * @return void
     */
    public function transactionQuery($param);
}
