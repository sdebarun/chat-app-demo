<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Message;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone_number',
        'display_pic',
        'street_1',
        'street_2',
        'pincode',
        'is_active',
        'last_active_at',
        'country_id',
        'state_id',
        'experience',
        'rating',
        'languages_spoken',
        'referral',
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


    public function senderMessages(){
        return $this->hasMany(Message::class,'sender_id');
    }


    public function recipientMessages() {
        return $this->hasMany(Message::class,'recipient_id');
    }

    public function astrologyCategories(){
        return $this->belongsToMany(AstrologyCategory::class,'astrology_categories_users');
    }
}
