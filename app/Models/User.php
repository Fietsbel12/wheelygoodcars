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
        'phone_number',
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

    public function cars(){
        return $this->hasMany(Car::class);
    }

    public function sus(){
        $now = now();

        $noPhone = empty($this->phone_number);

        $susCar = $this->cars->contains(function ($car) {
            return $car->production_year < 2005 && $car->mileage < 50000;
        });

        $susSale = $this->cars->where('created_at', '>=', now()->startOfDay())
            ->where('sold_at', true)
            ->where('price', '>', 10000)
            ->count() > 3;

        $lowPrice = $this->cars->count() > 0 &&
            $this->cars->every(fn ($car) => $car->price < 1000);

        $noTags =  $this->cars->every(fn ($car) => $car->tags->count() === 0);

        $noRecentCar = !$this->cars->contains(function ($car) use ($now) {
            return $car->created_at >= $now->subYear();
        });

        return $noPhone || $susCar || $susSale || $lowPrice || $noTags || $noRecentCar;
    }
}
