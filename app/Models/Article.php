<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use League\CommonMark\Normalizer\SlugNormalizer;
use phpDocumentor\Reflection\DocBlock\Tag;

class Article extends Model
{
    use HasFactory;
    // all the titles that can be assigned
    protected $guarded = [];

    public function path()
    {
        return route('articles.show', $this);
    }

    // each article belongs to a user
    public function author()
    {
        // each article belongs to a user.
        // because its named user, laravel assumes the foreign key in the database is user_id. Can add the user_id so it knows what to look for
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tags()
    {
        // a tag can belongs to many articles
        return $this->belongsToMany(Tag::class);
    }
}
