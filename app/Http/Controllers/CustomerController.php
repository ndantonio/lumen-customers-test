<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Services\DataImporterService;


/**
 * Customer controller
 */
class CustomerController extends Controller
{
    /**
     * Props
     */
    private $service;

    /**
     * Constructor
     * @param DataImporterService $service
     */
    public function __construct(DataImporterService $service)
    {
        $this->service = $service;
    }//end __consturct()

    /**
     * Get all customer list.
     * @return json
     */
    public function showAllCustomers()
    {
        /*$customers = DB::select("
            SELECT 
                CONCAT(firstname, ' ', lastname) as fullname,
                email,
                country
            FROM customers
        ");*/

        $customers = Customer::select([
            'firstname',
            'lastname',
            'email',
            'country'
        ])->get();

        if (! $customer->isEmpty()) {
            return response()->json($customers);
        }

        return 'No record(s) found.';
    }//end showAllCustomers()

    /**
     * Get customer details by ID.
     * @param int $id Customer ID
     * @return json
     */
    public function showCustomerDetailsById($id)
    {
        /*$customer = DB::select("
            SELECT 
                CONCAT(firstname, ' ', lastname) as fullname,
                email,
                username,
                gender,
                country,
                city,
                phone
            FROM 
                customers
            WHERE 
                id = :id
        ", ['id' => $id]);*/

        $customer = Customer::select([
            'firstname',
            'lastname',
            'email',
            'username',
            'gender',
            'country',
            'city',
            'phone'
        ])->where('id', $id)->get();

        if (! $customer->isEmpty()) {
            return response()->json($customer);
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
