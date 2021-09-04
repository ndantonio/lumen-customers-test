<?php

namespace App\Services;

use App\Helpers\CurlHelper;
use App\Models\Customer;

/**
 * Data Importer Service.
 */
class DataImporterService
{
    /**
     * Constants
     */
    const RANDOM_USER_API_URL = 'https://randomuser.me/api';

    /**
     * Props
     */
    private $curl;

    /**
     * Constructor
     * @param CurlHelper $curl
     */
    public function __construct(CurlHelper $curl)
    {
        $this->curl = $curl;
    }//end __construct()

    /**
     * Import data from the API.
     * @return mixed
     */
    public function import()
    {
        // call API
        $response = $this->curl->call('GET', self::RANDOM_USER_API_URL . '?nat=au');

        if (! empty($response)) {

            // get results
            $customer = $response['results'][0];
            $email = $customer['email'];

            // check if email already exists in the database
            $isCustomerExists = Customer::where('email', $email)->get();

            // prepare data
            $data = [
                'firstname' => $customer['name']['first'],
                'lastname' => $customer['name']['last'],
                'email' => $email,
                'username' => $customer['login']['username'],
                'country' => $customer['location']['country'],
                'gender' => $customer['gender'],
                'city' => $customer['location']['city'],
                'phone' => $customer['phone'],
                'passwd' => $customer['login']['md5']
            ];

            // insert if new customer
            if ($isCustomerExists->isEmpty()) {
                return Customer::create($data);
            }

            // update if existing customer
            return Customer::where('email', $email)->update($data);
        }

        return 'Error retrieving data from the provider.';
    }//end import()
}//end class