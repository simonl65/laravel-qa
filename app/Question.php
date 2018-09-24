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
        return route('questions.show', $this->id);
    }

    /**
     * Accessor for $question->created_date:
     */
    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }
}
