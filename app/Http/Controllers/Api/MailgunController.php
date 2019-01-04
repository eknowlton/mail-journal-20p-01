<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reminder;

class MailgunController extends Controller
{
    public function store(Request $request)
    {
        $toEmail = extractEmail($request->get('To'));
        $reminderId = getReminderIdFromEmail($toEmail);

        $fromEmail = extractEmail($request->get('From'));

        $reminder = Reminder::where([
            'id' => $reminderId,
            'sent_to' => $fromEmail
        ])->first();

        if(!$reminder) {
            return response('Failed to find related reminder for new journal entry.', 400);
        }

        $entry = $reminder->entry()->create([
            'body' => $request->get('body-plain')
        ]);

        return response([
            'entry' => $entry
        ], 201);
    }
}
