<?php

namespace Banking\Services\Traits;

use Exception;
use Illuminate\Support\Facades\Validator;
use Banking\Services\Account\BaasWalletTransaction;

trait BaasTransaction
{
    public function depositMpesaBaas($param)
    {


        $validator = Validator::make($param, [
            'account_id' => 'required',
            'phone_number' => 'required',
            'amount' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            throw new Exception(json_encode($validator->errors()->all()));
        }
        $baasTxn = new BaasWalletTransaction;
        return $baasTxn->deposit([
            'account_id' => $param['account_id'],
            'phone_number' => $param['phone_number'],
            'amount' => $param['amount'],

        ]);
    }
    // Aitime banking as Service Purchase
    public function purchaseAirtimeBaas($param)
    {
        $validator = Validator::make($param, [
            'account_id' => 'required',
            'network_provider' => 'required',
            'amount' => 'required|numeric',
            'purchase_type' => 'required',
        ]);
        if ($validator->failed()) {
            throw new Exception(json_encode($validator->errors()->all()));
        }
        $baasTxn = new BaasWalletTransaction;
        return $baasTxn->purchase([
            'account_id' => $param['account_id'],
            'network_provider' =>  $param['network_provider'],
            'amount' =>  $param['amount'],
            'purchase_type' =>  $param['purchase_type'],
        ]);
    }



    public function transferB2BBaas($param)
    {
        $validator = Validator::make($param, [
            'account_id' => 'required',
            'short_code' => 'required',
            'short_code_type' => 'required',
            'referen_number' => 'required',
            'amount' => 'required',
        ]);
        if ($validator->failed()) {
            throw new Exception(json_encode($validator->errors()->all()));
        }
        $baasTxn = new BaasWalletTransaction;
        return $baasTxn->payout([
            'account_id' => $param['account_id'],
            'payee_short_code' =>  $param['short_code'],
            'pay_type' =>  $param['short_code_type'],
            'referen_number' =>  $param['referen_number'],
            'amount' =>  $param['amount'],
            'description' =>  $param['description'],
        ]);
    }

    public function transactionStatusBaas($param)
    {

        $validator = Validator::make($param, [
            'txn_id' => 'required',
        ]);
        if ($validator->failed()) {
            throw new Exception(json_encode($validator->errors()->all()));
        }
        $baasTxn = new BaasWalletTransaction;
        return $baasTxn->transactionStatus([
            'txn_id' => $param['txn_id'],
        ]);
    }

    public function transactionQueryBaas($param)
    {
        $validator = Validator::make($param, [
            'txn_id' => 'required',
        ]);
        if ($validator->failed()) {
            throw new Exception(json_encode($validator->errors()->all()));
        }
        $baasTxn = new BaasWalletTransaction;
        return $baasTxn->transactionQuery([
            'txn_id' => $param['txn_id'],
        ]);
    }

    public function withdawBaas($param)
    {
    }
    public function payoutBaas($param)
    {
    }
    public function verifyTxnBaas($param)
    {
        $validator = Validator::make($param, [
            'txn_id' => 'required',
        ]);
        if ($validator->failed()) {
            throw new Exception(json_encode($validator->errors()->all()));
        }
        $baasTxn = new BaasWalletTransaction;
        return $baasTxn->approveTxn([
            'txn_id' => $param['txn_id'],
        ]);
    }
}
