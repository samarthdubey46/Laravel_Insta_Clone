<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    /**
     * @var mixed|string
     */

    function user()
    {
        return $this->belongsTo(User::class);
    }
    function followers(){
        return $this->belongsToMany(User::class);
    }
}
