<?php

namespace App\Models;

use App\Notifications\MailResetPasswordToken;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
          'id', 'typeuser', 'name', 'avatar', 'email', 'password', 'cpf',
          'ssn', 'gender', 'platform', 'age', 'ddd', 'phone', 'address',
          'number', 'complement', 'neighborhood', 'city', 'state', 'country',
          'lat', 'long', 'provider', 'provider_id', 'status', 
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function lists()
    {
        return $this->belongsToMany(Lista::class);
    }

    public function stores()
    {
        return $this->belongsToMany(Store::class);
    }

    public function locations()
    {
        return $this->hasMany(Location::class);
    }

    public function loyalty()
    {
        return $this->hasOne(Loyalty::class);
    }

    public function offers()
    {
        return $this->belongsToMany(Offer::class);
    }

    public function offersWithProducts()
    {
        return $this->belongsToMany(Offer::class)->with('product');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MailResetPasswordToken($token));
    }
}
