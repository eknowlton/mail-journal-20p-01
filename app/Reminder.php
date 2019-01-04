<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    protected $fillable = [
        'sent_to'
    ];

    protected $hidden = [
        'user_id'
    ];

    public function entry()
    {
        return $this->hasOne('App\Entry');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
