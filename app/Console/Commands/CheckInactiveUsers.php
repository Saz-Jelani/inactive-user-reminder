<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Jobs\SendInactiveUserReminderJob;
use Carbon\Carbon;

class CheckInactiveUsers extends Command
{
    protected $signature = 'users:check-inactive';

    protected $description = 'Find users inactive for 7 days and dispatch reminder job';

    public function handle()
    {
        
        $date = Carbon::now()->subDays(env('INACTIVE_DAYS', 7));

        $users = User::where(function ($query) use ($date) {
            $query->where('last_login_at', '<', $date)
                  ->orWhereNull('last_login_at');
        })->get();

        foreach ($users as $user) {
            SendInactiveUserReminderJob::dispatch($user);
        }

        $this->info('Inactive user jobs dispatched successfully.');
    }
}