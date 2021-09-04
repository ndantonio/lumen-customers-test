<?php 

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\DataImporterService;

class DataImportCommand extends Command 
{
    /**
     * Constructor
     * @param DataImporterService $service
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'customer:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Custom command to import customer data from 3rd party API.";

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(DataImporterService $service)
    {
        $service->import();
    }
}