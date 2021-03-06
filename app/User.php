<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * Users may have many questions:
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    /**
     * Attribute accessor for $question->user->url required in the view:
     */
    public function getUrlAttribute()
    {
        // return route('questions.show', $this->id);
        return '#';
    }

    /**
     * Define relationship - Questions may have many answers:
     */
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

}
