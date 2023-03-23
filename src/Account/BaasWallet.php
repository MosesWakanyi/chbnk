<?php

namespace Banking\Services\Account;

use Banking\Services\Contracts\BaasableWallet;
use Banking\Services\ApiRequest\BaasCommunication;


// Define the BaasWallet class that extends BaasCommunication and implements BaasableWallet
class BaasWallet extends BaasCommunication implements BaasableWallet
{
    // Define the create method that takes an array of parameters, and submits an onboarding request
    public function create($param = [])
    {
        // Define the request parameters
        $req = [
            'userId' => $param['id'],
            'firstName' =>  $param['first_name'],
            'middleName' =>  $param['middle_name'],
            'lastName' =>  $param['last_name'],
            'gender' =>  $param['gender'],
            'countryCode' =>  $param['country_code'],
            'mobile' => $param['phone_number'],
            'idType' => $param['idType'],
            'idNumber' => $param['idNumber'],
            'birthday' => $param['dob'],
        ];

        // Set the request body with a random string prefix and the request parameters
        return $this->setBody($param['request_id'], $req)
            ->setUrl('/onboarding/submitEasyOnboardingRequest')
            ->execute();
    }

    // Define the verify method that takes an array of parameters, and verifies the user's identity
    public function verify($param = [])
    {
        // This method has not been implemented yet
        // Define the request parameters
        $req = [
            'onboardType' => $param['onboard_type'],
            'onboardingRequestId' =>  $param['onboarding_id'],
            'code' =>  $param['code'],
        ];
        // Set the request body with a random string prefix and the request parameters
        return $this->setBody($param['request_id'], $req)
            ->setUrl('/sms/onboarding/confirmOnboardingRequest')
            ->execute();
    }
    // Define the verify method that takes an array of parameters, and verifies the user's identity
    public function resendOtp($param = [])
    {
        // This method has not been implemented yet
        // Define the request parameters
        $req = [
            'onboardType' => $param['onboard_type'],
            'onboardingRequestId' =>  $param['onboarding_id'],
        ];
        // Set the request body with a random string prefix and the request parameters
        return $this->setBody($param['request_id'], $req)
            ->setUrl('/sms/onboarding/resendOnboardSms')
            ->execute();
    }


    // Define the upgrade method that takes an array of parameters, and upgrades the user's account
    public function upgrade($param = [])
    {
        // Define the request parameters
        $req = [
            'userId' => $param['id'],
            'kraPin' =>  $param['kra_pin'],
            'frontSidePhoto' =>  $param['front_side'],
            'backSidePhoto' =>  $param['back_side'],
            'selfiePhoto' =>  $param['selfie_photo'],
        ];

        // Set the request body with a random string prefix and the request parameters
        return $this->setBody($param['request_id'], $req)
            ->setUrl('/onboarding/walletAccountUpgrade')
            ->execute();
    }

    // Define the cancel method that takes an array of parameters, and cancels the user's request
    public function cancel($param = [])
    {
        // This method has not been implemented yet
    }

    // Define the onboardingStatus method that takes an array of parameters, and retrieves the user's onboarding status
    public function onboardingStatus($param)
    {
        // Define the request parameters
        $req = [
            'userId' => $param['id'],
            'mobile' =>  $param['phone_number'],
            'onboardingRequestId' =>  $param['onboarding_id'],
        ];

        // Set the request body with a random string prefix and the request parameters
        return $this->setBody($param['request_id'], $req)
            ->setUrl('/onboarding/getOnboardingStatus')
            ->execute();
    }

    // Define the retrieve method that takes an array of parameters, and retrieves the user's account information


    public function retrieve($param = [])
    {
        // Define the request parameters
        $req = [
            'accountId' => $param['id']
        ];
        return $this->setBody($param['request_id'], $req)
            ->setUrl('/query/getAccountDetails')
            ->execute();
    }
}
