<?php

namespace App\Console\Commands;

use App\Services\FeedService;
use Illuminate\Console\Command;
use InvalidArgumentException;

class CreateFeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:feed {partner}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create feed for our clients';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(FeedService $feedExportService)
    {
        parent::__construct();
        $this->feedExportService = $feedExportService;
    }

    protected FeedService $feedExportService;

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
       switch ($this->argument('partner')){
           case 'partnerA':
               $this->feedExportService->exportAPartnerInfo();
               break;
           case 'partnerB':
               $this->feedExportService->exportBPartnerInfo();
              break;
           default:
               throw new InvalidArgumentException('Incorrect partner name');
       }
       return 'Export was started';
    }
}
