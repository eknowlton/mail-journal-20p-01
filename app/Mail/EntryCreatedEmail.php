<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Entry;

class EntryCreatedEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $entry;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Entry $entry)
    {
        $this->entry = $entry;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Entry Created')
                    ->view('emails.entry-created', ['entry' => $this->entry]);
    }
}
