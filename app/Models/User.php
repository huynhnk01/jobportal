<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
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

    public function getAvatarUrlAttribute()
    {
        if ($this->avatar) {
            // Nếu avatar là URL (avatar từ social), trả về trực tiếp
            if (filter_var($this->avatar, FILTER_VALIDATE_URL)) {
                return $this->avatar;
            }
            // Ngược lại, avatar là file upload nội bộ
            return asset('storage/avatars/' . $this->avatar);
        }

        // Random avatar nếu chưa có
        // Sử dụng DiceBear personas style
        $seed = urlencode($this->email ?? $this->name ?? $this->id);
        return "https://api.dicebear.com/8.x/shapes/svg?seed={$seed}&backgroundColor=b6e3f4,c0aede,d1d4f9,fde68a,a3e635&radius=50";
    }

    public function candidate()
    {
        return $this->hasOne(Candidate::class);
    }

    public function employer()
    {
        return $this->hasOne(Employer::class);
    }

    public function isCandidate(): bool
    {
        return $this->role === 'candidate';
    }

    public function isEmployer(): bool
    {
        return $this->role === 'employer';
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }
}
