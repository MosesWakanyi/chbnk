<?php

use Banking\Services\ApiRequest\BaasCommunication;
use GuzzleHttp\Client;
use Banking\Services\Auth\BaasSignature;
use Banking\Services\Contracts\BaasableIPN;

/**A class that implements the BaasableIPN interface and handles incoming IPN notifications.

It verifies the authenticity of the data using the BaasSignature class and

processes the data by calling the consume or distribute methods depending on the use case.
 */
class BaasableIPNListener extends BaasCommunication implements BaasableIPN
{
    /*

The HTTP client used to send requests to the BaaS server.
@var Client
*/
    private $client;
    /**The BaasSignature instance used to verify the authenticity of the IPN data.
@var BaasSignature
     */
    private $baasSignature;
    /**

     *Creates a new instance of the BaasableIPNListener class.
     *Initializes the HTTP client with base URI and timeout options.
     */
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => "",
            'timeout' => 2.0,
        ]);
        $this->baasSignature = new BaasSignature();
    }
    /**

     *Processes the incoming IPN notification data.
     *Verifies the authenticity of the data using the BaasSignature instance.
     *Calls either the consume or distribute method to process the data, depending on the use case.
     *@param string $response The IPN notification data.
     */
    public function receive(string $response)
    {
        $data = (array)json_decode($response, true);
        $notifyType = $data['notificationType'];
        $this->verify($data);
        switch ($notifyType) {
            case '0001':
                $this->consume($response);
                break;
            case '0002':
                $this->consume($response);
                break;
            case '0003':
                $this->consume($response);
                break;
            case '0004':
                $this->consume($response);
                break;
            case '0005':
                break;
            case '0006':
                break;
            case '0007':
                break;
            default:
                break;
        }
    }
    /**
     * Processes the IPN data by consuming it.
     * Override this method in a subclass to provide custom behavior.
     * @param mixed $data The IPN data to be consumed.
     */
    public function consume($data)
    {
        // Implementation for consuming IPN data
    }
    /**

     *Processes the IPN data by distributing it.
     *Override this method in a subclass to provide custom behavior.
     *@param mixed $data The IPN data to be distributed.
     */
    public function distribute($data)
    {
        // Implementation for distributing IPN data
    }
    /**

     *Verifies the authenticity of the IPN data using the BaasSignature instance.
     *@param mixed $data The IPN data to be verified.
     *@return bool Returns true if the IPN data is authentic, false otherwise.
     */
    public function verify($data)
    {
        if (!$this->baasSignature->isValidateSignature($data)) {
            $this->exception("The signature did not match");
        }
    }
}
