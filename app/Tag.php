<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Get the articles associated with the given tag.
 */
class Tag extends Model {

    /**
     * Fillable fields for a tag.
     * @var array
     */
    protected $fillable = [
        'name'
    ];

	public function articles()
    {

        return $this->belongsToMany('App\Article');

    }

}
