<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UpdateUsersParties extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update users table with new value daily at midnight';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
{
    DB::table('users')->update(['parties' => 10]);
    $this->info('Users parties updated successfully!');
}

}
