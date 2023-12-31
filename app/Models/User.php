<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile',
        'role',
        'status',
        'mobile1'
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
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(368)
            ->height(232)
            ->sharpen(10);
    }

    public function meeting(){
        return $this->hasOne(Metting::class,'user_id');
    }

    public function get_user()
    {
        return $this->hasOne(Retailer::class,'user_id');
    }

    public function attendance_user_name(){
        return $this->hasOne(Attendance::class,'user_id');
    }
    public function location_user_name(){
        return $this->hasOne(Location::class,'user_id');
    }
    public function cart_user()
    {
        return $this->hasOne(Cart::class,'user_id');
    }

    public function leave_user()
     {
        return$this->hasOne(Leave::class,'user_id');
    }

    public function attendance(){

    }
}
