<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

class SendReminderEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminders:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends reminder emails for all users for the current day.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        User::all()->each(function($user) {
            $user->reminders()->create([
                'sent_to' => $user->email
            ]);
        });
    }
}
