<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Reminder;

class MailgunCreateTest extends TestCase
{
    public function testItCreatesNewEntry()
    {
        Event::fake(); // prevent observers

        $reminder = factory(Reminder::class)->create();

        $user = $reminder->user;
        $from = "{$user->name} <{$user->email}>";
        $to = "Journal <{$reminder->id}@mailjournal.com>";

        $response = $this->json(
            'POST', 
            'api/mailgun/store', 
            $this->mailgunRequest($to, $from)
        );

        $response->assertStatus(201);
        $this->assertCount(1, $user->entries()->get());
    }

    public function mailgunRequest($to, $from)
    {
        return [
            'To' => $to,
            'From' => $from,
            'body-plain' => 'This is the plain text body.',
            // ... and much more
        ];
    }
}
