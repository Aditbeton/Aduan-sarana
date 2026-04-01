<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Cast\Attribute;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nama',
        'username',
        'password',
    ];

    protected function nama(): Attribute
    {

        return Attribute::make(
            set: fn($value) => ucwords(strtolower(trim($value)))
        );
    }

    protected $hiden = [
        'password',
        'remember_token',
    ];

    public function aspirasi()
    {
        return $this->hasMany(Aspirasi::class);
    }
}