<?php

namespace App\Console\Commands;

use Illuminate\Http\Request;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class Mig1Cron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mig:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Permet d\'executer le scraping';

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
     * @return int
     */
    public function handle()
    {
        Log::info('Le cron MIG est bien lancé');

        $request = Request::create(route('mig.route'),'GET');

        $response = app()->handle($request);
    }
}
