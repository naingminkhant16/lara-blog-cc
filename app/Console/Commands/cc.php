<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class cc extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cc:version-update-noti';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Version Update Notis For Discord Channel';

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
        echo "Here it is";
    }
}
