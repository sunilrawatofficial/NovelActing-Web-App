<?php

namespace App\Console\Commands;
use Spatie\Backup\BackupDestination\BackupCollection;

use Artisan;

use Illuminate\Console\Command;

class novelactingBackup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'novelacting:Backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'It is used to create Novelacting Backup';

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
        $backup = $backups->oldestBackup();
        $backup->delete();
        Artisan::call('backup:run');
    }
}
