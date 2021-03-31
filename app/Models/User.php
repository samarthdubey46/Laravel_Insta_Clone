<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
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
        'username',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function booted()
    {
        static::created(function (User $user) {
            $profile = new Profile();
            $profile->title = 'Create A Title';
            $profile->description = 'Add A Description';
            $profile->user_id = $user->id;
            $profile->image = 'storage/profile/1cEKNSXACzcyvybWvj4klow8cUt0tu0WNRmWLcXP.jpg';
            $profile->save();
        });
    }

    function posts()
    {
        return $this->hasMany(Post::class)->orderBy('created_at', 'DESC');
    }

    function following()
    {
        return $this->belongsToMany(Profile::class);
    }

    function profile()
    {
        return $this->hasOne(Profile::class);
    }


}
