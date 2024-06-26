<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class IseedTables extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'iseed:all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        foreach (\DB::select('SHOW TABLES') as $value) {
            foreach ($value as $tableName) {
                if (!in_array($tableName, ['migrations', 'password_resets'])) {
                    \Artisan::call('iseed', [
                        'tables' => $tableName,
                        '--force' => true,
                    ]);
                    $this->info('Table ' . $tableName . ' - Done!');
                }
            }
        }
    }
}
