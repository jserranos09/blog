<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    use HasFactory;

    // define the corresponding database table here. If not defined, Laravel will just look for the database table whose name is the plural form of the model.
    // will be imoported to IndexController
    protected $fillable = [
        'website_title', 'logo', 'description'
    ];
}
