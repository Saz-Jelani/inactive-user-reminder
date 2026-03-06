<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\InactiveUserLog;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendInactiveUserReminderJob implements ShouldQueue
{
    use Queueable;

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function handle(): void
    {
       
        InactiveUserLog::create([
            'user_id' => $this->user->id,
            'email' => $this->user->email,
            'sent_at' => Carbon::now(),
            'status' => 'sent',
            'message' => 'Reminder email sent to inactive user'
        ]);
        
        Log::info("Reminder sent to inactive user: " . $this->user);
    }
}