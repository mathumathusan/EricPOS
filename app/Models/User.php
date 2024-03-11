<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'profile_image',
        'last_login_ip',
        'last_login_at',
        'login_attempts',
        'is_blocked',
        'language'
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

    public function getImageAttribute()
    {
        if ($this->name) {
            return 'https://ui-avatars.com/api/?name='.$this->name.'&color=001c38&background=ddf0ff&bold=true';
        }
        return asset('assets/admin/images/faces/9.jpg');
    }

    public function getRoleNameAttribute()
    {
        if ($this->roles->count() > 0) {
            return $this->roles->first()->name;
        }
        return 'User';
    }

}
