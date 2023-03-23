<?php

namespace Banking\Services\Account;

use Banking\Services\ApiRequest\BaasCommunication;
use Banking\Services\Contracts\BaasableWalletTransaction;

/**
 * This class implements the BaasableWalletTransaction interface and provides methods for depositing and withdrawing funds from a wallet using a BaaS communication API.
 */
class BaasWalletTransaction extends BaasCommunication implements BaasableWalletTransaction
{

    /**
     * Deposit funds into the wallet using the BaaS communication API.
     * 
     * @param mixed $param A parameter used in the deposit process.
     * @return mixed The response from the API.
     */
    public function deposit($param)
    {
        // TODO: Implement the deposit process using the BaaS communication API.
        return $this->setBody($param['request_id'], [
            'accountId' => $param['account_id'],
            'mobile' =>  $param['phone_number'],
            'amount' =>  $param['amount'],
        ])->setUrl('/trans/depositFromMpesa')
            ->execute();
    }

    /**
     * Withdraw funds from the wallet using the BaaS communication API.
     * 
     * @param mixed $param A parameter used in the withdrawal process.
     * Can be B2B
     * @return void
     */
    public function payout($param)
    {
        // TODO: Implement the withdrawal process using the BaaS communication API.
        return $this->setBody($param['request_id'], [
            'payerAccountId' => $param['account_id'],
            'payeeShortCode' =>  $param['payee_short_code'],
            'payeeReferenNumber' =>  $param['referen_number'],
            'payType' =>  $param['pay_type'],
            'amount' =>  $param['amount'],
            'description' =>  $param['description'],
        ])->setUrl('/trans/applyForMpesaBusinessTransfer')
            ->execute();
    }

    /**
     * Make a purchase using funds from the wallet using the BaaS communication API.
     * 
     * @param mixed $param A parameter used in the purchase of utilities.
     * @return void
     */
    public function purchase($param)
    {
        // TODO: Implement the purchase process using the BaaS communication API.
        return $this->setBody($param['request_id'], [
            'accountId' => $param['account_id'],
            'networkProvider' =>  $param['network_provider'],
            'amount' =>  $param['amount'],
        ])->setUrl('/utilityPayment/airtimePayment')
            ->execute();
    }

    /**
     * Withdraw funds from the wallet using the BaaS communication API.
     * 
     * @param mixed $param A parameter used in the transfer process.
     * @return void
     */
    public function transfer($param)
    {
        // TODO: Implement the transfer process using the BaaS communication API.
        return $this->setBody($param['request_id'], [
            'payerAccountId' => $param['account_id'],
            'payeeBankCode' => $param['payee_bank_code'],
            'payeeAccountId' => $param['payee_account_id'],
            'payeeType' =>  $param['payee_type'],
            'payeeAccountName' =>  $param['payee_account_name'],
            'currency' =>  $param['currency'],
            'amount' =>  $param['amount'],
        ])->setUrl('/trans/applyForTransfer')
            ->execute();
    }
    /**
     * Verify a transaction using the BaaS communication API.
     * 
     * @param mixed $param A parameter used in the transaction verification process.
     * @return void
     */
    public function approveTxn($param)
    {
        // TODO: Implement the transaction verification process using the BaaS communication API.
    }

    /**
     * Get the status of a transaction using the BaaS communication API.
     * 
     * @param mixed $param A parameter used in the transaction status process.
     * @return void
     */
    public function transactionStatus($param)
    {
        // TODO: Implement the transaction status process using the BaaS communication API.
        return $this->setBody($param['request_id'], ['txId' => $param['txn_id']])
            ->setUrl('/query/getTransResult')
            ->execute();
    }

    /**
     * Query transactions using the BaaS communication API.
     * 
     * @param mixed $param A parameter used in the transaction query process.
     * @return void
     */
    public function transactionQuery($param)
    {
        // TODO: Implement the transaction query process using the BaaS communication API.
        return $this->setBody($param['request_id'], ['txId' => $param['txn_id']])
            ->setUrl('/query/getTransResult')
            ->execute();
    }
}
