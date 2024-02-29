<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_image'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // This method defines a one-to-many 
    // relationship between the current model and the Order model. 
    // It indicates that the current model can have multiple orders associated with it.

    public function orders(){
        return $this->HasMany(Order::class);
    }



    // Similar to the orders() method, this method defines a one-to-many relationship 
    // between the current model and the Photo model. It states that the current model 
    // can have multiple photos associated with it.

    public function photos(){
        return $this->HasMany(Photo::class);
    }


    // This method defines an accessor for the profile_image attribute. 
    // Accessors allow you to manipulate attribute values when you access them. 
    // In this case, it takes the raw value of the profile_image attribute and returns its URL using the asset() function. 
    // This function is commonly used in Laravel to generate URLs for assets (like images, stylesheets, or scripts).

    public function getProfileImageAttribute($value){
        return asset($value);
    }
    
}
