<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
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
     * @var string[]
     */
    protected $fillable = [
        'name',
        'patronymic',
        'surname',
        'role',
        'phone',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getIsAdminAttribute()
    {
        return $this->role === 'admin';
    }

    public function getIsManagerAttribute()
    {
        return $this->role === 'manager';
    }

    public function getIsUserAttribute()
    {
        return $this->role === 'user';
    }

    public function scopeSearch($query, $val)
    {
        return $query
            ->where('name', 'like', '%'.$val.'%')
            ->orWhere('surname', 'like', '%'.$val.'%')
            ->orWhere('patronymic', 'like', '%'.$val.'%');
    }

    public function scopeSearchByRole($query, $val = null)
    {
        return $query
            ->where('role', 'like', '%'.$val.'%');
    }
}