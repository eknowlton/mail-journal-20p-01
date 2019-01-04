<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{

    protected $fillable = [
        'body'
    ];

    protected $hidden = [
        'reminder_id'
    ];

    public function reminder()
    {
        return $this->belongsTo('App\Reminder');
    }
}
