<?php

namespace App\Observers;

use App\Reminder;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReminderEmail;

class ReminderObserver
{
    /**
     * Handle the reminder "created" event.
     *
     * @param  \App\Reminder  $reminder
     * @return void
     */
    public function created(Reminder $reminder)
    {
        Mail::to($reminder->sent_to)
            ->queue(new ReminderEmail($reminder));
    }
}
