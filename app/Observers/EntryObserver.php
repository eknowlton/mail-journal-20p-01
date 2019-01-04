<?php

namespace App\Observers;

use App\Entry;
use App\Mail\EntryCreatedEmail;
use Illuminate\Support\Facades\Mail;

class EntryObserver
{
    /**
     * Handle the entry "created" event.
     *
     * @param  \App\Entry  $entry
     * @return void
     */
    public function created(Entry $entry)
    {
        Mail::to($entry->reminder->sent_to)
            ->queue(new EntryCreatedEmail($entry));
    }
}
