<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends \TCG\Voyager\Models\User
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }






    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // each user can have many articles
    public function articles()
    {
        // give me all the articles that equal to the user id 1
        return $this->hasMany(Article::class); // select * from articles where user_id = 1
    }

    public function projects()
    {
        //hasMany: one model can have many of another model
        return $this->hasMany(projects::class);// select * from projects where user_id = 1
    }

// example use in tinker: $user = User::find(1)  // select * from user where id = 1
// example use in tinker: $user->projects;  // select * from projects where user_id = $user->id
// example use in tinker: $user->articles; // select * from artciles where user_id = $user->id
}
