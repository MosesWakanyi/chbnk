<?php

namespace Banking\Services\Traits;

use Exception;
use App\Models\User;
use Banking\Services\Account\BaasWallet;
use Illuminate\Support\Facades\Validator;

trait BaasAccount
{

    function baasAccount()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function openBaasAccount($param)
    {
        $validator = Validator::make($param, [
            'global_uuid' => 'required',
            'first_name' => 'required',
            'gender' => 'required',
            'country_code' => 'required',
            'phone_number' => 'required',
            'id_type' => 'required',
            'id_number' => 'required',
            'dob' => 'required',
            'request_id' => 'required'
        ]);
        if ($validator->fails()) {
            throw new Exception(json_encode($validator->messages()));
        }
        $baasWallet = new BaasWallet;
        return $baasWallet->create([
            'id' => $param['global_uuid'],
            'first_name' =>  $param['first_name'],
            'middle_name' =>  $param['middle_name'],
            'last_name' =>  $param['last_name'],
            'gender' =>  $param['gender'],
            'country_code' => $param['country_code'],
            'phone_number' => $param['phone_number'],
            'idType' => $param['id_type'],
            'idNumber' =>  $param['id_number'],
            'dob' =>  $param['dob'],
            'request_id' => $param['request_id'],
        ]);
    }
    public function upgradeBaasAccount($param)
    {

        $validator = Validator::make($param, [
            'kra_pin' => 'required',
            'front_side' => 'required',
            'back_side' => 'required',
            'selfie_photo' => 'required',
            'global_uuid' => 'required',
            'request_id' => 'required'
        ]);
        if ($validator->fails()) {
            throw new Exception(json_encode($validator->messages()));
        }
        $baasWallet = new BaasWallet;
        return $baasWallet->upgrade([
            'id' => $param['global_uuid'],
            'kraPin' =>  $param['kra_pin'],
            'frontSidePhoto' =>  $param['front_side'],
            'backSidePhoto' =>  $param['back_side'],
            'selfiePhoto' =>  $param['selfie_photo'],
            'request_id' => $param['request_id'],
        ]);
    }

    function queryOboardingStatus($param)
    {
        $validator = Validator::make($param, [
            'global_uuid' => 'required',
            'phone_number' => 'required',
            'request_id' => 'required'
        ]);
        if ($validator->fails()) {
            throw new Exception(json_encode($validator->messages()));
        }
        $baasWallet = new BaasWallet;
        return $baasWallet->onboardingStatus([
            'id' => $param['global_uuid'],
            'phone_number' => $param['phone_number'],
            'onboarding_id' => $param['onboarding_id'],
            'request_id' => $param['request_id'],
        ]);
    }
    function queryAccountDetail($param)
    {
        $validator = Validator::make($param, [
            'account_id' => 'required',
            'request_id' => 'required'
        ]);
        if ($validator->fails()) {
            throw new Exception(json_encode($validator->messages()));
        }
        $baasWallet = new BaasWallet;
        return $baasWallet->retrieve([
            'id' => $param['account_id'],
            'request_id' => $param['request_id'],
        ]);
    }
    function transactionForAccount($param)
    {
        $validator = Validator::make($param, [
            'account_id' => 'required',
            'request_id' => 'required'
        ]);
        if ($validator->fails()) {
            throw new Exception(json_encode($validator->messages()));
        }
        $baasWallet = new BaasWallet;
        return $baasWallet->cancel([
            'id' => $param['account_id'],
            'request_id' => $param['request_id'],
        ]);
    }
    public function cancelAccount($param)
    {
        $validator = Validator::make($param, [
            'account_id' => 'required',
            'request_id' => 'required'
        ]);
        if ($validator->fails()) {
            throw new Exception(json_encode($validator->messages()));
        }
        $baasWallet = new BaasWallet;
        return $baasWallet->cancel([
            'id' => $param['account_id'],
            'request_id' => $param['request_id'],
        ]);
    }

    public function verifyAccount($param)
    {
        $validator = Validator::make($param, [
            'onboard_type' => 'required',
            'onboarding_id' => 'required',
            'code' => 'required',
            'request_id' => 'required'

        ]);
        if ($validator->fails()) {
            throw new Exception(json_encode($validator->messages()));
        }
        $baasWallet = new BaasWallet;
        return $baasWallet->verify([
            'onboard_type' => $param['onboard_type'],
            'onboarding_id' => $param['onboarding_id'],
            'code' => $param['code'],
            'request_id' => $param['request_id'],
        ]);
    }
    public function resendVerify($param)
    {
        $validator = Validator::make($param, [
            'onboard_type' => 'required',
            'onboarding_id' => 'required',
            'request_id' => 'required'
        ]);
        if ($validator->fails()) {
            throw new Exception(json_encode($validator->messages()));
        }
        $baasWallet = new BaasWallet;
        return $baasWallet->resendOtp([
            'onboard_type' => $param['onboard_type'],
            'onboarding_id' => $param['onboarding_id'],
            'request_id' => $param['request_id'],
        ]);
    }
}
