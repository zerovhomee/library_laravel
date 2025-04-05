<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $table = 'users';

    public function books(){
        return $this->HasMany(Book::class,'user_id','id')->chaperone();
    }

    public function sharedLibraryTo()
    {
        return $this->hasMany(LibraryAccess::class, 'owner_id');
    }

    // Пользователи, которые дали мне доступ
    public function sharedLibraryFrom()
    {
        return $this->hasMany(LibraryAccess::class, 'user_id');
    }

    // Получить все доступные библиотеки
    public function accessibleLibraries()
    {
        return User::whereHas('sharedLibraryTo', function($q) {
            $q->where('user_id', $this->id);
        });
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
