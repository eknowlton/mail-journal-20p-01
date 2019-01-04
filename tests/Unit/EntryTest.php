<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use App\Mail\EntryCreatedEmail;
use App\Reminder;

class EntryTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testItSendsEmailWhenEntryCreated()
    {
        Mail::fake();

        $reminder = factory(Reminder::class)->create();
        $reminder->entry()->create([
            'body' => 'This is the entry body'
        ]);

        Mail::assertQueued(EntryCreatedEmail::class, function($mail) use ($reminder) {
            return $mail->hasTo($reminder->sent_to);
        });
    }
}
