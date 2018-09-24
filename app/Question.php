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
}
