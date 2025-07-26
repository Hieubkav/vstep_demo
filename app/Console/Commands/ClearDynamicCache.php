<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ClearDynamicCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cache:clear-dynamic';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear all dynamic content cache (settings, components, menu)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Clearing dynamic cache...');

        \App\Helpers\SettingHelper::clearCache();
        \App\Helpers\WebDesignHelper::clearCache();
        \App\Helpers\MenuHelper::clearCache();

        $this->info('Dynamic cache cleared successfully!');

        return 0;
    }
}
