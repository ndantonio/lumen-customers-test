<?php

namespace App\Services;

use App\Helpers\CurlHelper;
use App\Entities\Customer;
use Doctrine\ORM\EntityManagerInterface;

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
    private $entityManager;

    /**
     * Constructor
     * @param CurlHelper $curl
     */
    public function __construct(
        CurlHelper $curl,
        EntityManagerInterface $entityManager
    ){
        $this->curl = $curl;
        $this->entityManager = $entityManager;
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
            $data = $response['results'][0];
            $email = $data['email'];

            // check if email already exists in the database
            $isCustomerExists = $this->entityManager
               ->getRepository(Customer::class)
               ->findOneBy([
                   'email' => $email
               ]);

            // update if customer exists
            if (! empty($isCustomerExists)) {
                $isCustomerExists->setFirstName($data['name']['first']);
                $isCustomerExists->setLastName($data['name']['last']);
                $isCustomerExists->setUsername($data['login']['username']);
                $isCustomerExists->setCountry($data['location']['country']);
                $isCustomerExists->setGender($data['gender']);
                $isCustomerExists->setCity($data['location']['city']);
                $isCustomerExists->setPhone($data['phone']);
                $isCustomerExists->setPassword($data['login']['md5']);

                $this->entityManager->flush();

                return response()->json(['statusMessage' => 'Successfully updated!'], 201);
            }

            // insert new
            $customer = new Customer();
            $customer->setFirstName($data['name']['first']);
            $customer->setLastName($data['name']['last']);
            $customer->setEmail($data['email']);
            $customer->setUsername($data['login']['username']);
            $customer->setCountry($data['location']['country']);
            $customer->setGender($data['gender']);
            $customer->setCity($data['location']['city']);
            $customer->setPhone($data['phone']);
            $customer->setPassword($data['login']['md5']);

            $this->entityManager->persist($customer);
            $this->entityManager->flush();

            return response()->json(['statusMessage' => 'Successfully inserted!'], 201);
        }

        return 'Error retrieving data from the provider.';
    }//end import()
}//end class