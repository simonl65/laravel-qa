<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    /**
     * Answers belong to questions:
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    /**
     * Answers belong to users:
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
