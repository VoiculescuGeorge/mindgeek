<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Services\ScannerService;

class getJson extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scan:url {url}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get json from url';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('========== JSON IS BEING SCANNED ==========');
        $url = $this->argument('url');
        $scannerService = new ScannerService($url);
        $insert = $scannerService->saveJson();
        $this->info('========== JSON WAS SAVED TO DATABASE ==========');
        $this->info($insert);
    }
}
