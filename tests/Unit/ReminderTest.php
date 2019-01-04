<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use App\Reminder;
use App\Mail\ReminderEmail;
use App\Observers\ReminderObserver;

class ReminderTest extends TestCase
{
    public function testItSendsEmailWhenReminderCreated()
    {
        Mail::fake();

        $reminder = new Reminder();
        $reminder->user_id = 1;
        $reminder->sent_to = 'test@test.com';
        $reminder->save();

        Mail::assertQueued(ReminderEmail::class, function($mail) use ($reminder) {
            return $mail->hasTo($reminder->sent_to);
        });
    }
}
