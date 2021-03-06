<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model {

	protected $fillable = [

        'title',
        'body',
        'published_at'

    ];

    protected $dates = ['published_at'];

    public function scopePublished($query)
    {

        $query->where('published_at', '<=', Carbon::now());

    }
    public function scopeUnpublished($query)
    {

        $query->where('published_at', '>', Carbon::now());

    }

    public function setPublishedAtAttribute($date)
    {

        $this->attributes['published_at'] = Carbon::parse($date);

    }

    /**
     * Article belongs to a user.
     */
    public function user()
    {

        return $this->belongsTo('App\User');

    }
    /**
     * Get the tags associated with the given article.
     */

    public function tags()
    {

        return $this->belongsToMany('App\Tag')->withTimestamps();

    }

    /**
     * Get a list of tag ids associated with the current article.
     * @return array
     */
    public function getTagListAttribute()
    {

        return $this->tags->lists('id');

    }
}
