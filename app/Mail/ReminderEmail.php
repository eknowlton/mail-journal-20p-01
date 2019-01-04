<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Reminder;

class ReminderEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $reminder;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Reminder $reminder)
    {
        $this->reminder = $reminder;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->reminder->id . '@' . config('services.mailgun.domain'))
                    ->subject('Journal Entry Reminder')
                    ->view('emails.reminder', ['reminder' => $this->reminder]);
    }
}
