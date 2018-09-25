<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['title', 'body'];

    /**
     * Questions belong to users:
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * Auto-fill 'slug' when title provided:
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug']  = str_slug($value);  // Copies value to lower-case and replaces spaces with hyphens.
    }

    /**
     * Attribute accessor for $question->url required in the view:
     */
    public function getUrlAttribute()
    {
        return route('questions.show', $this->slug);
    }

    /**
     * Accessor for $question->created_date:
     */
    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    /**
     * Accessor for $question->status:
     *
     * Returns a class name relevant to the answered status of the question.
     */
    public function getStatusAttribute()
    {
        if ($this->answers > 0) {
            if($this->best_answer_id) {
                return 'answered-accepted';
            }
            return 'answered';
        }
        return 'unanswered';
    }

    // /**
    //  * Parse nay HTML in the body using Parsedown:
    //  */
    // public function getBodyHtmlAttribute()
    // {
    //     return \Parsedown::instance()->text($this->body);
    // }
}
