<?php

namespace App\Http\Controllers;

use App\Entities\Customer;
use App\Services\DataImporterService;
use Doctrine\ORM\EntityManagerInterface;


/**
 * Customer controller
 */
class CustomerController extends Controller
{
    /**
     * Props
     */
    private $service;
    private $entityManager;

    /**
     * Constructor
     * @param DataImporterService $service
     */
    public function __construct(
        DataImporterService $service,
        EntityManagerInterface $entityManager
    ){
        $this->service = $service;
        $this->entityManager = $entityManager;
    }//end __consturct()

    /**
     * Get all customer list.
     * @return json
     */
    public function showAllCustomers()
    {
        $data = [];

        $customers = $this->entityManager
           ->getRepository(Customer::class)
           ->findAll();

       foreach ($customers as $customer) {
            $temp['fullname'] = $customer->getFirstName() . " " . $customer->getLastName();
            $temp['email'] = $customer->getEmail();
            $temp['country'] = $customer->getCountry();

            $data[] = $temp;
       }

        if ($customers) {
            return response()->json($data);
        }

        return 'No record(s) found.';
    }//end showAllCustomers()

    /**
     * Get customer details by ID.
     * @param int $id Customer ID
     * @return json
     */
    public function showCustomerDetailsById(int $id)
    {
        $customer = $this->entityManager
           ->getRepository(Customer::class)
           ->findOneBy([
               'id' => $id
           ]);

        if ($customer) {
            return response()->json([
                'fullname' => $customer->getFirstName() . " " . $customer->getLastName(),
                'email' => $customer->getEmail(),
                'username' => $customer->getUsername(),
                'gender' => $customer->getGender(),
                'country' => $customer->getCountry(),
                'city' => $customer->getCity(),
                'phone' => $customer->getPhone()
            ]);
        }

        return 'No record(s) found.';
    }//end showCustomerDetailsById()


    /**
     * Import customer to database.
     * Can use here in controller also in commands.
     * @see App\Console\Commands\DataImportCommand
     */
    public function importCustomer()
    {
        return $this->service->import();
    }//end importCustomer()
}//end class
